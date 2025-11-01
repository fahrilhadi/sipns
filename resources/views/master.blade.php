<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  {{-- CSS Files --}}
  @stack('prepend-style')
  @include('includes.style')
  @stack('addon-style')

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      {{-- navbar section --}}
      @include('includes.navbar')
      
      {{-- sidebar section --}}
      @include('includes.sidebar')

      <!-- Main Content -->
      @yield('content')
      
      {{-- footer section --}}
      @include('includes.footer')

    </div>
  </div>

  {{-- Js Scripts --}}
  @stack('prepend-script')
  @include('includes.script')
  @stack('addon-script')

</body>
</html>