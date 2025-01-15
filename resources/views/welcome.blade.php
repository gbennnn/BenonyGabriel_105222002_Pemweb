<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS Pemrograman Web</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <header>
        <h1>UAS Pemrograman Web</h1>
    </header>

    <main class="content">
        <div class="profile-picture">
            <img src="{{ asset('img/profile-pic-benony.png') }}" alt="Profile Picture Benony">
        </div>
        <h2>Benony Gabriel</h2>
        <p class="nim">NIM: 105222002</p>
        <a class="btn" href="{{ route('event.home') }}">Demo Project</a>


        <!-- Social Links -->
        <div class="social-links" style="margin-top: 50px;">
            <p>Source Code:</p>
            <a href="https://github.com/gbennnn/BenonyGabriel_105222002_Pemweb" target="_blank">
                <i class="ri-github-fill ri-2x"></i>
            </a>
        </div>
    </main>

</body>

</html>
