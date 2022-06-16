function lerMais () {
    let lerMais = document.getElementById('lerMais');
    let template = '';
    template = `<p class="lead">
    Para o profissional do estúdio, o acúmulo de tarefas é grande devido à suas
    funções que vão na maioria dos casos, desde a preparação de todos os
    equipamentos e instrumentos para gravação até a operação, manipulação e
    finalização de todos os dados de um projeto musical, o que torna o seu tempo livre
    para lidar com tarefas administrativas muito pequeno. Esse software gestor têm por finalidade auxiliar no atendimento ao cliente,
    agilizando assim, o tempo de espera do cliente e facilitando ao profissional que irá
    utilizá-lo, te um controle organizado e dinâmico dos dados e com facilidade de
    acesso.</p>
        <div class="btns">
    <p class="lead-mais">
        <p class="lead-mais">
        <button class="btn btn-lg btn-secondary fw-bold border-white bg-white" id="lerMenos" onclick="setTimeout(lerMenos, 100)">Ler menos</button>`
    lerMais.innerHTML = template;
}

function lerMenos () {
    let lerMais = document.getElementById('lerMais');
    let template = '';
    template = `<p class="lead" id=""> </p>
        
    <div class="btns">
    <p class="lead-mais">
        <button class="btn-exp" id="lerMais" onclick="setTimeout(lerMais, 100)">Ler mais</button>
        </p>`
    lerMais.innerHTML = template;
}