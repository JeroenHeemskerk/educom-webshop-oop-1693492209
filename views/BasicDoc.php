<?php
include_once "views/HtmlDoc.php";

class BasicDoc extends HtmlDoc {
    protected $model;

    public function __construct($model){
        $this -> model = $model;
    }
    
    private function showTitle(){
        echo '<title>'; 
        $this -> showTitleName();
        echo '</title>';
    }
    protected function showTitleName(){}
    protected function showHeader(){}

    private function showCSSLink(){
        echo '<link rel="stylesheet" href="CSS/stylesheet.css">';
    }
    private function showMenu(){
        echo '
        <ul class="menu">'; 
            $this -> model -> createMenu(); 
        echo '</ul>
        ';
    }
    protected function showContent(){echo "test";}
    private function showFooter(){
        echo '
        <footer>
            <p>Copyright &copy; 2023 Stijn Engelmoer</p>
        </footer>
        ';
    }

    protected function showHeadContent(){
        $this -> showCSSLink();
        $this -> showTitle();
    }

    protected function showBodyContent(){
        echo '<h1>';
        $this -> showHeader();
        echo '</h1>';
        $this -> showMenu();
        $this -> showContent();
        $this -> showFooter();
    }
}