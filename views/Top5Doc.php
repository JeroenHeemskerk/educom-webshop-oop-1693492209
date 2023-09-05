<?php
include_once "views/ProductDoc.php";

class Top5Doc extends ProductDoc {
    protected function showHeader(){
        echo "Top5";
    }
    protected function showContent(){echo '
        <p>Welkom bij de 5 best verkochte items alle tijden</p>
        <div class="Product">
            <p>plek ';echo $this -> data['place']; echo' best verkochte product deze week</p>
            <p>naam: ';echo $this -> data['name']; echo'</p>
            <a href="index.php?page=webshopitem&row="><img src="';echo $this -> data["filename"]; echo '" width="50%" height="50%"></a></p>
        </div>';
    }
}