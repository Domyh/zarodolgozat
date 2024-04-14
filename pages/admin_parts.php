<?php

global $IAPI;
$parts = $IAPI->get_all_parts_adminpanel();

?>

<div>
    <a type="button" class="btn btn-success m-3" href="?addPart">add new</a>
    <table class="table table-striped" id="table">
        <tr>
            <th>partID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </table>
</div>

<script>
    const parts = <?php echo json_encode($parts); ?>;
    const parent = document.getElementById('table')

    deletePart = (id) => {
        fetch('system/external_api.php?removePart&id=' + id).then(x => {
            location.reload()
        })
    }
    
    window.onload = () => {
        for (var it of parts)
        {
            parent.innerHTML += `
                <tr>
                    <td>${it.id}</td>
                    <td>${it.brandname}</td>
                    <td>${it.modelname}</td>
                    <td><b>${it.name}</b></td>
                    <td>
                        <a type="button" class="btn btn-primary" href="?modifyPart&id=${it.id}">modify</a>
                        <input type="button" class="btn btn-danger" onclick="deletePart(${it.id})" value="remove">
                    </td>
                </tr>
            `
        }
    }
</script>
