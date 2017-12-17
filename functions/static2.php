<?php

function nm_scripts(){
    wp_register_script( 'cPlayer',  NM_URL . '/cPlayer-1.1/dist/cPlayer.min.js', array(), ,false);
}

add_action('wp_head', 'nm_scripts');