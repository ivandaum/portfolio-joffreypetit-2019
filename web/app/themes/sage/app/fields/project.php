<?php
namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
$post = new FieldsBuilder(POST_TYPE__PROJECT);
$post
  ->setLocation('post_type', '==', POST_TYPE__PROJECT)
  ->addImage('preview_image',['label' => 'Image de prévisualisation'])
  ->addFile('preview_video', [
    'label' => 'Vidéo de prévisualisation',
    'instructions' => 'Choisissez un fichier dans la médiathèque Wordpress',
    'required' => 0,
    'return_format' => 'array',
    'library' => 'all',
  ])
  ->addTextArea('description',['label' => 'Description du projet'])
  ->addRepeater('project_content', [
    'label' => 'Médias',
    'button_label' => 'Ajouter un média',
    'layout' => 'columns',
  ])
  ->addSelect('type')
    ->addChoice('youtube')
    ->addChoice('image')
    ->setDefaultValue('image')
  ->addImage('image', [
    'label' => 'Image',
    'instructions' => '',
    'return_format' => 'array',
    'library' => 'all',
  ])
    ->conditional('type', '==', 'image')
  ->addText('url',['label' => 'url'])
    ->conditional('type', '==', 'youtube')
  ->endRepeater();
return $post;