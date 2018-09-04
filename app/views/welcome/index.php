<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="static/img/favicon.png" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="https://code.getmdl.io/1.3.0/material.grey-blue.min.css">

    <link rel="stylesheet" type="text/css" href="static/css/plugins/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/app.css?v=<?=round(microtime(true) * 1000);?>">
</head>
<body>
<div class="layout-transparent mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title"><img src="static/img/logo.png" width="50px"/><?= $title ?></span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation -->
            <nav class="mdl-navigation">
                <div class="github-link">
                    <a class="mdl-navigation__link" target="_blank" href="https://github.com/deniojunior/sw-starship"><img src="static/img/github-logo.png"/>Código Fonte</a>
                </div>
            </nav>
        </div>
    </header>
    <main class="mdl-layout__content">
    </main>
</div>
<div class="sw-starship mdl-layout mdl-js-layout has-drawer is-upgraded">
    <main class="mdl-layout__content">

        <div class="sw-starship__upload mdl-grid">

            <span id="title-mobile"><img src="static/img/logo.png" width="50px"/><?=$title?></span>

            <div id="upload-container">

                <form id="calculate-form" method="POST">
                    <div class="input-container">
                        <div class="app-description">
                            <p><?=_("AppDescription")?></p>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" name="distance" id="distance">
                            <label class="mdl-textfield__label" for="distance"><?=_("TypeTheDistance")?></label>
                        </div>
                    </div>
                    <div class="meta meta--fill mdl-color-text--grey-600 justify-center">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                            <?=_("Calculate")?>
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </main>
    <div class="mdl-layout__obfuscator"></div>
</div>

<script src="static/js/plugins/jquery.min.js"></script>
<script defer src="static/js/plugins/material.min.js"></script>
<script src="static/js/plugins/promise-polyfill.min.js"></script>
<script src="static/js/plugins/sweetalert2.all.min.js"></script>
<script defer src="static/js/app.js"></script>

</body>
</html>