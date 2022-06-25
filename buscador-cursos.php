<?php

require('vendor/autoload.php');

Churrasco::assar();
oi();
exit;
use Alura\BuscadorCursos\Buscador;
use Guzzle\Http\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client('https://alura.com.br');
$crawler = new Crawler();

$Buscador = new Buscador($client, $crawler);

$cursos = $Buscador->buscar('/cursos-online-programacao/php');

foreach($cursos as $curso) {
    echo $curso . PHP_EOL;
}