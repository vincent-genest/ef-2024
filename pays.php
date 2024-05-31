<?php
/*
 * Plugin Name: Pays
 * Description: Crée une liste de boutons pour classr par pays
 * Author: Vincent Genest
 * Author URI: https://github.com/vincent-genest
 * Version: 1.0.0
 */


function ec_pays_enqueue()
{
// filemtime // retourne en milliseconde le temps de la dernière modification
// plugin_dir_path // retourne le chemin du répertoire du plugin
// __FILE__ // le fichier en train de s'exécuter
// wp_enqueue_style() // Intègre le link:css dans la page
// wp_enqueue_script() // intègre le script dans la page
// wp_enqueue_scripts // le hook
 
$version_css = filemtime(plugin_dir_path( __FILE__ ) . "style.css");
$version_js = filemtime(plugin_dir_path(__FILE__) . "js/pays.js");
wp_enqueue_style(   'em_plugin_pays_css',
                     plugin_dir_url(__FILE__) . "style.css",
                     array(),
                     $version_css);
 
wp_enqueue_script(  'em_plugin_pays_js',
                    plugin_dir_url(__FILE__) ."js/pays.js",
                    array(),
                    $version_js,
                    true);
}
add_action('wp_enqueue_scripts', 'ec_pays_enqueue');

/* Création de la liste des destinations en HTML */
function creation_pays(){
    $pays = array("France","États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse");
    $contenu = ' <div class="contenu__categories categories__type">';
    foreach ($pays as $pays) {
        $contenu .= '<button id="'. $pays. '"class="bouton__pays">' . $pays . '</button>';
    }
    $contenu .= '
    <div class="contenu__pays"></div>';
    return $contenu;
}
 
add_shortcode('em_pays', 'creation_pays');