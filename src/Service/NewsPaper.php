<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class NewsPaper
{
    private $client;
    public function __construct(HttpClientInterface $client)
    {
       $this->client = $client;

    }

    //Méthode pour récupérer les news via l'API avec la catégorie en paramètre
    private function getApi(string $category)
    {
        $response = $this->client->request(
            'GET',
            'https://inshorts.deta.dev/news?category=' . $category
        );

        return $response->toArray();
    }

    //Méthode pour le rendu des news
    public function getNews(string $category)
    {
        return $this->getApi($category);
    }
}