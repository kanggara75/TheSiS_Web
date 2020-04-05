<?php
        if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
                $uri = 'https://';
        } else {
                $uri = 'http://';
        }
        $uri .= "kanggara.net";
        header('Location: '.$uri.'/wp');
        exit;
?>
Something is wrong with the XAMPP installation :-(
