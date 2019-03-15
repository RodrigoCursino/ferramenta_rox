<?php

use App\Dao\BugFix;
require './vendor/autoload.php';
$teste = new BugFix();
//echo "<pre>";
// print_r($teste->selectWithoutLatAndLon());
//echo "</pre>";

?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Título da Página (Estrutura básica de uma página com HTML 5)</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'App/Controller/controller.php?buscar=true',
                method: 'GET',
                success: function (response) {
                  var data = JSON.parse(response);
                  var id = 0;
                  for (var i = 0; data.length; i++) {
                      id = data[i].id;
                      $.ajax({
                          type     : "GET",
                          url      : "https://maps.googleapis.com/maps/api/geocode/json?address="+data[i].logradouro+"+"+data[i].bairro+",+"+data[i].cidade+",+"+data[i].uf+"&key=AIzaSyDN3nfKEqlBXfs6rYEQpxeYB6x6b_iePno",
                          dataType : 'json',
                          async    : false
                      }).done(function(resposta) {
                          console.log("Result ",id);
                          if (resposta && resposta.results) {
                              var location = resposta.results[0].geometry.location;
                              $.ajax({
                                  type     : "GET",
                                  url      : "App/Controller/controller.php?id=" + id + "&latitude=" + location.lat + "&longitude=" + location.lng ,
                                  dataType : 'json',
                                  async    : false
                              }).done(function(done) {
                                  console.log("Result ",data[i].nome + " | " + done);
                              });
                          }
                      });
                  }
                }
            })
        })
    </script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li>Home</li>
            <li>Contato</li>
        </ul>
    </nav>
</header>

<section>
    <article>
        <header>
            <h2>O título do artigo é aqui</h2>
            <p>Publicado em <time datetime="2015-03-09T13:00:24+01:00">09 de Março de 2015</time> por <a href="#">Author</a> - <a href="#comments">30 comentários</a></p>
        </header>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </article>

    <article>
        <header>
            <h2>O título do artigo é aqui</h2>
            <p>Publicado em <time datetime="2015-03-09T13:00:24+01:00">09 de Março de 2015</time> por <a href="#">Author</a> - <a href="#comments">15 comentários</a></p>
        </header>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </article>
</section>

<aside>
    <h2>Entre em contato</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</aside>

<footer>
    <p>Copyright 2015 Código Fonte©</p>
</footer>
</body>
</html>
