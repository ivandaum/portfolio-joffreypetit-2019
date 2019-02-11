<?php
namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
$post = new FieldsBuilder(POST_TYPE__PROJECT);
$post
  ->setLocation('post_type', '==', POST_TYPE__PROJECT)
  ->addImage('Prévisualisation')
  ->addTextArea('Description')
  ->setInstructions('Quelques mots sur le projet.')
  ->addRepeater('project_repeater', [
    'label' => 'Médias',
    'button_label' => 'Ajouter un média',
    'layout' => 'block',
  ])
  ->addFile('projet_video', [
    'label' => 'Fichier',
    'instructions' => '',
    'return_format' => 'array',
    'library' => 'all',
  ])
  ->endRepeater();
return $post;