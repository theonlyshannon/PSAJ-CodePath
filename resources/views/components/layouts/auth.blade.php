
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Aplikasi persiapan perkuliahan untuk siswa menengah. Maksimalkan potensimu siapkan diri untuk memasuki dunia perkuliahan!">
    <title>
        {{ $title ?? 'No Page' }}
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- favicons Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('app/image/icon.png') }}" />
    <link rel="manifest" href="{{ asset('app/images/favicons/site.webmanifest') }}" />

    <link rel="stylesheet" href="{{ asset('app/css/login.css') }}">



    @stack('app-style')
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/loader.png);"></div>
    </div>

    {{-- navbar --}}
    <div class="page-wrapper">

    <main>
        @include('sweetalert::alert')
        {{ $slot }}
    </main>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>



    @stack('script-app')
</body>

</html>
