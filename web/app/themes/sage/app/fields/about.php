<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Add Custom Admin page for general settings
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
        'page_title' 	=> 'À propos',
        'menu_title'	=> 'À propos',
        'menu_slug' 	=> 'a-propos',
        'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'position'    => 4
    ));
}

$currentYear = date('Y');
$years = [];
for($i = $currentYear; $i > $currentYear - 15; $i--) {
  // call_user_func_array(array(__NAMESPACE__ . $options, 'addChoice'), array($i));
  $years[] = $i;
}

$about = new FieldsBuilder('about');
$about
    ->setLocation('options_page', '==', 'a-propos')
    // ->addW
    ->addfile('resume', ['label' => 'CV'])
    ->addImage('image_1', [
      'label' => 'Image haute gauche',
      'instructions' => '',
      'return_format' => 'array',
      'library' => 'all',
    ])
    ->addImage('image_2', [
      'label' => 'Image basse droite',
      'instructions' => '',
      'return_format' => 'array',
      'library' => 'all',
    ])
    ->addRepeater('experiences', [
      'label' => 'Expériences',
      'button_label' => 'Ajouter un domaine',
      'layout' => 'columns',
    ])
      ->addText('field', ['label' => 'Domaine (tournage, mode, ...)'])
      ->addRepeater('experience_year', [
        'label' => 'Expériences',
        'button_label' => 'Ajouter une année',
        'layout' => 'columns',
      ])
        ->addSelect('experience_years')
        ->addChoices($years)
        ->setDefaultValue($years[0])
        ->addRepeater('experience_title', [
          'label' => 'Expériences',
          'button_label' => 'Ajouter une expérience',
          'layout' => 'row',
        ])
          ->addText('title', ['label' => 'Intitulé'])
        ->endRepeater()
      ->endRepeater()
    ->endRepeater();

return $about;