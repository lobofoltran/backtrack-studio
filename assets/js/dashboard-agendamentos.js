$(document).ready(function() {
    $('#id_sala').change(function(){
        var id_sala = $(this).val();
        var horario_disp1 = $(this).val();
        var horario_disp2 = $(this).val();
        var horario_disp3 = $(this).val();

        $.ajax({
            url: 'url',
            data: {
                id_sala: id_sala,
                horario_disp1: horario_disp1,
                horario_disp2: horario_disp2,
                horario_disp3: horario_disp3
            },
            type: 'POST',
            url: "pesquisa-horario.php",

            success: function(data){

                var html = '';

                $.each(data, function(){
                    html += "<option value='"+this.horario_disp1+"'>"+this.horario_disp1+"</option><option value='"+this.horario_disp2+"'>"+this.horario_disp2+"</option><option value='"+this.horario_disp3+"'>"+this.horario_disp3+"</option>";
                });

                $('#horario').html(html);
            }
        })
    })
})