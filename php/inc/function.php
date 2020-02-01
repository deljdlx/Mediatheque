<?php

use ElBiniou\Deezer\Client;

function getArtists($search)
{
    $client = new Client();
    $data = $client->query('https://api.deezer.com/search?q=artist:"'.urlencode($search).'"');

    $artists = [];

    foreach ($data['data'] as $track) {
        $artists[$track['artist']['id']] = $track['artist'];
    }

    return array_values($artists);
}

function getSongs($search)
{
    $client = new Client();
    $data = $client->query('https://api.deezer.com/search?q=track:"'.urlencode($search).'"');

    $songs = [];

    foreach ($data['data'] as $track) {
        $songs[$track['title']] = $track;
    }
    return $songs;
}


function displayArtiste($data)
{
    $html = '<div class="artiste" id="artiste-'.$data['id'].'">';
        $html .= '<div class="image"><img src="' . $data['picture'] .'"/></div>';
        $html .= '<div class="name">' . $data['name'] .'</div>';
    $html .= '</div>';
    return $html;
}


function displaySong($data)
{

    $html = '<div class="song" id="'.htmlspecialchars($data['title']).'">';
        $html .= '<div class="cover"><img src="' . $data['album']['cover'] .'"/></div>';
        $html .= '<div class="name">' . $data['title'] .'</div>';
    $html .= '</div>';

    return $html;
}



