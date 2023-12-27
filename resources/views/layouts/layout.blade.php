<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Managment System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  {{-- Header  --}}
    @include('layouts.navigation')
  {{-- Header  --}}
  <main class="h-screen w-full bg-[#eff1f3]">
    @yield('content')
  </main>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" type="text/js"></script> -->
</body>

</html>