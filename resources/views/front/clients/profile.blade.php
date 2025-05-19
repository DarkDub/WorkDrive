<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/client-style/profile.css') }}">
</head>

<body>
    <div class="profile-container">
        <div class="header">
            <img src="{{ asset('image/fondo.jpg') }}" alt="Fondo" class="cover-photo">
            <div class="profile-pic-container">
                <img class="profile-pic" id="previewImage" src="{{ asset('storage/' . $user->registro->avatar) }}"
                    alt="Foto de perfil actual">
                <div>
                    <h2>{{ $user->registro->nombre }}</h2>
                    <p class="role">CTO</p>
                </div>

            </div>

        </div>

        <div class="nav-tabs">
            <button class="active"><i class="fas fa-user"></i> Profile</button>
            <button><i class="fas fa-briefcase"></i> Servicios</button>
            <button><i class="fas fa-clock-rotate-left"></i> Historial</button>
            <button><i class="fas fa-info-circle"></i> Info</button>
        </div>
        <div class="main-content">
            <aside class="sidebar">
                <div class="stats">
                    <div><strong>1,947</strong><span>Follower</span></div>
                    <div><strong>9,124</strong><span>Following</span></div>
                </div>

                <div class="about">
                    <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes.</p>
                    <ul>
                        <li><strong>📍</strong> {{ $user->registro->pais->nombre }}</li>
                        <li><strong>📧</strong> {{ $user->registro->email }}</li>
                        {{-- <li><strong>💼</strong> {{ $user->registro->profesiones }}</li> --}}
                        <li><strong>🎓</strong> Studied at Nikolaus - Leuschke</li>
                    </ul>
                </div>

                <div class="social">
                    <a href="#">🔵 Facebook</a>
                    <a href="#">🟣 Instagram</a>
                    <a href="#">🔷 LinkedIn</a>
                    <a href="#">❌ Twitter</a>
                </div>
            </aside>

            <section class="content">
                <div class="post-box">
                    <div class="post-actions">
                        <p class="info-p">
                            <i class="fas fa-user"></i>
                            Acerca de mi
                        </p>
                        <ul>
                            <li class="item-info-user"><strong>📍</strong>
                                {{ $user->registro->pais->nombre }}</li>
                            <li><strong>📧</strong> {{ $user->registro->email }}</li>
                            {{-- <li><strong>💼</strong> {{ $user->registro->profesiones }}</li> --}}
                            <li><strong>🎓</strong> Studied at Nikolaus - Leuschke</li>
                        </ul>
                    </div>
                </div>

                {{-- <div class="post">
                    <div class="post-header">
                        <strong>Jaydon Frankie</strong>
                        <span>19 May 2025</span>
                    </div>
                    <p>The sun slowly set over the horizon, painting the sky in vibrant hues of orange and pink.</p>
                    <img src="{{ asset('image/avatar-2.jpg') }}" alt="Sunset post">
                    <div class="reactions">
                        ❤️ 20 likes - 💬 5 comentarios
                    </div>
                </div> --}}
            </section>
        </div>
    </div>
</body>

</html>
