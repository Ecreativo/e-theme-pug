/*!
 * fastshell
 * Fiercely quick and opinionated front-ends
 * https://HosseinKarami.github.io/fastshell
 * @author Hossein Karami
 * @version 1.0.3
 * Copyright 2014. MIT licensed.
 */
(function($, window, document, undefined) {

    'use strict';

    $(function() {
        // FastShell Place any jQuery/helper plugins in here.

        $(document).ready(function() {
            setTimeout(function() {
                $('.loader').fadeOut('slow');
            }, 1000)
        })
        /*
         * Translated default messages for the jQuery validation plugin.
         * Locale: ES
         */

        jQuery.extend(jQuery.validator.messages, {
            required: "No puedes dejar este campo en blanco.",
            remote: "Por favor, rellena este campo.",
            email: "Por favor, escribe una dirección de correo válida",
            url: "Por favor, escribe una URL válida.",
            date: "Por favor, escribe una fecha válida.",
            dateISO: "Por favor, escribe una fecha (ISO) válida.",
            number: "Por favor, escribe un número entero válido.",
            digits: "Por favor, escribe sólo dígitos.",
            creditcard: "Por favor, escribe un número de tarjeta válido.",
            equalTo: "Por favor, escribe el mismo valor de nuevo.",
            accept: "Por favor, escribe un valor con una extensión aceptada.",
            maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
            rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
            range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
            max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
            min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
        });

        function cargar() {
            $('.loader').fadeIn();
        }

        function descargar() {
            $('.loader').fadeOut();
        }

        $('#contactenos').validate({
            submitHandler: function(form) {
                cargar();
                $.post('includes/php.php', $('#contactenos').serialize())
                    .done(function(data) {
                        $('.form-control').val('');
                        descargar();
                        bootbox.alert(data, function() {
                            console.log("Alert Callback");
                        })
                    })
            }
        });
    });

})(jQuery, window, document);