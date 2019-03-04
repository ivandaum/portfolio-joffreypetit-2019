<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Add Custom Admin page for general settings
 */
// if( function_exists('acf_add_options_page') ) {
// 	acf_add_options_page(array(
//         'page_title' 	=> 'Introduction',
//         'menu_title'	=> 'Introduction',
//         'menu_slug' 	=> 'introduction',
//         'capability'	=> 'edit_posts',
//         'redirect'		=> false,
//         'position'    => 4
//     ));
// }

// $options = new FieldsBuilder('options');
// $options
//     ->setLocation('options_page', '==', 'introduction')
//     ->addfile('intro_video', ['label' => 'Vidéo d\'introduction'])
//     ->addText('intro_text_fr', [
//       'label' => 'Texte d\'introduction 🇫🇷',
//     ])
//     ->addText('intro_text_en', [
//       'label' => 'Texte d\'introduction 🇬🇧',
//     ]);

// return $options;