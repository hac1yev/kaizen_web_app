@extends('front.Layouts.master')

@section('content')
    
    <section class="profile-information-section row m-0 pt-4">
        <div class="profile-information-wrapper col-md-4 pl-4">   
            <div class="profile-photo-img">
                <img src="back/assets/img/profile/profil-photo.png" alt="profil-photo" />
            </div>
            <h6>
                {{$users->fullname}}
                <img src="back/assets/img/profile/profile-pen.png" alt="profile-pen" />
                <span>Yazıçı</span>
            </h6>
            <div class="profile-info">
                <div class="profile-mail">
                    <img src="back/assets/img/profile/profile-mail.png" alt="profile-mail" />
                    <span>{{$users->email}}</span>
                    <img src="back/assets/img/profile/profile-pen.png" alt="profile-pen" />
                </div>
                <div class="profile-person">
                    <img src="back/assets/img/profile/profile-person.png" alt="profile-person" />
                    <span>{{$users->username}}</span>
                    <img src="back/assets/img/profile/profile-pen.png" alt="profile-pen" />
                </div>
                <div class="profile-calendar">
                    <img src="back/assets/img/profile/profile-calendar.png" alt="profile-calendar" />
                    <span>{{$users->created_at}}</span>
                    <img src="back/assets/img/profile/profile-pen.png" alt="profile-pen" />
                </div>
                <div class="profile-num">
                    <img src="back/assets/img/profile/profile-num.png" alt="profile-num" />
                    <span>{{count($posts)}}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs-sec container">
        <div class="row">
            <div class="col-lg-3 left-side">
                <div>
                    <div class="latest-blog">
                        <h2>Bəyəndiyim məqalələr</h2>
                    </div>
                    @foreach ($favorits as $fav)
                        <div class="blog-1">
                            <img src="{{$fav->image}}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{($fav->created_at)->format('d.m.Y')}}</p>
                                    <span></span>
                                    <p>{{$fav->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="back/assets/img/clock.png" alt="">
                                    <span>2 dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                                <a href="{{route('detail', $fav->id)}}"style="color: #020202; text-decoration:none">
                                    {{ htmlspecialchars_decode($fav->post_title) }}</a>
                                <p>{!! htmlspecialchars_decode($fav->description) !!}</p>
                            </div>
                            <div class="blog-det-3">
                                    <a href="{{route('detail', $fav->id)}}">
                                        <button class="read-more">

                                        Daha çox
                                        <img src="{{asset('back/assets/img/more.png')}}" alt="more" />
                                    </button>
                                    </a>
                                </button>
                                <div class="action-sec">
                                    <div class="look-numb">
                                        <img src="back/assets/img/look.png" alt="">
                                        <p>{{$fav->view}}</p>
                                    </div>
                                    <div class="act-btns">
                                        <button>
                                            <img src="back/assets/img/heart.png" alt="">
                                        </button>
                                        <button>
                                            <img src="back/assets/img/save.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-6 middle-side">
                <div>
                    <div class="latest-blog">
                        <h2>Yazdığım məqalələr</h2>
                    </div>
                    @foreach ($posts as $p)  
                        <div class="blog-1">
                            <img src="{{$p->image}}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{($p->created_at)->format('d.m.Y')}}</p>
                                    <span></span>
                                    <p>{{$p->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="back/assets/img/clock.png" alt="">
                                    <span>2 dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                                <a href="{{route('detail', $p->id)}}"style="color: #020202; text-decoration:none">
                                    {{ htmlspecialchars_decode($p->post_title) }}</a>
                                <p>{!! htmlspecialchars_decode($p->description) !!}</p>
                            </div>
                            <div class="blog-det-3">
                                <a href="{{route('detail', $p->id)}}">
                                    <button class="read-more">
                                        Daha çox
                                        <img src="back/assets/img/more.png" alt="">
                                    </button>
                                </a>

                                <div class="action-sec">
                                    <div class="look-numb">
                                        <img src="back/assets/img/look.png" alt="">
                                        <p>{{$p->view}}</p>
                                    </div>
                                    <div class="act-btns">
                                        <button>
                                            <img src="back/assets/img/heart.png" alt="">
                                        </button>
                                        <button>
                                            <img src="back/assets/img/save.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-3 right-side">
                <div>
                    <div class="latest-blog">
                        <h2>İşarələdiyim məqalələr</h2>
                    </div>
                    @foreach ($marks as $m)
                        
                    <div class="blog-1">
                        <img src="{{$m->image}}" alt="">
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{($m->created_at)->format('d.m.Y')}}</p>
                                <span></span>
                                <p>{{$m->cat_title}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="back/assets/img/clock.png" alt="">
                                <span>2 dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">

                            <a href="{{route('detail', $m->id)}}"style="color: #020202; text-decoration:none">
                                {{ htmlspecialchars_decode($m->post_title) }}</a>
                            <p>{!! htmlspecialchars_decode($m->description) !!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', $m->id)}}">

                            <button class="read-more">
                                Daha çox
                                <img src="back/assets/img/more.png" alt="">
                            </button>
                        </a>

                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="back/assets/img/look.png" alt="">
                                    <p>{{$m->view}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="back/assets/img/heart.png" alt="">
                                    </button>
                                    <button>
                                        <img src="back/assets/img/save.png" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

            
                </div>

            </div>
        </div>
    </section>
@endsection


@section('js')
    <script src="back/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>      
@endsection
 