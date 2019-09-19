$().ready(function() {

    $('form[name="jaFormTwo"]').hide();
    $('form[name="vaiFormTwo"]').hide();

    $('form[name="jaFormOne"]').submit(function () {
        $('form[name="jaFormOne"]').hide();
        $('form[name="jaFormTwo"]').show();
        event.preventDefault();

        $.post("https://4pme.com/clientes/labaci/form/api/jainserir.php", {
            nome: $('#nome').val(),
            email: $('#email').val(),
            telefone: $('#telefone').val(),
        }, function(result){
            console.log(result)
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
            console.log(result)
            //$("span").html(result);
        });


        event.preventDefault();
    });

    function excluir(id, bd){
        $.post("https://4pme.com/clientes/labaci/form/api/excluir.php", {
            id: id,
            bd: bd
        }, function(result){
            console.log(result)
            //$("span").html(result);
        });
    };

    console.log( "ready!" );
});