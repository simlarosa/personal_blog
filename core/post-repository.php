<?php
$filename = __DIR__ . DIRECTORY_SEPARATOR .
    'post.json';

    $postToWrite = [
        [
            'title'=> "I miei viaggi in giro per il mondo",
            'content' => "Per tanto tempo ho viaggiato in giro per il mondo alla ricerca di tante cose da fare, tra ljubiana, Malta, Firenze vi racconto quali sono state le mie avventure e cosa ho imparato",
            'tag' => ['Viaggio', 'Filmmaking']
        ],
        [
            'title'=> "Che bella la vita da sviluppatore",
            'content' => "È risaputo che da qualche giorno sto facendo il corso PED academy, è sto imparando davvero parecchie cose come Javascript, HTML, PHP e Bootstrap",
            'tag' => ['Programmazione', 'Formazione', 'Tecnologia']
        ],
        [
            'title'=> "Vi racconto il mio filmmaking",
            'content' => "Regia movimenta, camera a mano e tanto movimento questo è lo stile che mi contraddistingue. Dopo il mio primo corto, la stampa internazionale ha dato importaza al mio cinema, un cinema che parla degli ultimi e di supereroi, quelli veri.",
            'tag' => ['Viaggio', 'Filmmaking']
        ]
    ];

function writePostToFile($title, $content, $tag){
    global $filename;
    $rawData = file_get_contents($filename);
    $posts = json_decode($rawData, true);
    $posts[] = array("title" => $title, "content" => $content, "tag" => $tag);
    file_put_contents($filename, json_encode($posts, JSON_UNESCAPED_UNICODE));
}

function getAllPostsByTag($tag){
    global $filename;
    $rawData = file_get_contents($filename);
    $posts = json_decode($rawData, true);

    foreach($posts as $post){
        foreach($post['tag'] as $single_tag){
            if($single_tag == $tag){
                $tempPosts[] = $post;
            }
        }
    }

    $posts = $tempPosts;
    return $posts;
}


$rawData = file_get_contents($filename);
$posts = json_decode($rawData, true);

