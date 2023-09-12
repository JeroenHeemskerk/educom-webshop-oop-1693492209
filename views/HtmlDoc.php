<?php

class HtmlDoc {
    private function showHTMLStart(){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        ';
    }
    private function showHeadStart(){
        echo '
        <head>
        ';
    }
    protected function showHeadContent(){
        echo '
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        ';
    }
    private function showHeadEnd(){
        echo '
        </head>
        ';
    }
    private function showbodyStart(){
        echo '
        <body>
        ';
    }
    protected function showBodyContent(){}
    private function showbodyEnd(){
        echo '
        </body>
        ';
    }
    private function showHTMLEnd(){
        echo '
        </html>
        ';
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