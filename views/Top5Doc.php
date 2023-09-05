<?php
include_once "../views/ProductDoc.php";

class Top5Doc extends ProductDoc {
    protected function showContent(){echo '
        <p>Welkom bij de 5 best verkochte items alle tijden</p>
        <div class="Product">
            <p>plek  best verkochte product deze week</p>
            <p>naam: </p>
            <a href="index.php?page=webshopitem&row=" width="50%" height="50%"></a>
        </div>';
    }
}