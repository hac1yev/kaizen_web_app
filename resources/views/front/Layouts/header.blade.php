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
            <img src="{{ asset($setting->logo_kaizen_header) }} " alt="">
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
                        <a href="{{ route('tech') }}">Texnologiya</a>
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
                <form class="login-form" method="POST" action="{{ route('loginpost') }}" id="login">
                    @csrf
                    
                    <h4>Daxil olun</h4>
                    <div class="input-group login-form-div">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" type="text"
                            id="email" />
                    </div>
                    <div class="input-group login-form-div login-div-password mt-4">
                        <label for="password">Şifrə</label>
                        <a class="login-forgot" href="" data-target="#forgetModal" data-dismiss="modal" data-toggle="modal">Şifrənin bərpası</a>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Enter your password" class="form-control"
                            type="text" id="passwords" >
                            <img id="password_eye" src="https://kaizen.butagrup.az/back/assets/img/profile/eye.png" alt="eye" />
                        </div>
                    </div>
                    <button class="mt-4">Daxil olun</button>
                    <div class="login-dont-account">
                        Hesabınız yoxdur?
                        <a style="font-weight: 700;" data-dismiss="modal" id="signupLink" type="button" data-toggle="modal"
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
                <form class="login-form" method="POST" action="{{ route('registerpost') }}" id="register">
                    @csrf
                    
                    <h4>Qeydiyyatdan keçin</h4>
                    <div class="input-group login-form-div mt-2">
                        <label for="fullname">Ad Soyad</label>
                        <input type="text" placeholder="Ad və soyadınzı daxil edin" name="fullname" class="form-control"
                            id="fullname" />
                    </div>
                    <div class="input-group login-form-div mt-2">
                        <label for="username">İstifadəçi adı</label>
                        <input type="text" placeholder="İstifadəçi adını daxil edin" name="username"
                            class="form-control" id="username" />
                    </div>
                    <div class="input-group login-form-div mt-2">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Emailiniz daxil edin" name="email" class="form-control"
                            id="email" />
                    </div>
                    <div class="input-group login-form-div mt-2 login-div-password mt-4">
                        <label for="register_passwords">Password</label>
                        <div class="input-group">
                            <input type="password" id="register_passwords" placeholder="Şifrənizi daxil edin" name="password" class="form-control"
                            id="passwordss" />
                            <img id="register_password_eye" src="https://kaizen.butagrup.az/back/assets/img/profile/eye.png" alt="eye" />
                        </div>
                    </div>
                    <button class="mt-4">Qeydiyyatdan keç</button>
                    <div class="login-dont-account">
                        Artıq hesabınız var?
                        <a style="font-weight: 700;" data-dismiss="modal" id="signupLink" type="button" data-toggle="modal"
                            data-target="#loginModal">Daxil olun</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- FORGETMODAL -->
<div class="modal login-modal fade" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog login-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="login-form" method="POST" action="{{route('forget_post')}}" id="forget">
                    @csrf
                    <h4>Daxil olun</h4>
                    <div class="input-group login-form-div">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" type="text"
                            id="email" />
                    </div>
                    
                    <button class="mt-4">Göndər</button>
                    <div class="login-dont-account">
                        
                        <a data-dismiss="modal" id="signupLink" type="button" data-toggle="modal"
                            data-target="#loginModal">Geri</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FORGETMODAL -->



<!-- CONFIRM PASSWORD MODAL  -->

<div class="modal login-modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
    <div class="modal-dialog login-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="login-form" method="POST" action="{{route('confirm_post')}}" id="confirm">
                    @csrf
                    <input name="email_verification_code" type='hidden' value='{{ session('email_verification_code') }}' />
                    <h4>Daxil olun</h4>
                    <div class="input-group login-form-div mt-2 login-div-password mt-4">
                        <label for="password">Şifrə</label>
                        <div class="input-group">
                            <input type="password" placeholder="Şifrənizi daxil edin" name="password" class="form-control"
                            id="password" />
                            <img id="confirm_pass_eye" src="https://kaizen.butagrup.az/back/assets/img/profile/eye.png" alt="eye" />
                        </div>
                    </div>
                    <div class="input-group login-form-div mt-2 login-div-password mt-4">
                        <label for="password">Şifrənin təkrarı</label>
                        <div class="input-group">
                            <input type="password" placeholder="Şifrənizi daxil edin" name="password_confirmation" class="form-control"
                            id="password_confirmation" />
                            <img id="confirm_pass_eye2" src="https://kaizen.butagrup.az/back/assets/img/profile/eye.png" alt="eye" />
                        </div>
                    </div>
                    
                    <button class="mt-4">Göndər</button>
                    <div class="login-dont-account">
                        
                        <a data-dismiss="modal" id="signupLink" type="button" data-toggle="modal"
                            data-target="#forgetModal">Geri</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

