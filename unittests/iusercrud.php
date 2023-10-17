<?php
interface iusercrud {    
    public function UpdateUser(); 
    public function createUser();
    public function SaveUser();
    public function readUserByUserId();
    public function readUserByEmail();
}