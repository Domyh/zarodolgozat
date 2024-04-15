<?php

global $IAPI;

$brands = $IAPI->get_all_brands();
$models = $IAPI->get_all_models();

?>

<div>
    <div class="card mb-3 mx-auto mt-4 _bg_glass p-4" style="max-width: 60vw;">
        <h1 class="mx-auto text-white">Keresés</h1>
        <form method="post">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="d-flex flex-column text-white">
                        <span>Make of car</span>
                        <select name="brand" id="brand" onchange="brandChanged(this.value)"></select>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="d-flex flex-column text-white">
                        <span>Model</span>
                        <select name="model" id="model">
                        </select>
                    </div>
                </div>
                <div class="text-end">
                    <input type="button" class="btn btn-primary mt-4" value="Search" onclick="search()">
                </div>
            </div>
        </form>
    </div>

    <div class="container" id="container">
    </div>
</div>

<script>
    const brands = <?php echo json_encode($brands); ?>;
    const models = <?php echo json_encode($models); ?>;

    const brandEl = document.getElementById('brand');
    const modelEl = document.getElementById('model');
    const contEl = document.getElementById('container');

    window.onload = () => {
        for (var it of brands)
        {
            var newEl = document.createElement("option")
            newEl.value = it.id
            newEl.innerText = it.name
            brandEl.appendChild(newEl)
        }

        brandChanged(brands[0].id)
    }

    brandChanged = (val) => {
        modelEl.childNodes.forEach(x => modelEl.removeChild(x))

        for (var it of models.filter(x => x.parent_brand == val))
        {
            var newEl = document.createElement("option")
            newEl.value = it.id
            newEl.innerText = it.name
            modelEl.appendChild(newEl)
        }
    }

    search = async () => {
        fetch('system/external_api.php?getSearchResults&model=' + modelEl.value).then(async result => {
            var res = await result.json()

            contEl.childNodes.forEach(x => {
                if (x.classList && x.classList.contains('__delete')) contEl.removeChild(x)
            })
            
            for (var it of res)
            {
                contEl.innerHTML += `
                <a href="?partID=${it.id}" class="__delete">
                    <div class="card mb-3 w-100" style="cursor: pointer">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://static.wikia.nocookie.net/villains/images/e/e1/800px_COLOURBOX21949372.jpg" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${it.name}</h5>
                                    <p class="card-text">${it.description}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                `
            }
        })
    }
</script>