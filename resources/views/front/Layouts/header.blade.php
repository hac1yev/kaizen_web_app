<div class="hidden-menyu">
    <div class="hidden-menyu-container">
        <ul>
            <a type="button" style="color: #fff;" href="{{ route('profil') }}">
                <img src="{{ asset('back/assets/img/left-nav.png') }}" alt="">
                <span>Profil</span>
                <img src="{{ asset('back/assets/img/right-nav.png') }}" alt="">
            </a>

            <a href="{{ route('settings') }}">
                <img src="{{ asset('back/assets/img/left-nav.png') }}" alt="">
                <span>Ayarlar</span>
                <img src="{{ asset('back/assets/img/right-nav.png') }}" alt="">
            </a>

            <a href="{{ route('user') }}">
                <img src="{{ asset('back/assets/img/left-nav.png') }}" alt="">
                <span>İstifadəçilər</span>
                <img src="{{ asset('back/assets/img/right-nav.png') }}" alt="">
            </a>

            <a href="{{ route('share') }}">
                <img src="{{ asset('back/assets/img/left-nav.png') }}" alt="">
                <span>Bir məqalə paylaş</span>
                <img src="{{ asset('back/assets/img/right-nav.png') }}" alt="">
            </a>

            @if(auth()->check())
                <a href="{{ route('subc') }}">
                    <img src="{{ asset('back/assets/img/left-nav.png') }}" alt="">
                    @if(auth()->user()->subscribed == 1)
                        <span>E-poçt bildirişləri bağla</span>
                    @else
                        <span>E-poçt bildirişləri aç</span>
                    @endif
                    <img src="{{ asset('back/assets/img/right-nav.png') }}" alt="">
                </a>
            @endif



            <a href="{{ route('logouts') }}">
                <img src="{{ asset('back/assets/img/left-nav.png') }}" alt="">
                <span>Çıxış</span>
                <img src="{{ asset('back/assets/img/right-nav.png') }}" alt="">
            </a>
        </ul>
        <button class="close-hidden">X</button>
    </div>
</div>
<div class="all-header">
    <header class="container">
        <a href="{{ route('index') }}">
            <img src="{{ asset('back/assets/img/logo.png') }}" alt="">
        </a>
        <nav class="stroke">
            <ul>
                <div>
                    <li>
                        <a href="{{ route('ferdi') }}">Fərdi İnkişaf</a>
                    </li>
                    <li>
                        <a href="{{ route('travel') }}">Səyahət</a>
                    </li>
                    <li>
                        <a href="{{ route('story') }}">Hekayələr</a>
                    </li>
                </div>
                <div>
                    <li>
                        <a href="{{ route('film') }}">Filmlər</a>
                    </li>
                    <li>
                        <a href="#">Kateqoriyalar</a>
                    </li>
                    <li>
                        <a href="{{ route('biznes') }}">Biznes Dünyası</a>
                    </li>
                </div>

            </ul>
        </nav>
        <div class="search-menu">
            <button id="open-search">
                <img src="{{ asset('back/assets/img/search.png') }}" alt="">
            </button>
            @if(auth()->check())
                <button id="open-menu">
                    <img src="{{ asset('back/assets/img/menu.png') }}" alt="">
                </button>
            @else
                <button data-toggle="modal" data-target="#loginModal">
                    <img src="{{ asset('back/assets/img/menu.png') }}" alt="">
                </button>
            @endif

        </div>
    </header>
    <div class="line-1"></div>
    <div class="line-2"></div>

    <div class="search-bar">
        <form action="{{route('search')}}" method="GET">
            <input type="search" name="searching" value="{{ (isset($searchingVal)) ? $searchingVal : null }}" placeholder="Post, haştag axtar....">
        </form>
    </div>
</div>


<!-- MODAL -->
<div class="modal login-modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog login-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="login-form" method="POST" action="{{ route('loginpost') }}">
                    @csrf
                    <h4>Daxil olun</h4>
                    <div class="input-group login-form-div">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" type="text"
                            id="email" />
                    </div>
                    <div class="input-group login-form-div login-div-password mt-4">
                        <label for="password">Şifrə</label>
                        <a class="login-forgot" href="">Şifrənin bərpası</a>
                        <input type="password" name="password" placeholder="Enter your password" class="form-control"
                            type="text" id="password" />
                        <img src="https://kaizen.butagrup.az/back/assets/img/profile/eye.png" alt="eye" />
                    </div>
                    <button class="mt-4">Daxil olun</button>
                    <div class="login-dont-account">
                        Hesabınız yoxdur?
                        <a data-dismiss="modal" id="signupLink" type="button" data-toggle="modal"
                            data-target="#registerModal">Qeydiyyatdan keçin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- REGISTER MODAL -->
<div class="modal login-modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog login-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="login-form" method="POST" action="{{ route('registerpost') }}">
                    @csrf
                    <h4>Qeydiyyatdan keçin</h4>
                    <div class="input-group login-form-div">
                        <label for="fullname">Ad Soyad</label>
                        <input type="text" placeholder="Ad və soyadınzı daxil edin" name="fullname" class="form-control"
                            id="fullname" />
                    </div>
                    <div class="input-group login-form-div">
                        <label for="username">İstifadəçi adı</label>
                        <input type="text" placeholder="İstifadəçi adını daxil edin" name="username"
                            class="form-control" id="username" />
                    </div>
                    <div class="input-group login-form-div">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Emailiniz daxil edin" name="email" class="form-control"
                            id="email" />
                    </div>
                    <div class="input-group login-form-div login-div-password mt-4">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Şifrənizi daxil edin" name="password" class="form-control"
                            id="password" />
                        <img src="https://kaizen.butagrup.az/back/assets/img/profile/eye.png" alt="eye" />
                    </div>
                    <button class="mt-4">Qeydiyyatdan keç</button>
                    <div class="login-dont-account">
                        Artıq hesabınız var?
                        <a data-dismiss="modal" id="signupLink" type="button" data-toggle="modal"
                            data-target="#loginModal">Daxil olun</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
