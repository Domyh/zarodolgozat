<?php

global $IAPI;
$brands = $IAPI->get_all_brands();

?>

<div>
    <div class="card mb-3 mx-auto mt-4 p-4" style="max-width: 60vw; background-color: #818181">
        <select name="Parent brand" id="parentbrand"></select>
        <input type="text" name="Model name" id="modelname" placeholder="Model name" class="mt-2">
        <input type="button" value="Add" class="btn btn-primary mt-4" onclick="addModel()">
    </div>
</div>

<script>
    const brands = <?php echo json_encode($brands); ?>;
    const el = document.getElementById('parentbrand')

    window.onload = () => {
        for (var it of brands)
        {
            el.innerHTML += `
                <option value="${it.id}">${it.name}</select>
            `
        }
    }

    addModel = () => {
        fetch('system/external_api.php?addModel&name=' + document.getElementById('modelname').value + '&parentbrand=' + el.value).then(x => {
            window.history.back()
        })
    }
</script>
