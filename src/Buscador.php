<?php

namespace Alura\BuscadorCursos;

use Churrasco;
use Guzzle\Http\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $HttpClient;
    private $Crawler;

    public function __construct(ClientInterface $client, Crawler $crawler)
    {
        $this->Crawler = $crawler;
        $this->HttpClient = $client;
    }

    public function buscar(string $url): array
    {
        $resposta = $this->HttpClient->get($url)->send();

        $html = $resposta->getBody();

        $this->Crawler->addHtmlContent($html);

        $elementosCursos = $this->Crawler->filter('span.card-curso__nome');

        $cursos = [];

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }

    public static function churras()
    {
        Churrasco::assar();
    }
}
