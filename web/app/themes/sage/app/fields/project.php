<?php
namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
$post = new FieldsBuilder(POST_TYPE__PROJECT);
$post
  ->setLocation('post_type', '==', POST_TYPE__PROJECT)
  ->addImage('preview_image',['label' => 'Image de prévisualisation'])
  ->addTextArea('description',['label' => 'Description du projet'])
  ->addRepeater('project_content', [
    'label' => 'Médias',
    'button_label' => 'Ajouter un média',
    'layout' => 'columns',
  ])
  ->addSelect('type')
    ->addChoice('image')
    ->setDefaultValue('image')
  ->addImage('image', [
    'label' => 'Image',
    'instructions' => '',
    'return_format' => 'array',
    'library' => 'all',
  ])
    ->conditional('type', '==', 'image')
  ->endRepeater();
return $post;