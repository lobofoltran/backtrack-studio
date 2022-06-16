$("#cep").focusout(function(){
    $.ajax({
        url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
        dataType: 'json',
        success: function(r){
            $("#logradouro").val(r.logradouro);
            $("#bairro").val(r.bairro);
            $("#cidade").val(r.localidade);
            $("#uf").val(r.uf);
            $("#numero").focus();
        }
    });
});