<?php

global $IAPI;
$parts = $IAPI->get_last5_parts();

?>

<h4 class="text-center text-white">Utolsó 5 alkatrész</h4>
<div class="d-flex flex-row container">
    <div class="text-white card _bg_glass m-1" style="width: 15rem;">
        <img src="https://static.wikia.nocookie.net/villains/images/e/e1/800px_COLOURBOX21949372.jpg" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $parts[0][0]; ?></h5>
            <p class="card-text"><?php echo '<b>' . $parts[0][2] . '</b> ' . $parts[0][1]; ?></p>
            <div class="text-end">
                <a href="?partID=<?php echo $parts[0][3]; ?>" class="btn btn-primary">Részletek</a>
            </div>
        </div>
    </div>
    <div class="text-white card _bg_glass m-1" style="width: 15rem;">
        <img src="https://static.wikia.nocookie.net/villains/images/e/e1/800px_COLOURBOX21949372.jpg" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $parts[1][0]; ?></h5>
            <p class="card-text"><?php echo '<b>' . $parts[1][2] . '</b> ' . $parts[1][1]; ?></p>
            <div class="text-end">
                <a href="?partID=<?php echo $parts[1][3]; ?>" class="btn btn-primary">Részletek</a>
            </div>
        </div>
    </div>
    <div class="text-white card _bg_glass m-1" style="width: 15rem;">
        <img src="https://static.wikia.nocookie.net/villains/images/e/e1/800px_COLOURBOX21949372.jpg" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $parts[2][0]; ?></h5>
            <p class="card-text"><?php echo '<b>' . $parts[2][2] . '</b> ' . $parts[2][1]; ?></p>
            <div class="text-end">
                <a href="?partID=<?php echo $parts[2][3]; ?>" class="btn btn-primary">Részletek</a>
            </div>
        </div>
    </div>
    <div class="text-white card _bg_glass m-1" style="width: 15rem;">
        <img src="https://static.wikia.nocookie.net/villains/images/e/e1/800px_COLOURBOX21949372.jpg" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $parts[3][0]; ?></h5>
            <p class="card-text"><?php echo '<b>' . $parts[3][2] . '</b> ' . $parts[3][1]; ?></p>
            <div class="text-end">
                <a href="?partID=<?php echo $parts[3][3]; ?>" class="btn btn-primary">Részletek</a>
            </div>
        </div>
    </div>
    <div class="text-white card _bg_glass m-1" style="width: 15rem;">
        <img src="https://static.wikia.nocookie.net/villains/images/e/e1/800px_COLOURBOX21949372.jpg" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $parts[4][0]; ?></h5>
            <p class="card-text"><?php echo '<b>' . $parts[4][2] . '</b> ' . $parts[4][1]; ?></p>
            <div class="text-end">
                <a href="?partID=<?php echo $parts[4][3]; ?>" class="btn btn-primary">Részletek</a>
            </div>
        </div>
    </div>
</div>