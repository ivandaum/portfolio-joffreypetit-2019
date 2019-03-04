<header class="main-header">
  @if(is_home())
    <h1 class="main-header__title">{{ $title }} <span> {{ $subtitle }}</span></h1>
  @else
    <a href="/" class="main-header__title">{{ $title }} <span> {{ $subtitle }}</span></a>
  @endif
  <a href="/a-propos" class="main-header__about-link">À propos</a>
</header>