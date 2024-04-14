<?php
    $sql = 'select parts.name, parts.description, model.name, brand.name from parts inner join model on model.id = parts.parent_model inner join brand on brand.id = model.parent_brand where parts.id = ?';
    $stmt = $db->pdo->prepare($sql);
    $stmt->execute([$_GET['partID']]);
    $res = $stmt->fetchAll();
?>

<div>
    <div class="card mb-3 mx-auto mt-4" style="max-width: 60vw;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://static.wikia.nocookie.net/villains/images/e/e1/800px_COLOURBOX21949372.jpg" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $res[0][0]; ?></h5>
                    <p class="card-text"><?php echo $res[0][1]; ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $res[0][3] . ' ' . $res[0][2]; ?></small></p>
                    <div class="text-end">
                        <a class="btn btn-success" href="?contact">Érdeklődés</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>