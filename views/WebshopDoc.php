<?php
include_once "views/ProductDoc.php";

class WebshopDoc extends ProductDoc {
    protected function showHeader(){
        echo "Webshop";
    }
    protected function showContent(){echo '
        <div class="webshopitem">
        <p>naam: ';echo $this -> data['name']; echo'</p>
        <a href="index.php?page=webshopitem&row="><img src="';echo $this -> data["filename"]; echo '" width="50%" height="50%"></a></p>
        </div>';
    }
}