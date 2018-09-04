<?php

class ApplicationUtil {

    public static function getLocale() {

        if (isset($_GET['locale'])) {

            $locale = $_GET['locale'];

            switch($locale) {
                case preg_match("/^pt_BR/", $locale) ? true : false :
                    Locale::SetDefault("pt_BR.utf-8");
                    $_SESSION['locale'] = "pt_BR.utf-8";
                    break;
            }
        }
    }

    public static function setLocale() {

        if (isset($_SESSION['locale'])) {
            Locale::SetDefault($_SESSION['locale']);
        }
        else {
            error_log(" Locale: " . Locale::GetDefault() . ", forçando para pt_BR.");

            Locale::SetDefault("pt_BR.utf-8");
            $_SESSION["locale"] = "pt_BR.utf-8";
        }

        self::getLocale();

        putenv("LANG=".Locale::GetDefault());
        setlocale(LC_ALL, Locale::GetDefault());
        bindtextdomain("messages", __DIR__ . "/../../locale");
        bind_textdomain_codeset('messages', 'UTF-8');
        textdomain("messages");
    }

}
