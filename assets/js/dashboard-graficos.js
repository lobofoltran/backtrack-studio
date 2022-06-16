function opcoesGrafico() {
    opc = document.getElementById('grafico').value;
    switch (opc) {
        case '1':
            document.getElementById('divOpcoes').innerHTML = `
            <div id="divOpcoes">
                <p>Selecione o dia:</p>
                <input type="date" required>
            </div>
            `
            break;
        case '2':
            document.getElementById('divOpcoes').innerHTML = `
            <div id="divOpcoes">
                <p>Selecione o mês e o ano:</p>
                <input type="month" required>
            </div>
            `
            break;
        case '3':
            document.getElementById('divOpcoes').innerHTML = `
            <div id="divOpcoes">
               <p>Digite o ano:</p>
               <input type="number" required>
            </div>
            `
            break;
        case '4':
            document.getElementById('divOpcoes').innerHTML = `
            <div id="divOpcoes">
                <p>Data início:</p>
                <input type="date" required>
                <p>Data final:</p>
                <input type="date" required>
            </div>
            `
            break;
        case '5':
            document.getElementById('divOpcoes').innerHTML = `
            <div id="divOpcoes" required hidden>
            </div>
            `
        break;
    }
}