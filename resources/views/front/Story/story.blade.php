@extends('front.Layouts.master')


@section('content')
    <section class="paper-section">
        <div class="container paper-container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="paper-col6">
                        <div class="paper-blog2-img">
                            <img src="{{$story[0]['image']}}" alt="blog2" />
                        </div>
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-time">
                                @php
                                    use Carbon\Carbon;

                                @endphp
                                <span class="paper-date">{{ \Carbon\Carbon::parse($story[0]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{$story[0]['cat_title']}}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                2 dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['id' => $story[0]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($story[0]['post_title'] )!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($story[0]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', ['id' => $story[0]['id']])}}"><button>
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="more" />
                            </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                    {{$story[0]['view']}}
                                </span>
                                <img src="{{asset('back/assets/img/heart.png')}}" alt="heart" />
                                <img src="{{asset('back/assets/img/save.png')}}" alt="save" />
                            </div>
                        </div>
                    </div>
                    <div class="paper-blog2-bottom">
                        <div class="paper-blog2-bottom-left">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-bottom-time">
                                    <span class="paper-bottom-date">{{ \Carbon\Carbon::parse($story[1]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{$story[1]['cat_title']}}</span>
                                </p>
                                <span class="paper-minute">
                                     <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                    2 dəq
                                </span>
                            </div>
                            <div class="paper-blog2-content">
                                 <a href="{{ route('detail', ['id' => $story[1]['id']]) }}" style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($story[1]['post_title'])!!}</a>
                                <p>
                                    {!! htmlspecialchars_decode($story[1]['description'])!!}
                                </p>
                            </div>
                            <div class="paper-blog2-button">
                                <a href="{{route('detail', ['id' => $story[1]['id']])}}"><button class="read-more">Daha çox
                                    
                                        <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                    </button>
                                    </a>
                                <div>
                                    <span>
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                        {{$story[1]['view']}}

                                    </span>
                                    <img src="{{asset('back/assets/img/heart.png')}}" alt="heart" />
                                    <img src="{{asset('back/assets/img/save.png')}}" alt="save" />
                                </div>
                            </div>
                        </div>
                        <div class="paper-blog2-bottom-right">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-bottom-time">
                                    <span class="paper-bottom-date">{{ \Carbon\Carbon::parse($story[2]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{$story[2]['cat_title']}}</span>
                                </p>
                                <span class="paper-minute">
                                     <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                    2 dəq
                                </span>
                            </div>
                            <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['id' => $story[2]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($story[2]['post_title'])!!}</a>
                                <p>
                                    {!! htmlspecialchars_decode($story[2]['description'])!!}
                                </p>
                            </div>
                            <div class="paper-blog2-button">
                                <a href="{{route('detail', ['id' => $story[2]['id']])}}"><button class="read-more">Daha çox
                                    
                                    <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                </button>
                                </a>
                                <div>
                                    <span>
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                        {{$story[2]['view']}}

                                    </span>
                                    <img src="{{asset('back/assets/img/heart.png')}}" alt="heart" />
                                    <img src="{{asset('back/assets/img/save.png')}}" alt="save" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-5">
                    <div class="paper-1">
                        <img class="paper-1-img" src="{{$story[3]['image']}}" alt="paper-1-img" />
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($story[3]['created_at'])->format('d.m.Y') }}</p>
                                <span></span>
                                <p>{{$story[3]['cat_title']}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                <span>2 dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['id' => $story[3]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($story[3]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($story[3]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', ['id' => $story[3]['id']])}}"><button class="read-more">
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                            </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                    <p>{{$story[3]['view']}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                    </button>
                                    <button>
                                        <img src="{{asset('back/assets/img/save.png')}}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="paper-k-img d-flex align-items-center justify-content-center">
                            <img src="{{asset('back/assets/img/paper/paper-k.png')}}" alt="paper-k" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-7 paper-k-content-mobile">
                    <div class="paper-blog1-bottom-left">
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-bottom-time">
                                <span class="paper-bottom-date">{{ \Carbon\Carbon::parse($story[4]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{$story[4]['cat_title']}}</span>
                            </p>
                            <span class="paper-minute">
                                 <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                2 dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['id' => $story[4]['id']]) }}" style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($story[4]['post_title'])!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($story[4]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', ['id' => $story[4]['id']])}}"><button>
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="more" />
                            </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                    {{$story[4]['view']}}

                                </span>
                                <img src="{{asset('back/assets/img/heart.png')}}" alt="heart" />
                                <img src="{{asset('back/assets/img/save.png')}}" alt="save" />
                            </div>
                        </div>
                    </div>
                    <div class="paper-2">
                        <img class="paper-1-img" src="{{$story[5]['image']}}" alt="paper-1-img" />
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($story[5]['created_at'])->format('d.m.Y') }}</p>
                                <span></span>
                                <p>{{$story[5]['cat_title']}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                <span>2 dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['id' => $story[5]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($story[5]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($story[5]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', ['id' => $story[5]['id']])}}"><button class="read-more">
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                            </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                    <p>{{$story[5]['view']}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                    </button>
                                    <button>
                                        <img src="{{asset('back/assets/img/save.png')}}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mobile-paper-2">
                    <img class="paper-1-img" src="{{$story[6]['image']}}" alt="paper-1-img" />
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($story[6]['created_at'])->format('d.m.Y') }}</p>
                                <span></span>
                                <p>{{$story[6]['cat_title']}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                <span>2 dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['id' => $story[6]['id']]) }}" style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($story[6]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($story[6]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', ['id' => $story[6]['id']])}}"><button class="read-more">
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                            </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                    <p>{{$story[6]['view']}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                    </button>
                                    <button>
                                        <img src="{{asset('back/assets/img/save.png')}}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-12 d-flex justify-content-end mt-4 top-line">
                    <span class="col-md-9" style="height: 2px; background-color: #000;"></span>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="paper-elizabeth-wrapper">
                        <div class="d-flex align-items-center justify-content-center paper-elizabeth-img">
                            <img class="w-100" src="{{$story[7]['image']}}" alt="elizabeth" />
                        </div>
                        <div class="paper-blog3-bottom-left">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-time">
                                    <span class="paper-date">{{ \Carbon\Carbon::parse($story[7]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{$story[7]['cat_title']}}</span>
                                </p>
                            </div>
                            <div class="paper-blog2-content">
                                <a href="{{ route('detail', ['id' => $story[7]['id']]) }}" style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($story[7]['post_title'])!!}</a>
                                <p>
                                    {!! htmlspecialchars_decode($story[7]['description'])!!}
                                </p>
                            </div>
                            <div class="paper-blog2-button">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="paper-col6">
                        <div class="paper-blog2-img">
                            <img src="{{$story[8]['image']}}" alt="blog2" />
                        </div>
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-time">
                                <span class="paper-date">{{ \Carbon\Carbon::parse($story[8]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{$story[8]['cat_title']}}</span>
                            </p>
                            <span class="paper-minute">
                                 <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                2 dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['id' => $story[8]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($story[8]['post_title'])!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($story[8]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', ['id' => $story[8]['id']])}}"><button>
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="more" />
                            </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                    {{$story[8]['view']}}

                                </span>
                                <img src="{{asset('back/assets/img/heart.png')}}" alt="heart" />
                                <img src="{{asset('back/assets/img/save.png')}}" alt="save" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 paper-blog2-bottom-left-col">
                    <div class="paper-blog2-bottom-left">
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-bottom-time">
                                <span class="paper-bottom-date">{{ \Carbon\Carbon::parse($story[9]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{$story[9]['cat_title']}}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="clock">
                                2 dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                             
                            <a href="{{ route('detail', ['id' => $story[9]['id']]) }}" style="color: #020202; text-decoration:none">
                            {!! htmlspecialchars_decode($story[9]['post_title'])!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($story[9]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', ['id' => $story[9]['id']])}}"><button>
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="more">
                            </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="look">
                                    {{$story[9]['view']}}

                                </span>
                                <img src="{{asset('back/assets/img/heart.png')}}" alt="heart">
                                <img src="{{asset('back/assets/img/save.png')}}" alt="save">
                            </div>
                        </div>
                    </div>
                    <div class="paper-1">
                        <img class="paper-1-img" src="{{$story[10]['image']}}" alt="paper-1-img">
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($story[10]['created_at'])->format('d.m.Y') }}</p>
                                <span></span>
                                <p>{{$story[10]['cat_title']}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                <span>2 dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['id' => $story[10]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($story[10]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($story[10]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', ['id' => $story[10]['id']])}}"><button class="read-more">
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                            </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                    <p>{{$story[10]['view']}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                    </button>
                                    <button>
                                        <img src="{{asset('back/assets/img/save.png')}}" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row owl-carousel-row">
                <div class="owl-carousel">
                    @foreach ($slayd as $s)
                        
                    <div class="col-12">
                        <div class="paper-carousel row">
                            <div class="paper-carousel-img col-md-5">
                                <img src="{{$s->image}}" alt="blog2" />
                            </div>
                            <div class="paper-carousel-content col-md-7">
                                <span>{{ ($s->created_at)->format('d.m.Y') }}</span>
                                <a href="{{ route('detail', $s->id) }}" style="color: #020202; text-decoration:none">
                                {{ htmlspecialchars_decode($s->post_title) }}</a>
                                <p>
                                    {!! htmlspecialchars_decode($s->description) !!}

                                </p>
                                <div class="action-sec">
                                    <div class="look-numb">
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                        <p>{{$s->view}}</p>
                                    </div>
                                    <div class="act-btns">
                                        <button>
                                            <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                        </button>
                                        <button>
                                            <img src="{{asset('back/assets/img/save.png')}}" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
 
                    
                    
                </div>
            </div>
            <div class="paper-load-more">
                <button>
                    Daha çox
                    <img src="{{asset('back/assets/img/paper/load-more.png')}}" alt="load-more" />
                </button>
            </div>
        </div>    
    </section>
    @foreach ($adverts as $ads)
        <a href="{{$ads->redirect_link}}" target="_blank">
            <img src="{{$ads->image}}" alt="employment.az" style="width:100%; height:320px;">
        </a>
    @endforeach
@endsection

@section('js')
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('back/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('back/assets/js/app.js')}}"></script>
    
    <script>
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            items: 1,
            nav: true,
            navText: [
                "<img src='{{asset('back/assets/img/paper/navText.png')}}' />",
                "<img src='{{asset('back/assets/img/paper/navText.png')}}' />",
            ],
            navClass: ["owl-prev", "owl-next"],
            responsive: {
                0: {
                items: 1,
                },
                600: {
                items: 1,
                },
                1000: {
                items: 1,
                },
            },
        });

    </script>
@endsection
