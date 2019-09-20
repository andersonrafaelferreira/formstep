$().ready(function() {

    $('form[name="jaFormTwo"]').hide();
    $('form[name="vaiFormTwo"]').hide();

    /*
        ja tem empresa =============================
    */ 
    $('form[name="jaFormOne"]').submit(function () {
        $('form[name="jaFormOne"]').hide();
        $('form[name="jaFormTwo"]').show();
        event.preventDefault();

        $.post("https://4pme.com/clientes/labaci/form/api/jainserir.php", {
            nome: $('#nome').val(),
            email: $('#email').val(),
            telefone: $('#telefone').val(),
        }, function(result){
            // console.log(result)
            //$("span").html(result);
        });
    });

    $('#jaBackStepOne').click(function () {
        $('form[name="jaFormOne"]').show();
        $('form[name="jaFormTwo"]').hide();
    });
  
    $('form[name="jaFormTwo"]').submit(function () {

        $.post("https://4pme.com/clientes/labaci/form/api/jainserir.php", {
            email: $('#email').val(),
            cnpj: $('#cnpj').val(),
            nomedaempresa: $('#nomedaempresa').val(),
            ndeempregados: $('#ndeempregados').val(),
            faturamentomensal: $('#faturamentomensal').val(),
            tipodeinstituicao: $('#tipodeinstituicao').val(),
            
        }, function(result){
            // console.log(result)
            $("#sucessoJa").html("SUA_MENSAGEM_DE_SUCESSO-ja tem empresa");
        });

        event.preventDefault();
    });

    /*
        ja tem empresa ============================= END
    */ 

    /*
        vai abrir empresa =============================
    */ 
   $('form[name="vaiFormOne"]').submit(function () {
    $('form[name="vaiFormOne"]').hide();
    $('form[name="vaiFormTwo"]').show();
    event.preventDefault();

    $.post("https://4pme.com/clientes/labaci/form/api/vaiinserir.php", {
        nome: $('#nomeVai').val(),
        email: $('#emailVai').val(),
        telefone: $('#telefoneVai').val(),
    }, function(result){
        // console.log(result)
        //$("span").html(result);
    });
});

$('#vaiBackStepOne').click(function () {
    $('form[name="vaiFormOne"]').show();
    $('form[name="vaiFormTwo"]').hide();
});

$('form[name="vaiFormTwo"]').submit(function () {

    $.post("https://4pme.com/clientes/labaci/form/api/vaiinserir.php", {
        email: $('#emailVai').val(),
        tipodeempresa: $('#tipodeempresa').val(),
        terafuncionarios: $('#terafuncionarios').val(),
        previsaodefaturamento: $('#previsaodefaturamento').val(),
        ramodeatividade: $('#ramodeatividade').val(),
    }, function(result){
        //console.log(result)
        $("#sucessoVai").html("SUA_MENSAGEM_DE_SUCESSO-vai abrir empresa");
    });

    event.preventDefault();
});

    console.log( "ready!" );
});