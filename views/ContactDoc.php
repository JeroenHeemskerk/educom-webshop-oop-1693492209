<?php
include_once "views/FormsDoc.php";

class ContactDoc extends FormsDoc {
    protected function showHeader(){
        echo "Contact";
    }
    protected function showFormContent(){
        if($this -> model -> valid){
            $this -> ShowThanksContent();
        } else {
            $this -> ShowContactContent();
        }
    }

    private function ShowContactContent(){
        $this -> showFirstPart();
        $this -> showFormField("Firstname","Voornaam:", $this -> model -> firstnameErr, $this -> model -> firstname);
        $this -> showFormField("Lastname","Achternaam:", $this -> model -> lastnameErr, $this -> model -> lastname);
        $this -> showFormField("Email","Email:", $this -> model -> emailErr, $this -> model -> email);
        $this -> showFormField("PhoneNum","Telefoonnummer:", $this -> model -> phoneErr, $this -> model -> phone);
        $this -> showLastPart();
    }

    private function showFirstPart(){echo '
        <div>
            <label class="form" for="Pref">aanhef:</label>
            <select name="Pref" id="Pref">
                <option name="choice" value="">maak uw keuze</option>
                <option name="Sir" value="Meneer" '; 
                if ($this -> model -> pref == "Meneer") echo 'selected="selected" '; 
                echo '>Meneer</option>
                <option name="Madam" value="Mevrouw" ' . ($this -> model -> pref == "Mevrouw" ? 'selected="selected"' : '') .'>Mevrouw</option>
                <option name="Nothing" value="Niet" ' . ($this -> model -> pref == "Niet" ? 'selected="selected"' : '') .'>Niet</option>
            </select>';
            echo '<span class="error">' . $this -> model -> prefErr . '</span>';
            echo '
        </div>';
    }
    private function showLastPart(){echo '
        <div>
            <label class="form" for="ComPref">Op welke manier wilt u bereikt worden?</label>
            <input type="radio" id="mail" name="ComPref" value="Email"';
                if ($this -> model -> compref) echo ($this -> model -> compref =="Email")?"checked":'' ;
            echo '>
            <label  for="mail">Email</label>
            <input type="radio" id="phone" name="ComPref" value="Telefoon" ';
                if ($this -> model -> compref) echo ($this -> model -> compref =="Telefoon")?"checked":'' ;
            echo '>
            <label  for="phone">Telefoon</label>';
            echo '<span class="error">' . $this -> model -> comprefErr . '</span>';
            echo '
        </div>
        <div>
            <label class="form" for="Feedback">Waarover wilt u contact opnemen?</label>
            <textarea id="Feedback" name="Feedback" rows="4" cols="50">'.
            ($this -> model -> feedback) . '</textarea>';
            echo '<span class="error">' . $this -> model -> feedbackErr . '</span>';
            echo '
        </div>';
    }

    private function ShowThanksContent() { echo '
        <a>Beste </a>';
        echo $this -> model -> pref;
        echo $this -> model -> firstname;
        echo $this -> model -> lastname; 
        echo '<br>
        <a>Bedankt voor het invullen van onze contact formulier.</a><br>
        <a>Wij zullen onze reactie sturen naar uw </a>'
        .(!empty($this -> model -> ComPref) ? $this -> model -> ComPref : '');
        echo '<br>
        <a>De informatie die u heeft ingevult: </a><br>
        <a>Email: </a>';
        echo $this -> model -> email;
        echo '<br>
        <a>Telefoonnummer: </a>';
        echo $this -> model -> phone; 
        echo '<br>
        <a>Uw feedback: </a>';
        echo $this -> model -> feedback; echo '<br>
    ';}
}