@extends('front.Layouts.master')

@section('content')

    <div class="settings-head mt-2">
        <ul>
            <li id="verification">
                VERİFİKASİYA
            </li>
            <li id="notification">
                BİLDİRİŞLƏR
            </li>
            <li id="change_email">
                E-MAİLİ DƏYİŞDİRİN
            </li>
            <li id="change_password">
                ŞİFRƏNİZİ DƏYİŞDİRİN
            </li>
            <li id="forget_password">
                ŞİFRƏNİZİ UNUTMUSUNUZ?
            </li>
            <li id="load_information">
                İSTİFADƏÇİ MƏLUMATLARINI YÜKLƏYİN
            </li>
            <li id="delete_account"> 
                HESABI SİLİN
            </li>
        </ul>
    </div>

    <div class="container settings-container">
        <div class="row settings-row">
            <div class="col-md-8 settings-ver-wrap">
                <div class="row">
                    <div class="col-md-6 px-0 settings-verification-col">
                        <div id="verification_block" class="settings-verification">
                            <h3>Verifikasiya</h3>
                            <span>
                                Təsdiqləmə sizin post paylaşmağınıza icazə verir və sizi platformamızın daimi istifadəçisinə
                                çevirir 😉.
                                @if($user->verified == 1)
                                    <div class="alert alert-success" role="alert">Hesabınız artıq aktivdir 🙂.</div>
                                @else
                                    <form action="{{ route('activation') }}" class="mt-3" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-lg active-account-button">Hesabı
                                            aktivləşdir</button>
                                    </form>
                                @endif
                            </span>
                        </div>
                        <div class="verification-image">
                            <img class="img-fluid w-100" src="back/assets/img/settings.png" alt="settings" />
                        </div>
                    </div>
                    <div class="col-md-6 px-0 settings-notification-col">
                        <div class="verification-image">
                            <img class="img-fluid w-100" src="back/assets/img/settings.png" alt="settings" />
                        </div>
                        <div class="settings-notifications" id="notification_block">
                            <h3>BİLDİRİŞLƏR</h3>
                            <p class="confirm-wait-posts" data-toggle="modal" data-target="#confirmWaitPosts">
                                Təsdiqlənən postlar <span></span>
                            </p>

                            <p class="confirmed-posts" data-toggle="modal" data-target="#confirmWaitPosts"> x
                                Təsdiqi gözləyən postlar <span></span>
                            </p>
                        </div>
                    </div>
                    <div class="chess-wrapper">
                        <div class="chess-wrapper-1">
                            <div class="settings-chess">
                                <div class="chess-1"></div>
                                <div class="chess-2"></div>
                            </div>
                            <div class="settings-chess">
                                <div class="chess-2"></div>
                                <div class="chess-1"></div>
                            </div>
                        </div>
                        <div class="chess-wrapper-2">
                            <div class="settings-chess">
                                <div class="chess-1"></div>
                                <div class="chess-2"></div>
                            </div>
                            <div class="settings-chess">
                                <div class="chess-2"></div>
                                <div class="chess-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-4 px-0 settings-change-wrap">
                <div class="settings-change-email" id="change_email_block">
                    <h3>E-MAİLİ DƏYİŞDİRİN</h3>
                    <span>Verifikasiya edilmiş hesab ilə e-poçtanızı dəyişə bilərsiniz</span>
                    @if($user->verified == 0)
                        <h4 style="color:red;font-size: 0.83em">Ilk öncə verifikasiyadan keçməlisiniz</h4>
                    @else
                        <form method="POST" action="{{ route('changeEmail') }}" id="emaildeyis">
                            @csrf
                            <div class="input-group">
                                <input class="disable-on-click" placeholder="E-poçt daxil edin!" type="email" name="email" />

                            </div>
                            <button>Dəyiş</button>
                        </form>
                    @endif
                </div>
                <div class="settings-change-password" id="change_password_block">
                    <h3>ŞİFRƏNİZİ DƏYİŞDİRİN</h3>
                    <span>Verifikasiya edilmiş hesab ilə e-poçtanızı dəyişə bilərsiniz</span>
                    @if($user->verified == 0)
                        <h4 style="color:red;font-size: 0.83em">Ilk öncə verifikasiyadan keçməlisiniz</h4>
                    @else
                        <form method="POST" action="{{ route('changePass') }}" id="sifredeyis">
                            @csrf
                            <div class="change-pass-div">
                                <label for="current_pass">Hazırki şifrə</label>
                                <input class="disable-on-click" type="password" id="current_pass" placeholder="Parolu daxil edin" name="password" />
                            </div>
                            <div class="change-pass-div">
                                <label for="new_pass">Yeni şifrə</label>
                                <input class="disable-on-click" type="password" id="new_pass" placeholder="Parolu daxil edin" name="newpass" />
                            </div>
                            <div class="change-pass-div">
                                <label for="again_pass">Yenidən daxil edin</label>
                                <input class="disable-on-click" type="password" id="again_pass" placeholder="Parolu daxil edin" name="connewpass" />
                            </div>
                            <button>Dəyiş</button>
                        </form>
                    @endif
                </div>
                <div class="settings-forget-password" id="forget_password_block">
                    <h3>ŞİFRƏNİZİ UNUTMUSUNUZ?</h3>
                    <span>Verifikasiya edilmiş hesab ilə e-poçtanızı dəyişə bilərsiniz</span>
                    @if($user->verified == 0)
                        <h4 style="color:red;font-size: 0.83em">Ilk öncə verifikasiyadan keçməlisiniz</h4>
                    @else
                        <form action="{{ route('forgetpassSetting') }}" method="POST" id="sifreunut">
                            @csrf
                            <div class="forget-password-div">
                                <label for="new_pass">Yeni şifrə</label>
                                <input class="disable-on-click" type="password" id="new_passs" placeholder="Parolu daxil edin" name="password" />
                            </div>
                            <div class="forget-password-div">
                                <label for="again_pass">Yenidən daxil edin</label>
                                <input class="disable-on-click" type="password" id="again_pass" placeholder="Parolu daxil edin"
                                    name="password_confirmation" />
                            </div>
                            <button>Dəyiş</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="settings-footer-verification" id="load_information_block">
                    <h3>Verifikasiya</h3>
                    <span>Verifikasiya edilmiş hesab ilə bilgilərinizi yükləyə bilərsiniz</span>
                    @if($user->verified == 0)
                        <h4 style="color:red;font-size: 0.83em; padding:0 15px">Ilk öncə verifikasiyadan keçməlisiniz</h4>
                        <div>
                            <img src="back/assets/img/setting-verification.png" alt="setting-verification" />
                        </div>
                    @else
                        <form action="{{ route('downloadinfo') }}" method="POST">
                            @csrf
                            <button style="top: 3.5rem; position: absolute; right:9rem">Yüklə</button>
                        </form>
                        <div>
                            <img src="back/assets/img/setting-verification.png" alt="setting-verification" />
                        </div>
                    @endif
                </div>
            </div>
            <div id="delete-account-block" class="col-md-6 d-flex align-items-center justify-content-center delete-account-col">
                <div class="delete-account">
                    <h3>HESABI SİLİN</h3>
                    <span>Nəyə görə bizdən ayrılırsınız? 😪</span>
                    <form action="{{ route('whydelete') }}" method="POST" id="niye">
                        @csrf
                        <div class="input-group">
                            <input class="disable-on-click" type="text" name="reason" placeholder="Səbəb yazın ..." />
                        </div>
                        <button>Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- CONFIRM WAIT POSTS  -->

    <div  class="modal fade" id="confirmWaitPosts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="accordion" id="accordionExample">
                <h3 id="collapseButton1" class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Təsdiqlənən postlar
                </h3>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            @foreach ($status1 as $sta)
                                <li>{{$sta->title}}</li><br>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <h3 id="collapseButton2" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Təsdiqi gözləyən postlar
                </h3>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            @foreach ($status0 as $sta)
                                <li>{{$sta->title}}</li><br>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('js')

    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="back/assets/js/settings.js"></script>
    <script src="back/assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            var errorMessages = {
                required: 'Bu sahə mütləq doldurulmalıdır!',
                email: 'Zəhmət olmasa düzgün email yazın'
            };
        
            $("#emaildeyis").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    email: {
                        required: errorMessages.required,
                        email: errorMessages.email,
                    },
                },
                submitHandler: function(form) {
                    form.submit(); // Formu gönder
                }
            });
        });
    </script>
        

    <script>
        $(document).ready(function() {
            var errorMessages = {
                required: 'Bu sahə mütləq doldurulmalıdır!',
                minlength: 'Bu sahə minimum 8 simvol olmalıdır!',
                equalTo: 'Bu sahə şifrə ilə eyni olmalıdır!',

            };
        
            $("#sifredeyis").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 8

                    },
                    newpass: {
                        required: true,
                        minlength: 8

                    },
                    connewpass: {
                        required: true,
                        minlength: 8,
                        equalTo: "#new_pass"

                    }
                },
                messages: {
                    password: {
                        required: errorMessages.required,
                        minlength: errorMessages.minlength,

                    },
                    newpass: {
                        required: errorMessages.required,
                        minlength: errorMessages.minlength,

                    },
                    connewpass: {
                        required: errorMessages.required,
                        minlength: errorMessages.minlength,
                        equalTo: errorMessages.equalTo,


                    },
                },
                submitHandler: function(form) {
                    form.submit(); // Formu gönder
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            var errorMessages = {
                required: 'Bu sahə mütləq doldurulmalıdır!',
                minlength: 'Bu sahə minimum 8 simvol olmalıdır!',
                equalTo: 'Bu sahə şifrə ilə eyni olmalıdır!',

            };
        
            $("#sifreunut").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 8

                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#new_passs"

                    }
                },
                messages: {
                    password: {
                        required: errorMessages.required,
                        minlength: errorMessages.minlength,

                    },
                    password_confirmation: {
                        required: errorMessages.required,
                        minlength: errorMessages.minlength,
                        equalTo: errorMessages.equalTo,


                    },
                },
                submitHandler: function(form) {
                    form.submit(); 
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var errorMessages = {
                required: 'Bu sahə mütləq doldurulmalıdır!',
            };
        
            $("#niye").validate({
                rules: {
                    reason: {
                        required: true,
                    }
                },
                messages: {
                    reason: {
                        required: errorMessages.required,
                    },
                },
                submitHandler: function(form) {
                    form.submit(); 
                }
            });
        });
    </script>

    <script>
        const verification = document.querySelector('#verification');
        const notification = document.querySelector('#notification');
        const change_email = document.querySelector('#change_email');
        const change_password = document.querySelector('#change_password');
        const forget_password = document.querySelector('#forget_password');
        const load_information = document.querySelector('#load_information');
        const delete_account = document.querySelector('#delete_account');
        const verification_block = document.querySelector('#verification_block');
        const notification_block = document.querySelector('#notification_block');
        const change_email_block = document.querySelector('#change_email_block');
        const change_password_block = document.querySelector('#change_password_block');
        const forget_password_block = document.querySelector('#forget_password_block');
        const delete_account_block = document.querySelector('#delete-account-block');
        const load_information_block = document.querySelector('#load_information_block');

        let arr = [
            {
                button: verification,
                block: verification_block
            },
            {
                button: notification,
                block: notification_block
            },
            {
                button: change_email,
                block: change_email_block
            },
            {
                button: change_password,
                block: change_password_block
            },
            {
                button: forget_password,
                block: forget_password_block
            },
            {
                button: load_information,
                block: load_information_block
            },
            {
                button: delete_account,
                block: delete_account_block
            },
        ]

        const inputsToDisable = document.querySelectorAll('.disable-on-click');

        function resetBlockBackgrounds() {
            arr.forEach(item => {
                item.block.style.filter = 'blur(5px)'; 
                
            });
        }

        function handleButtonClick(button, block) {
            resetBlockBackgrounds(); 
            block.style.backgroundColor = '#b3b3b3';
            block.style.filter = 'blur(0px)';

            const inputsWithinBlock = block.querySelectorAll('.disable-on-click');
            inputsToDisable.forEach(input => {
                input.disabled = true;
                
            });

            inputsWithinBlock.forEach(input => {
                input.disabled = false;
            });
        }

        arr.forEach(item => {
            item.button.addEventListener('click', () => {
                handleButtonClick(item.button, item.block);
            });
        });

    </script>

@endsection