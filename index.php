<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 16/12/2016
 * Time: 13:44
 */
require 'vendor/autoload.php';
require_once "config.php";
use Controller\indexController;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;


$app->get('/', function ($request, $response, $args) {

});

//tout les match d'une équipe
$app->get('/last-score/{name}', function ($request, $response, $args) {

    // var declaration
    $name = $args['name'];
    $client = new Client();
    $crawler = $client->request('GET', 'http://www.matchendirect.fr/equipe/' . $name . '.html');
    $finalTab = [];
    
    // tableau contenant le nom des équipe à domicile
    $array_domicile = $crawler->filter('.lm3_eq1')->each(function ($node) {
        return $node->text();
    });

    // tableau contenant les scores
    $array_score = $crawler->filter('.lm3_score')->each(function ($node) {
        return $node->text();
    });

    // tableau contenant le nom des équipe à l'exterieur
    $array_exterieur = $crawler->filter('.lm3_eq2')->each(function ($node) {
        return $node->text();
    });

    // on crée le tableau de réponse
    foreach ($array_domicile as $key => $item){
        $finalTab[$key] = array('id' => ($key+1), 'equipe_domicile' => $item, 'score' => $array_score[$key], 'equipe_exterieur' => $array_exterieur[$key]);
    }

    // return results in JSON
    return json_encode($finalTab);
});

// dernière journée de championnat
$app->get('/pays/{name}/championnat/{name-champ}', function ($request, $response, $args) {

    // var declaration
    $name = $args['name'];
    $champ = $args['name-champ'];
    $tab = [];
    $client = new Client();
    $crawler = $client->request('GET', 'http://www.matchendirect.fr/' . $name . '/' . $champ . '/');
    $finalTab = [];

    // get information from page
    $tab = $crawler->filter('.lm3 span')->each(function ($node) {
        return $node->text();
    });

    // construct tab results
    foreach ($tab as $key => $item) {

        $match[] = $item;

        if (($key + 1) % 3 == 0) {
            $finalTab[] = $match;
            $match = [];
        }
    }

    // return results in JSON
    return json_encode($finalTab);
});

// journée de championnat
$app->get('/pays/{name}/championnat/{name-champ}/date/{annee-jour}', function ($request, $response, $args) {

    // var declaration
    $id = 0;
    $name = $args['name'];
    $champ = $args['name-champ'];
    $date = $args['annee-jour'];
    $tab = [];
    $client = new Client();
    $crawler = $client->request('GET', 'http://www.matchendirect.fr/' . $name . '/' . $champ . '/' . $date . '/');
    $finalTab = [];
    $tabRes = [];

    // get information from page
    $tab = $crawler->filter('.lm3 span')->each(function ($node) {
        return $node->text();
    });

    // construct tab results
    foreach ($tab as $key => $item) {

        $match[] = $item;

        if (($key + 1) % 3 == 0) {
            $finalTab[] = $match;
            $match = [];
        }
    }

    // return results in JSON
    return json_encode($finalTab);
});

//score d'un match
$app->get('/live-score/{name-dom}-{name-ext}', function ($request, $response, $args) {

    // var declaration
    $domicile = $args['name-dom'];
    $exterieur = $args['name-ext'];
    $client = new Client();
    $crawler = $client->request('GET', 'http://www.matchendirect.fr/live-score/' . $domicile . '-' . $exterieur . '.html');
    $finalTab = [];

    // get information from page
    $domicile = $crawler->filter('.blocmatch .col1')->each(function ($node) {
        return $node->text();
    });
    $domicile_score = $crawler->filter('.blocmatch .col2')->each(function ($node) {
        return $node->text();
    });
    $exterieur_score = $crawler->filter('.blocmatch .col3')->each(function ($node) {
        return $node->text();
    });
    $exterieur = $crawler->filter('.blocmatch .col4')->each(function ($node) {
        return $node->text();
    });

    // construct tab results
    $finalTab[] = $domicile;
    $finalTab[] = $domicile_score;
    $finalTab[] = $exterieur_score;
    $finalTab[] = $exterieur;

    // return results in JSON
    return json_encode($finalTab);
});

// classement
$app->get('/classement/pays/{name}/championnat/{name-champ}', function ($request, $response, $args) {

    // var declaration
    $name = $args['name'];
    $champ = $args['name-champ'];
    $tabEquipe = [];
    $tabPts = [];
    $client = new Client();
    $crawler = $client->request('GET', 'http://www.matchendirect.fr/classement-foot/' . $name . '/classement-' . $champ . '.html');
    $finalTab = [];

    // get information from page
    $tabEquipe = $crawler->filter('.equipe')->each(function ($node) {
        return $node->text();
    });
    $tabPts = $crawler->filter('.tableau b')->each(function ($node) {
        return $node->text();
    });

    // construct tab results
    foreach ($tabEquipe as $key => $item){
        $finalTab[$key] = array('place' => ($key+1), 'equipe' => substr($item, 1), 'points' => (int)$tabPts[$key]);
    }


    // return results in JSON
    return json_encode($finalTab);
});

$app->run();