<?php

class AuthView {

    function showFormLogin($error = null) {
        // la variable $error ahora se pasa directamente al archivo .phtml
        require 'templates/formLogin.phtml';
    }
}
