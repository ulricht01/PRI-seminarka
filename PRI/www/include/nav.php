<?php // navbar – navigační lišta
require INC . '/stranky.php';
?>

<nav class="navigace">
<div class="navigace-container">
    <ul class="navigace-list">
        <?php foreach($pages as $href => $title){ ?>
        <li>
            <a href="<?=$href ?>"class="navigace-odkaz">
                <?= $title ?>
            </a>
        </li>
        <?php } ?>
    </ul>
</div>

</nav>