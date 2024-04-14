<?php

global $IAPI;
$brands = $IAPI->get_all_brands();

?>

<div>
    <a type="button" class="btn btn-success m-3" href="?addBrand">add new</a>
    <table class="table table-striped" id="table">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Options</th>
        </tr>
    </table>
</div>

<script>
    const brands = <?php echo json_encode($brands); ?>;
    const parent = document.getElementById('table')

    deleteBrand = (id) => {
        fetch('system/external_api.php?removeBrand&brand=' + id).then(x => {
            location.reload()
        })
    }
    
    window.onload = () => {
        for (var it of brands)
        {
            parent.innerHTML += `
                <tr>
                    <td>${it.id}</td>
                    <td>${it.name}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="?modifyBrand&id=${it.id}">modify</a>
                        <input type="button" class="btn btn-danger" onclick="deleteBrand(${it.id})" value="remove">
                    </td>
                </tr>

            `
        }
    }
</script>
