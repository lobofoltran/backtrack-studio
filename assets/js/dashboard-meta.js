metaGanhos = document.getElementById('meta_ganhos').className;
totalGanhos = document.getElementById('total_ganhos').className;
resultado = totalGanhos/metaGanhos;
resultado = resultado * 100;
document.getElementById('meta_ganhos').innerHTML = parseInt(resultado) + "%";

metaAgendamentos = document.getElementById('meta_agenda').className;
totalAgendamentos = document.getElementById('total_agend').className;
resultado1 = totalAgendamentos/metaAgendamentos;
resultado1 = resultado1 * 100;
document.getElementById('meta_agenda').innerHTML = parseInt(resultado1) + "%";

metaClientes = document.getElementById('meta_clientes').className;
totalClientes = document.getElementById('total_clientes').className;
resultado2 = totalClientes/metaClientes;
resultado2 = resultado2 * 100;
document.getElementById('meta_clientes').innerHTML = parseInt(resultado2) + "%";

// 

var val = resultado;
var $circle = $('#svg #bar');
    
if (isNaN(val)) {
    val = 100; 
}
else {
    var r = $circle.attr('r');
    var c = Math.PI*(r*2);
     
    if (val < 0) { val = 0;}
    if (val > 100) { val = 100;}
        
    var pct = ((100-val)/100)*c;
        
    $circle.css({ strokeDashoffset: pct});
}

// 

var val1 = resultado1;
var $circle = $('#svg1 #bar1');

if (isNaN(val1)) {
    val1 = 100; 
}
else {
    var r1 = $circle.attr('r');
    var c1 = Math.PI*(r1*2);
     
    if (val1 < 0) { val1 = 0;}
    if (val1 > 100) { val1 = 100;}
        
    var pct1 = ((100-val1)/100)*c1;
        
    $circle.css({ strokeDashoffset: pct1});
}

// 

var val2 = resultado2;
var $circle = $('#svg2 #bar2');

if (isNaN(val2)) {
    val2 = 100; 
}
else {
    var r2 = $circle.attr('r');
    var c2 = Math.PI*(r2*2);
     
    if (val2 < 0) { val2 = 0;}
    if (val2 > 100) { val2 = 100;}
        
    var pct2 = ((100-val2)/100)*c2;
        
    $circle.css({ strokeDashoffset: pct2});
}