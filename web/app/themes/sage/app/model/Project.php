<?php

namespace App\Model;

class Project
{
  private static $instance = null;

  public function __construct() {}

  public static function getInstance() {
    if(is_null(self::$instance)) {
      self::$instance = new Project();
    }
    return self::$instance;
  }

  public static function getLast() {
    $args = [
      'posts_per_page' => -1,
      'post_type' => array(POST_TYPE__PROJECT)
    ];

    $query = new \WP_Query($args);
    return self::format($query->posts);
  }

  public static function format($array = []) {
    $output = [];

    foreach($array as $k => $p) {
      $f = [];
      $f['id'] = $p->ID;

      $f['url'] = \get_permalink($p->ID);
      $f['type'] = $p->post_type;
      $f['slug'] = $p->slug;
      $f['title'] = $p->post_title;
      $f['description'] = get_field('description',$p->ID);
      
      $f['preview'] = [
        'image' => get_field('preview_image',$p->ID)['sizes']['large'] ?: null
      ];

      $f['content'] = [];
      $content = get_field('project_content', $p->ID) ?: [];

      foreach($content as $c) {
        $entry = [];

        $type = !isset($c['type']) ?: $c['type'];
        if(!$type) continue;

        if($type == 'image') {
          $entry = [
            'type' => 'image',
            'url' => $c['image']['sizes']['large']
          ];
        }

        $f['content'][] = $entry;
      }

      $output[] = $f;
    }

    return $output;
  }
}
