<div>
    <div class="card mb-3 mx-auto mt-4 p-4" style="max-width: 60vw; background-color: #818181">
        <input type="text" name="Brand name" id="brandname" placeholder="Brand name">
        <input type="button" value="Add" class="btn btn-primary mt-4" onclick="addBrand()">
    </div>
</div>

<script>
    addBrand = () => {
        fetch('system/external_api.php?addBrand&name=' + document.getElementById('brandname').value).then(x => {
            window.history.back()
        })
    }
</script>
