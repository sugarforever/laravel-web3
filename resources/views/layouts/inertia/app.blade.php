<html>
  <head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/app.js') }}" defer></script>
    @inertiaHead
  </head>
  <body>
    @inertia

    <script>
        window.LoginUser = {
            name: {!! '"' . auth()->user()->name .'"' !!}
        }
    </script>
  </body>
</html>