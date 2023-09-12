<?php
include_once "views/FormsDoc.php";

class AddProductDoc extends FormsDoc {
    protected function showFormPage(){
        echo 'addproduct';
    }
    protected function showHeader(){
        echo "AddProduct";
    }
    protected function showFormContent(){
        $this -> ShowAddProductContent();
    }
    private function ShowAddProductContent(){
        $this -> showFormField("name","naam:", $this -> model -> nameErr, $this -> model -> name);
        $this -> showFormField("description","beschrijving:", $this -> model -> descriptionErr, $this -> model -> description);
        $this -> showFormField("price","prijs:", $this -> model -> priceErr, $this -> model -> price);
        $this -> showFileField();
    }
    private function showFileField(){echo'
        <div>
            <label class="form" for="filename">filename:</label>
            <input class="input" type="file" id="fileToUpload" name="fileToUpload" 
            value="' . $this -> model -> filename . '"><span class="error">' . $this -> model -> filenameErr . '</span>
        </div>
        ';
    }
}