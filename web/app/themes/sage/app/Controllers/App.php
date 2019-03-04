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
}
