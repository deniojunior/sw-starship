<?php

class WelcomeController {

    const DAY_HOURS = 24;
    const WEEK_HOURS = 24*7;
    const MONTH_HOURS = 24*30;
    const YEAR_HOURS = 24*365;

    public static function index() {
        $title       = gettext("Title");
        $description = gettext("Description");

        include("welcome/index.php");
    }

    public static function calculate() {

    }
}
