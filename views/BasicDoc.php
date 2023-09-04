<?php
include_once "../views/HtmlDoc.php";

class BasicDoc extends HtmlDoc {
    protected $data;

    public function __construct($myData){
        $this -> data = $myData;
    }

    private function showTitle(){
        echo '<title>'; echo $this -> data["page"]; echo '</title>';
    }
    private function showCSSLink(){?>
        <link rel="stylesheet" href="CSS/stylesheet.css">
        <?php
    }
    protected function showHeader(){
       echo '<h1>'; echo $this -> data["header"]; echo '</h1>';
    }
    private function showMenu(){
        ?>
        <ul class="menu">
            <li class="menuitem"><a href="index.php?page=home">Home</a></li>
            <li class="menuitem"><a href="index.php?page=about">About</a></li>
            <li class="menuitem"><a href="index.php?page=contact">Contact</a></li>
            <li class="menuitem"><a href="index.php?page=webshop">Webshop</a></li>
            <li class="menuitem"><a href="index.php?page=top5">Top 5</a></li>
            <li class="menuitem"><a href="index.php?page=changepassword">Verander wachtwoord</a></li>
            <li class="menuitem"><a href="index.php?page=shoppingcart">Shoppingcart</a></li>
            <li class="menuitem"><a href="index.php?page=logout">Logout s</a></li>
        </ul>
        <?php
    }
    protected function showContent(){echo "test";}
    private function showFooter(){
        ?>
        <footer>
            <p>Copyright &copy; 2023 Stijn Engelmoer</p>
        </footer>
        <?php
    }

    protected function showHeadContent(){
        $this -> showCSSLink();
        $this -> showTitle();
    }

    protected function showBodyContent(){
        $this -> showHeader();
        $this -> showMenu();
        $this -> showContent();
        $this -> showFooter();
    }
}