@extends('layouts.app')

@section('content')
  <div class="container" role="document">
    <div class="about-content">

      <div class="about-content__top">
        <div class="about-content__picture-1">
          <img src="{{ $about_pictures['top'] }}" alt="{{ $about_pictures['top'] }}" />
        </div>

        <div class="about-content__aboutme">
          <p class="about-content__aboutme-name">Joffrey Petit</p>
          <div class="about-content__aboutme-text">{!! $about_me !!}</div>
          <div class="about-content__aboutme-contact">
            @if($contact_information['email'])
              <a href="mailto:{{ $contact_information['email'] }}">{{ $contact_information['email'] }}</a>
            @endif
            @if($contact_information['tel'])
              <a href="tel:{{ $contact_information['tel'] }}">{{ App::splitTel($contact_information['tel']) }}</a>
            @endif
          </div>
        </div>
      </div>
      
      <div class="about-content__curriculum">
        <p class="about-content__curriculum-title">Curriculum vitae</p>

        <div class="about-content__curriculum-content">
        @foreach($resume as $type)
          <div class="about-content__curiculum-column">
            <h2>{{ $type['field'] }}</h2>
            @foreach($type['experience_year'] as $year)
              <p class="year">{{$year['experience_years']}}</p>
              @foreach($year['experience_title'] as $experience)
              <p>{{ $experience['title'] }}</p>
              @endforeach
            @endforeach
          </div>
        @endforeach
        </div>

        <div class="about-content__picture-2">
          <img src="{{ $about_pictures['bottom'] }}" alt="{{ $about_pictures['bottom'] }}" />
        </div>
      </div>
    </div>
  </div>
@endsection
