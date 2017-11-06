<?php

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php";

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>URL Google Maps API</title>
        <?php require_once "inc/header.php"; ?>
    </head>
    <body>
        <div class="uk-section">
            <div class="uk-container">
                <h3>Corto #6</h3>
                <a href="map.php">
                    <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Ver Mapa</button>
                </a>
                <form class="uk-section-muted" id="envioData">
                    <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
                        <div>
                            <label class="uk-form-label" for="latitud"><b>Latitud</b></label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="latitud" type="text" placeholder="Ingrese la Latitud">
                            </div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="longitud"><b>Longitud</b></label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="longitud" type="text" placeholder="Ingrese la Longitud">
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
                    <br id="space" />
                    <input class="uk-input uk-form-width-medium uk-form-large uk-width-1-1" type="submit" value="Enviar">
                </form>
                <br />
                <div>
                    <div class="uk-background-secondary uk-light uk-padding uk-panel">
                        <h4 class="uk-h4">Universidad Rafael Landívar</h4>
                        <p>Latitud: 14.605841, Longitud: -90.473829</p>
                        <button class="uk-button uk-button-default uk-align-right" id="loadURL">Cargar URL</button>
                        <br />
                        <h4 class="uk-h4">Universidad de San Carlos de Guatemala</h4>
                        <p>Latitud: 14.588188, Longitud: -90.551652</p>
                        <button class="uk-button uk-button-default uk-align-right" id="loadUSAC">Cargar USAC</button>
                        <br />
                        <h4 class="uk-h4">Universidad Francisco Marroquín</h4>
                        <p>Latitud: 14.606868, Longitud: -90.505406</p>
                        <button class="uk-button uk-button-default uk-align-right" id="loadUFM">Cargar UFM</button>
                        <br />
                        <h4 class="uk-h4">Universidad del Valle de Guatemala</h4>
                        <p>Latitud: 14.603762, Longitud: -90.489248</p>
                        <button class="uk-button uk-button-default uk-align-right" id="loadUVG">Cargar UVG</button>
                    </div>
                </div>
                <br />
                <div>
                    <div class="uk-background-primary uk-light uk-padding uk-panel">
                        <img src="img/File-Excel-icon.png" style="width: 100px; height: 100px; float: left; margin-left: 15%; margin-right: 15%;">
                        <br />
                        <a href="importData.php">
                            <button class="uk-button uk-button-default uk-align-left uk-width-1-2">Cargar Excel</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "inc/footer.php"; ?>
    </body>
</html>