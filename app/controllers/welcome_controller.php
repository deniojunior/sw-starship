<?php

class WelcomeController {

    public static function index(){
        $title       = gettext("Title");
        $description = gettext("Description");

        include("welcome/index.php");
    }
}
