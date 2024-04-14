<?php

global $IAPI;
$data = $IAPI->get_part_data($_GET['id'])[0];
$models = $IAPI->get_all_models();

?>

<div>
    <div class="card mb-3 mx-auto mt-4 p-4" style="max-width: 60vw; background-color: #818181">
        <select name="Parent model" id="parentmodel"></select>
        <input type="text" name="Part name" id="partname" placeholder="Part name" class="mt-2">
        <input type="text" name="Part description" id="partdescription" placeholder="Part description" class="mt-2">
        <input type="button" value="Add" class="btn btn-primary mt-4" onclick="save()">
    </div>
</div>

<script>
    const models = <?php echo json_encode($models); ?>;
    const data = <?php echo json_encode($data); ?>;
    const el = document.getElementById('parentmodel')

    window.onload = () => {
        for (var it of models)
        {
            el.innerHTML += `
                <option value="${it.id}">${it.name}</select>
            `
        }
        document.getElementById('partname').value = data.name
        document.getElementById('partdescription').value = data.description
        el.value = data.parent_model
    }

    save = () => {
        fetch('system/external_api.php?modifyPart&name=' + document.getElementById('partname').value + '&parentmodel=' + el.value + '&description=' + document.getElementById('partdescription').value + "&id=" + <?php echo $_GET['id']; ?>).then(x => {
            window.history.back()
        })
    }
</script>
