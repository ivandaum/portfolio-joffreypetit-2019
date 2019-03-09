@extends('layouts.app')

@section('content')
  <div class="container" role="document" data-router-view="home">
    <div class="scroll-helper">
      <span class="hidden-tablet hidden-phone">Scrollez pour faire défiler</span>
      <span class="hidden-desktop hidden-phone">Swipez pour faire défiler</span>
    </div>
    
    <div class="projects-content">
      @foreach($projects as $project)
        <a href="{{ $project['url'] }}" class="projects-content__project" data-src="{{$project['preview']['image']}}" style="background-image:url('{{$project['preview']['image']}}')">
          <div>
            <h2 class="projects-content__project-title">{{ $project['title'] }}</h2>
            <span class="projects-content__project-subtitle">Voir le projet</span>
          </div>
        </a>
      @endforeach
    </div>
  </div>
@endsection
