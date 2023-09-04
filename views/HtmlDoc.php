<?php

class HtmlDoc {
    private function showHTMLStart(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <?php 
    }
    private function showHeadStart(){
        ?>
        <head>
        <?php 
    }
    protected function showHeadContent(){
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php 
    }
    private function showHeadEnd(){
        ?>
        </head>
        <?php
    }
    private function showbodyStart(){
        ?>
        <body>
        <?php 
    }
    protected function showBodyContent(){}
    private function showbodyEnd(){
        ?>
        </body>
        <?php 
    }
    private function showHTMLEnd(){
        ?>
        </html>
        <?php 
    }
    public function show(){
        $this -> showHTMLStart();
        $this -> showHeadStart();
        $this -> showHeadContent();
        $this -> showHeadEnd();
        $this -> showbodyStart();
        $this -> showBodyContent();
        $this -> showbodyEnd();
        $this -> showHTMLEnd();
    }
}