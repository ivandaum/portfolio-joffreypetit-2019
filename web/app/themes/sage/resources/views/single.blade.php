@extends('layouts.app')

@section('content')
  <div class="container" role="document" data-router-view="single">
    <div class="project-content">

      @if(count($project['content']) > 3)
      <div class="project-content__navigation">
        <button class="project-content__navigation-left" data-direction="-1">←</button>
        <button class="project-content__navigation-right" data-direction="1">→</button>
      </div>
      @endif
      <div class="project-content__title">
        <h2 class="project-content__main-title">{{ $project['title'] }}</h2>
        @if($project['description'])<p class="project-content__main-subtitle">{{ $project['description'] }}</p>@endif
      </div>
      <div class="project-content__pictures">
        @for($i = 0; $i < count($project['content']); $i++)
          @if($i != 0 && $i % 3 == 0) </div> @endif
          @if($i % 3 == 0) <div class="project-content__group-picture"> @endif
          <img src="{{ $project['content'][$i]['url'] }}" alt="{{ $project['title'] . $i }}" class="project-content__picture" />
        @endfor
        </div>
      </div>
    </div>
  </div>
@endsection
