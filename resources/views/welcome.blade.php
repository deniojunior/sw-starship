<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Star Wars Starships</title>
    <meta name="description" content="Calculadora de paradas para reabastecimento de todas as naves espaciais de Star Wars">
    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="css/app.css?v=<?=round(microtime(true) * 1000);?>">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="layout-transparent mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title"><img src="images/logo.png" width="50px"/>Star Wars Starships</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation -->
            <nav class="mdl-navigation">
                <div class="github-link">
                    <a class="mdl-navigation__link" target="_blank" href="https://github.com/deniojunior/sw-starship"><img src="images/github-logo.png"/>Código Fonte</a>
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

            <span id="title-mobile"><img src="images/logo.png" width="50px"/>Star Wars Starships</span>

            <div id="form-container">

                <form id="calculate-form" method="POST">
                    <div class="input-container">
                        <div class="app-description">
                            <p> Olá! A função deste sistema é calcular quantas paradas para
                                reabastecimento de suprimentos cada nave espacial da saga Star Wars teria que fazer
                                para percorrer determinada distância. Insira a distância abaixo em Mega Lights (MGLT) e se surprenda!
                            </p>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" name="distance" id="distance" autocomplete="off">
                            <label class="mdl-textfield__label" for="distance">Informe a distância...</label>
                        </div>
                    </div>
                    <div class="meta meta--fill mdl-color-text--grey-600 justify-center">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                            Calcular
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </main>
    <div class="mdl-layout__obfuscator"></div>
</div>

<script defer src="js/mdl.js"></script>
<script defer src="js/app.js"></script>

</body>
</html>