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

}
