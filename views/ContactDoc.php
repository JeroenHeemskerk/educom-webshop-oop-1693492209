<?php
include_once "../views/FormsDoc.php";

class ContactDoc extends FormsDoc {
    
    protected function showFormContent(){
        $this -> showFirstPart();
        $this -> showFormField("Firstname","Voornaam:");
        $this -> showFormField("Lastname","Achternaam:");
        $this -> showFormField("Email","Email:");
        $this -> showFormField("PhoneNum","Telefoonnummer:");
        $this -> showLastPart();
    }
    private function showFirstPart(){
        echo '
        <label class="form" for="Pref">aanhef:</label>
                <select name="Pref" id="Pref">
                    <option name="choice" value="">maak uw keuze</option>
                    <option name="Sir" value="Meneer">Meneer</option>
                    <option name="Madam" value="Mevrouw">Mevrouw</option>
                    <option name="Nothing" value="Niet">Niet</option>
                </select>';
                echo '<span class="error"></span>';
                echo '
        </div>';
    }
    private function showFormField($for, $label){echo '
        <div>
            <label class="form" for=' . $for . '>' . $label . '</label>
            <input class="input" type="text" id=' . $for . ' name=' . $for. ' 
            value="">';
            echo '<span class="error"></span>';
            echo '
        </div>';
    }
    private function showLastPart(){
        echo '
            <div>
                <label class="form" for="ComPref">Op welke manier wilt u bereikt worden?</label>
                <input type="radio" id="mail" name="ComPref" value="Email">
                <label  for="mail">Email</label>
                <input type="radio" id="phone" name="ComPref" value="Telefoon">
                <label  for="phone">Telefoon</label>';
                echo '<span class="error"></span>';
                echo '
            </div>
            <div>
                <label class="form" for="Feedback">Waarover wilt u contact opnemen?</label>
                <textarea id="Feedback" name="Feedback" rows="4" cols="50"></textarea>';
                echo '<span class="error"></span>';
                echo '
            </div>';
    }
}