function valorAgendamento() {
    sala = document.getElementById("id_sala").value;
    tipo = document.getElementById("tipo").value;
    if (sala == 1 && tipo == "Ensaio") {
        document.getElementById("valor").value = 250;
    } else if (sala == 1 && tipo == "Gravação") {
        document.getElementById("valor").value = 500;
    } else if (sala == 2 && tipo == "Ensaio") {
        document.getElementById("valor").value = 300;
    } else if (sala == 2 && tipo == "Gravação") {
        document.getElementById("valor").value = 600;
    } else if (sala == 3 && tipo == "Ensaio") {
        document.getElementById("valor").value = 400;
    } else if (sala == 3 && tipo == "Gravação") {
        document.getElementById("valor").value = 800;
    } else if (sala == 4 && tipo == "Ensaio") {
        document.getElementById("valor").value = 500;
    } else if (sala == 4 && tipo == "Gravação") {
        document.getElementById("valor").value = 1000;
    }
}