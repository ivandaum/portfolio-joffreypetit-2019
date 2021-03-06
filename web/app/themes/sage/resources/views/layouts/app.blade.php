<!doctype html>
<html {!! get_language_attributes() !!}>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    @php wp_head() @endphp
    <script type="text/javascript">var PROJECTS = {!!json_encode($projects)!!}</script>
  </head>

  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <main class="main wrap" data-router-wrapper>
      @yield('content')
    </main>
    <div class="loader"><div class="loading-bar"></div><span class="percent"></span></div>
    @php wp_footer() @endphp
  </body>
</html>
