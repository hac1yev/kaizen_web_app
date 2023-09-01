<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{route('admin')}}">
                <img src="{{asset($setting->logo_kaizen_header)}}"  class="header-brand-img desktop-logo" alt="logo">
                <img src="{{asset($setting->logo_kaizen_header)}}"  class="header-brand-img toggle-logo" alt="logo">
                <img src="{{asset($setting->logo_kaizen_header)}}"  class="header-brand-img light-logo" alt="logo">
                <img src="{{asset($setting->logo_kaizen_header)}}"  class="header-brand-img light-logo1" style="width: 100px;" alt="logo">
            </a><!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                                                  fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li>
                    <h3>Menyu</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin')}}">
                        <i class="fa fa-paper-plane-o" ></i>
                        <span class="side-menu__label mx-2">Əsas səhifə</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa fa-file-text-o" ></i>
                        <span class="side-menu__label mx-2">Məqalələr</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('postAdd')}}" class="slide-item">Əlavə et</a></li>
                        <li><a href="{{route('postListIndex')}}" class="slide-item">Siyahı</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('categoryListIndex')}}">
                        <i class="fa fa-support" ></i>
                        <span class="side-menu__label mx-2">Kateqoriyalar</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('commentListIndex')}}">
                        <i class="fa fa-comments-o" ></i>
                        <span class="side-menu__label mx-2">Rəylər</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('contactListIndex')}}">
                        <i class="fa fa-commenting-o" ></i>
                        <span class="side-menu__label mx-2">İsmarıclar</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('userListIndex')}}">
                        <i class="fa fa-users" ></i>
                        <span class="side-menu__label mx-2">İstifadəçilər</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('searchListIndex')}}">
                        <i class="fa fa-search-plus" ></i>
                        <span class="side-menu__label mx-2">Ən çox axtarılan sözlər</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('quoteListIndex')}}">
                        <i class="fa fa-quote-right" ></i>
                        <span class="side-menu__label mx-2">Quote</span>
                    </a>
                </li>
                <li>
                    <h3>Şəxsi özəlləştirmə</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('switcherIndex')}}">
                        <i class="fa fa-magic"></i>
                        <span class="side-menu__label mx-2">Özəlləştirmə</span>
                    </a>
                </li>

                <li>
                    <h3>Sayt nizamlamaları</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('seoIndex')}}">
                        <i class="fa fa-free-code-camp"></i>
                        <span class="side-menu__label mx-2">SEO</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('socialIndex')}}">
                        <i class="fa fa-share-alt"></i>
                        <span class="side-menu__label mx-2">Sosial media</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('settingsIndex')}}">
                        <i class="fa fa-wrench"></i>
                        <span class="side-menu__label mx-2">Tənzimləmələr</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa fa-bullhorn"></i>
                        <span class="side-menu__label mx-2">Reklamlar</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('advertFooterIndex')}}" class="slide-item">Footer</a></li>
                        <li><a href="{{route('advertPostIndex')}}" class="slide-item">Məqalə daxili</a></li>
                    </ul>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                                           width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
<!--/APP-SIDEBAR-->
