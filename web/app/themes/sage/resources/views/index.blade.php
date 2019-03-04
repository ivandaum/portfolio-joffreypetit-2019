@extends('layouts.app')

@section('content')
  <div class="container" role="document">
    <div class="scroll-helper">Scrollez pour faire défiler</div>
    <div class="projects-content">
      @foreach($projects as $project)
        <a href="{{ $project['url'] }}" class="projects-content__project" style="background-image:url('{{$project['preview']['image']}}')">
          <div>
            <h2 class="projects-content__project-title">{{ $project['title'] }}</h2>
            <span class="projects-content__project-subtitle">Voir le projet</span>
          </div>
        </a>
      @endforeach
    </div>
  </div>
@endsection
