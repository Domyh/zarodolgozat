<?php

global $IAPI;
$data = $IAPI->get_brand_details($_GET['id']);

?>

<div>
    <div class="card mb-3 mx-auto mt-4 p-4" style="max-width: 60vw; background-color: #818181">
        <input type="text" name="ID" id="_id" disabled>
        <input type="text" name="Brand name" id="brandname" placeholder="Brand name" class="mt-2">
        <input type="button" value="Save" class="btn btn-primary mt-4" onclick="save()">
    </div>
</div>

<script>
    const data = <?php echo json_encode($data[0]); ?>;
    document.getElementById('_id').value = data.id
    document.getElementById('brandname').value = data.name

    save = () => {
        fetch('system/external_api.php?modifyBrand&name=' + document.getElementById('brandname').value + '&id=' + document.getElementById('_id').value).then(x => {
            window.history.back()
        })
    }
</script>