@extends('front.Layouts.master')

@section('content')

    <div class="settings-head mt-2">
        <ul>
            <li>
                <a href="#">VERİFİKASİYA</a>
            </li>
            <li>
                <a href="#">BİLDİRİŞLƏR</a>
            </li>
            <li>
                <a href="#">E-MAİLİ DƏYİŞDİRİN</a>
            </li>
            <li>
                <a href="#">ŞİFRƏNİZİ DƏYİŞDİRİN</a>
            </li>
            <li>
                <a href="#">ŞİFRƏNİZİ UNUTMUSUNUZ?</a>
            </li>
            <li>
                <a href="#">İSTİFADƏÇİ MƏLUMATLARINI YÜKLƏYİN</a>
            </li>
            <li>
                <a href="#">HESABI SİLİN</a>
            </li>
        </ul>
    </div>

    <div class="container settings-container">
        <div class="row settings-row">
            <div class="col-md-8 settings-ver-wrap">
                <div class="row">
                    <div class="col-md-6 px-0 settings-verification-col">
                        <div class="settings-verification">
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
                        <div class="settings-notifications">
                            <h3>BİLDİRİŞLƏR</h3>
                            <p>
                                Təsdiqi gözləyən postlar <span></span>
                            </p>

                            <p>
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
                <div class="settings-change-email">
                    <h3>E-MAİLİ DƏYİŞDİRİN</h3>
                    <span>Verifikasiya edilmiş hesab ilə e-poçtanızı dəyişə bilərsiniz</span>
                    @if($user->verified == 0)
                        <h4 style="color:red;font-size: 0.83em">Ilk öncə verifikasiyadan keçməlisiniz</h4>
                    @else
                        <form method="POST" action="{{ route('changeEmail') }}">
                            @csrf
                            <input placeholder="E-poçt daxil edin!" type="email" name="email" />
                            <button>Dəyiş</button>
                        </form>
                    @endif
                </div>
                <div class="settings-change-password">
                    <h3>ŞİFRƏNİZİ DƏYİŞDİRİN</h3>
                    <span>Verifikasiya edilmiş hesab ilə e-poçtanızı dəyişə bilərsiniz</span>
                    @if($user->verified == 0)
                        <h4 style="color:red;font-size: 0.83em">Ilk öncə verifikasiyadan keçməlisiniz</h4>
                    @else
                        <form method="POST" action="{{ route('changePass') }}">
                            @csrf
                            <div class="change-pass-div">
                                <label for="current_pass">Hazırki şifrə</label>
                                <input type="password" id="current_pass" placeholder="Parolu daxil edin" name="password" />
                            </div>
                            <div class="change-pass-div">
                                <label for="new_pass">Yeni şifrə</label>
                                <input type="password" id="new_pass" placeholder="Parolu daxil edin" name="newpass" />
                            </div>
                            <div class="change-pass-div">
                                <label for="again_pass">Yenidən daxil edin</label>
                                <input type="password" id="again_pass" placeholder="Parolu daxil edin" name="connewpass" />
                            </div>
                            <button>Dəyiş</button>
                        </form>
                    @endif
                </div>
                <div class="settings-forget-password">
                    <h3>ŞİFRƏNİZİ UNUTMUSUNUZ?</h3>
                    <span>Verifikasiya edilmiş hesab ilə e-poçtanızı dəyişə bilərsiniz</span>
                    @if($user->verified == 0)
                        <h4 style="color:red;font-size: 0.83em">Ilk öncə verifikasiyadan keçməlisiniz</h4>
                    @else
                        <form action="{{ route('forgetpassSetting') }}" method="POST">
                            @csrf
                            <div class="forget-password-div">
                                <label for="new_pass">Yeni şifrə</label>
                                <input type="password" id="new_pass" placeholder="Parolu daxil edin" name="password" />
                            </div>
                            <div class="forget-password-div">
                                <label for="again_pass">Yenidən daxil edin</label>
                                <input type="password" id="again_pass" placeholder="Parolu daxil edin"
                                    name="password_confirmation" />
                            </div>
                            <button>Dəyiş</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="settings-footer-verification">
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
            <div class="col-md-6 d-flex align-items-center justify-content-center delete-account-col">
                <div class="delete-account">
                    <h3>HESABI SİLİN</h3>
                    <span>Nəyə görə bizdən ayrılırsınız? 😪</span>
                    <form action="{{ route('whydelete') }}" method="POST">
                        @csrf
                        <input type="text" name="reason" placeholder="Səbəb yazın ..." />
                        <button>Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="back/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="back/assets/js/settings.js"></script>
@endsection