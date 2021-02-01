<!DOCTYPE html>
<html lang="en">
<title>Horizon</title>
<style>
    body {
        background-image: url("./img/run4.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }
    h3{
        margin-left: 400px;
        margin-right: 400px;
    }

    .label{
        font-family: "Myriad CAD";
        letter-spacing: 2px;
        text-align: justify;
        margin-left: 450px;
        margin-right: 450px;
    }

    .central{
        text-align: center;
        scroll-snap-stop: normal;
        justify-content: center;
        align-items: center;
        font-family: "Myriad CAD";
        letter-spacing: 2px;
        font-size: 16px;
        color: white;
    }

    .letra {
        font-family: "Myriad CAD";
        letter-spacing: 8px;
        font-weight: 200;
        font-size: 100px;
        color: white;
        text-transform: uppercase;
        letter-spacing: 65px;
    }

    .img1 {
        margin: -12px;
    }

    .topico{

        display: list-item;
        list-style-type: disc;
        list-style-position: inside;
    }

    .column {
        float: left;
        width: 20%;
        padding: 0px;

    }
    .row::after {
        content: "";
        clear: both;
        display: table;

    }


    .img2{
        margin-left: 300px;
        margin-right: 300px;
    }

    .footer {
        padding: 80px;
        left: 0;
        bottom:0;
        margin: -12px;

        background-color: #000000;
        color: white;
        text-align: center;
    }
</style>

<body>
<div class="central">
    <h1 class="letra"><a href="index.php" style="text-decoration:none; color: inherit;">Horizon</a></h1>
    <div class="label">
        <h2>Sobre o Projeto</h2>
        <p>Este projeto consiste no desenvolvimento de uma plataforma focada não só na
            área de desporto, mas também de um ponto social e turístico, permitindo
            ter utilizadores de diferentes categorias.  O foco principal da aplicação
            será o mapeamento e o acompanhamento dos dados e estatísticas de
            cada utilizador. porém temos noção que ao determinar um sistema para apenas
            um público alvo o irá tornar virado apenas para uma vertente. Com isto queremos
            que a aplicação tenha como utilizadores tanto atletas como não atletas, e que os
            utilizadores possam tanto partilhar, acompanhar e adquirir conhecimentos dos locais
            que passam e das experiências vividas pelos nossos utilizadores.   </p>
        <br>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div>
        <img src="./img/running2.jpg" class="img1" width="2000" height="1000">
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="label">
        <h2>O que faz?</h2>
        <br>
        <p>A nossa plataforma estará subdividida em várias categorias:</p>
        <br>
        <p class="topico">Utilizador Atleta - Um utilizador de categoria atleta terá mais
            dados e estatísticas permitindo acompanhar as suas vitórias diárias, tais
            como quilómetros realizados, média de velocidade, tempo de percurso, batimento
            cardíaco, entre outros. Estes dados são de interesse individual para cada
            atleta, e teremos dados que podem ser ocultos dos outros utilizadores tal
            como a vista de perfil. Queremos uma aplicação onde o utilizador se sinta
            seguro e partilhe apenas os dados que queira partilhar. </p>
        <br>
        <p class="topico">Utilizador Espetador - Um utilizador de categoria espetador terá um
            ponto de vista diferente e terá menos recurso a dados pois sendo ou não sendo
            atleta, dados como tempo de percurso, batimento cardíaco, que podem não lhe
            interessar mantendo uma aplicação mais limpa. Desta forma iremos ter uma opção
            que o utilizador pode escolher para definir o seu estado na app e ter apenas
            como vista os dados que pretende ver. O utilizador espetador pode experienciar e
            acompanhar os percursos tais como provas ou experiências partilhadas por outros
            utilizadores e acompanhar de um certo modo a mesma experiência de diversos utilizadores. </p>
        <br>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div>
        <img src="./img/running.jpg" class="img1" width="2000" height="1000">
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="label">
        <h2>Equipa</h2>
        <br>

        <br>
    </div>
    <br>
    <br>
    <div class="centro">
        <div class="row">
            <div class="column">
                <img src="./img/duarte.png" class="img2">
                <h3> Duarte Pereira</h3>
            </div>
            <div class="column">
                <img src="./img/francisco.png" class="img2">
                <h3>Francisco Coelho</h3>
            </div>
            <div class="column">
                <img src="./img/tiago.png" class="img2">
                <h3>Tiago Jorge</h3>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <footer class="footer">
        <p>© 2020 Horizon</p>
    </footer>
</div>

</body>
</html>