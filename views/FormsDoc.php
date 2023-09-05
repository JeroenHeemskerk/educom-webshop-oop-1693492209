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
        ?>
        <form action="index.php" method="post" name=<?php echo $this -> data["page"];?>>
        <?php
    }
    private function showFormInput(){
        ?>
        <div>
            <input type="hidden" name="page" value=<?php echo $this -> data["page"];?>>
        </div>
        <?php
    }

    protected function showFormContent(){}

    private function showFormSubmit(){
        ?>
        <div>
            <input type="submit" value="verstuur">
        </div>
        <?php
    }

    protected function showFormField($for, $label){echo '
        <div>
            <label class="form" for=' . $for . '>' . $label . '</label>
            <input class="input" type="text" id=' . $for . ' name=' . $for . ' 
            value=""><span class="error"></span>
        </div>';
    }
}