<?php
include_once "views/BasicDoc.php";

abstract class FormsDoc extends BasicDoc {
    protected function showContent(){
        $this -> showFormStart();
        $this -> showFormInput();
        $this -> showFormContent();
        $this -> showFormSubmit();
    }
    private function showFormStart(){
        echo '
        <form action="index.php" method="post" name=' . $this -> model -> page . ';>
        ';
    }
    private function showFormInput(){
        echo '
        <div>
            <input type="hidden" name="page" value=' . $this -> model -> page . '>
        </div>
        ';
    }
    protected function showFormPage(){}
    protected function showFormContent(){}

    private function showFormSubmit(){
        echo '
        <div>
            <input type="submit" value="verstuur">
        </div>
        ';
    }

    protected function showFormField($for, $label, $error, $value){echo '
        <div>
            <label class="form" for=' . $for . '>' . $label . '</label>
            <input class="input" type="text" id=' . $for . ' name=' . $for . ' 
            value="' . $value . '"><span class="error">' . $error . '</span>
        </div>';
    }
}