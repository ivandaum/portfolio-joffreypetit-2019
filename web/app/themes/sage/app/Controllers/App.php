<?php

namespace App\Controllers;

use Sober\Controller\Controller;

\App\Model\Project::getInstance();

class App extends Controller
{
    public function projects() {
      $projects = \App\Model\Project::getLast();
      return $projects;
    }

    static public function splitTel($tel) {
      $arr = str_split($tel);
      $out = "";
      for($i = 0; $i < count($arr); $i++) {
        if($i % 2 == 0 ) $out .= " ";

        $out .= $arr[$i];
      }
      return $out;
    }

    public function title() {
      return get_bloginfo('title');
    }

    public function subtitle() {
      return get_bloginfo('description');
    }

    public function project() {
      if(!is_single()) return [];

      foreach($this->data['projects'] as $project) {
        if($project['id'] == $this->post->ID) return $project;
      }
      
      return [];
    }

    public function contactInformation() {
      return [
        'email' => get_field('contact_email','option'),
        'tel' => get_field('contact_tel','option')
      ];
    }

    public function aboutMe() {
      return get_field('description','option');
    }

    public function resume() {
      return get_field('experiences','option');
    }

    public function resumePdf() {
      return get_field('resume','option');
    }

    public function aboutPictures() {
      return [
        'top' => get_field('image_1','option')['sizes']['large'],
        'bottom' => get_field('image_2','option')['sizes']['large']
      ];
    }
}
