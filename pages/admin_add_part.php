<?php

global $IAPI;
$models = $IAPI->get_all_models();

?>

<div>
    <div class="card mb-3 mx-auto mt-4 p-4" style="max-width: 60vw; background-color: #818181">
        <select name="Parent model" id="parentmodel"></select>
        <input type="text" name="Part name" id="partname" placeholder="Part name" class="mt-2">
        <input type="text" name="Part description" id="partdescription" placeholder="Part description" class="mt-2">
        <input type="button" value="Add" class="btn btn-primary mt-4" onclick="addPart()">
    </div>
</div>

<script>
    const models = <?php echo json_encode($models); ?>;
    const el = document.getElementById('parentmodel')

    window.onload = () => {
        for (var it of models)
        {
            el.innerHTML += `
                <option value="${it.id}">${it.name}</select>
            `
        }
    }

    addPart = () => {
        fetch('system/external_api.php?addPart&name=' + document.getElementById('partname').value + '&parentmodel=' + el.value + '&description=' + document.getElementById('partdescription').innerText).then(x => {
            window.history.back()
        })
    }
</script>
