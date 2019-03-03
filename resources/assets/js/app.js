
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

function clean_form() {
    // Limpa valores do formulário de cep.
    $("input[name=address]").val("");
    $("input[name=district]").val("");
    $("input[name=city]").val("");
    $("input[name=state]").val("");
}

$(document).ready(function () {
    var campoCep = $('input[name=postal_code]');

    campoCep.mask('00000-000');

    campoCep.blur(function() {
        var cep = $(this).val().replace(/\D/g, '');

        if (cep != "") {

            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {

                $("input[name=address]").val("...");
                $("input[name=district]").val("...");
                $("input[name=city]").val("...");
                $("input[name=state]").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("input[name=address]").val(dados.logradouro);
                        $("input[name=district]").val(dados.bairro);
                        $("input[name=city]").val(dados.localidade);
                        $("input[name=state]").val(dados.uf);
                    } else {
                        clean_form();
                        alert("CEP não encontrado.");
                    }
                });
            } else {
                clean_form();
                alert("Formato de CEP inválido.");
            }
        } else {
            clean_form();
        }
    });

});
