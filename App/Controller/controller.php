<?php
require '../../vendor/autoload.php';
$bugFix = new App\Dao\BugFix();

if(isset($_GET['id'])) {
  $bugFix->setLatitude($_GET['latitude'],$_GET['longitude'],$_GET['id']);
  echo json_encode('deu certo');
}

if(isset($_GET['buscar'])) {
  $array = $bugFix->selectWithoutLatAndLon();
  $json  = [];
  $pesquisa = [
      'id'         => '',
      'nome'       => '',
      'bairro'     => '',
      'cidade'     => '',
      'uf'         => '',
      'logradouro' => '',
  ];

  foreach ($bugFix->selectWithoutLatAndLon() as $chave => $valor){
      $pesquisa['nome']       = utf8_encode($valor['nome']);
      $pesquisa['logradouro'] = utf8_encode($valor['logradouro']);
      $pesquisa['cidade']     = utf8_encode($valor['cidade']);
      $pesquisa['uf']         = utf8_encode($valor['uf']);
      $pesquisa['bairro']     = utf8_encode($valor['bairro']);
      $pesquisa['id']         = $valor['id'];
      $json[$chave] = $pesquisa;
  }

   echo json_encode($json);

}