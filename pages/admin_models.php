<?php

global $IAPI;
$models = $IAPI->get_all_models_adminpanel();

?>

<div>
    <a type="button" class="btn btn-success m-3" href="?addModel">add new</a>
    <table class="table table-striped" id="table">
        <tr>
            <th>modelID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Options</th>
        </tr>
    </table>
</div>

<script>
    const models = <?php echo json_encode($models); ?>;
    const parent = document.getElementById('table')

    deleteModel = (id) => {
        fetch('system/external_api.php?removeModel&model=' + id).then(x => {
            location.reload()
        })
    }
    
    window.onload = () => {
        for (var it of models)
        {
            parent.innerHTML += `
                <tr>
                    <td>${it.modelid}</td>
                    <td>${it.brandname}</td>
                    <td><b>${it.modelname}</b></td>
                    <td>
                        <a type="button" class="btn btn-primary" href="?modifyModel&id=${it.modelid}">modify</a>
                        <input type="button" class="btn btn-danger" onclick="deleteModel(${it.modelid})" value="remove">
                    </td>
                </tr>
            `
        }
    }
</script>
