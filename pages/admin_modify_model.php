<?php

global $IAPI;
$brands = $IAPI->get_all_brands();
$data = $IAPI->get_model_details($_GET['id'])[0];

?>

<div>
    <div class="card mb-3 mx-auto mt-4 p-4" style="max-width: 60vw; background-color: #818181">
        <input type="text" disabled id="_id_">
        <select name="Parent brand" id="parentbrand" class="mt-2"></select>
        <input type="text" name="Model name" id="modelname" placeholder="Model name" class="mt-2">
        <input type="button" value="Add" class="btn btn-primary mt-4" onclick="modifyModel()">
    </div>
</div>

<script>
    const brands = <?php echo json_encode($brands); ?>;
    const data = <?php echo json_encode($data); ?>;
    const el = document.getElementById('parentbrand')

    window.onload = () => {
        for (var it of brands)
        {
            el.innerHTML += `
                <option value="${it.id}">${it.name}</select>
            `
        }
        console.log(data)
        el.value = data.parent_brand
        document.getElementById('modelname').value = data.name
        document.getElementById('_id_').value = data.id
    }

    modifyModel = () => {
        fetch('system/external_api.php?modifyModel&name=' + document.getElementById('modelname').value + '&parentbrand=' + el.value + "&id=" + <?php echo $_GET['id'];?>).then(x => {
            window.history.back()
        })
    }
</script>
