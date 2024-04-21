<?php

    $server = "localhost";
    $user = "root";
    $dbpw = "12345678";
    $db = "kreaton";

    $adb = mysqli_connect($server, $user, $dbpw, $db);

    function randomstring($h=10)
    {
        $c = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $s = "";

        for($i=1; $i<=$h; $i++)
        {
           $m = rand(0,61);
           $s.= substr($c, $m, 1); 
        }

        return $s;
    } 

    $quotes = [
        [
            'text' => 'Where friendship blooms, life is reborn.',
        ],
        [
            'text' => 'Find someone you care enough about to help you control your drinking. Preferably yourself.',
        ],
        [
            'text' => 'Friendship begins with a word.',
        ],
        [
            'text' => 'That\'s friendship, each playing the potter to see what shapes we can make of the other.',
        ],
        [
            'text' => 'Introverts treasure the close relationships they have stretched so much to make.',
        ],	
        [
            'text' => 'Made by the great Ahntastic.',
        ],	
    
    ];
    
    $quote = $quotes[array_rand($quotes)];
    $quoteAuthor = $quote['author'];
    $quoteText = $quote['text'];


?>