$().ready(function() {

    $('form[name="jaFormTwo"]').hide();
    $('form[name="vaiFormTwo"]').hide();

    $('form[name="jaFormOne"]').submit(function () {
        $('form[name="jaFormOne"]').hide();
        $('form[name="jaFormTwo"]').show();
        event.preventDefault();
        alert($('#nome').val() + $('#email').val() + $('#telefone').val())

        $.post("", {
            nome: $('#nome').val(),
            nome: $('#email').val(),
            nome: $('#telefone').val(),
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
       alert($('#nome').val() + $('#email').val() + $('#telefone').val())
       event.preventDefault();
    });

    console.log( "ready!" );
});