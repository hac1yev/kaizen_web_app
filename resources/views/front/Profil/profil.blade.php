@extends('front.Layouts.master')

@section('content')
    
    <section class="profile-information-section row m-0 pt-4">
        <div class="profile-information-wrapper col-md-4 pl-4">   
            <div class="profile-photo-img">
                @if (!$users->image || $users->image == NULL)
                    <img src='https://api.dicebear.com/7.x/bottts/svg?seed=633' class='border rounded-circle' />
                @else
                    <img src='{{ asset($post->getUser->image) }}' class='border rounded-circle' />
                @endif

            </div>
            <h6>
                {{$users->fullname}}
                <a href="{{route('editprofile',$users->id)}}"><img src="back/assets/img/profile/profile-pen.png" alt="profile-pen" /></a>
                <span>Yazıçı</span>
            </h6>
            <div class="profile-info">
                <div class="profile-mail">
                    <img src="back/assets/img/profile/profile-mail.png" alt="profile-mail" />
                    <span>{{$users->email}}</span>
                </div>
                <div class="profile-person">
                    <img src="back/assets/img/profile/profile-person.png" alt="profile-person" />
                    <span>{{$users->username}}</span>
                </div>
                <div class="profile-calendar">
                    <img src="back/assets/img/profile/profile-calendar.png" alt="profile-calendar" />
                    <span>{{$users->created_at}}</span>
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
                            <img src="{{ config('filesystems.disks.post-images.url') . "/$fav->image" }}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{($fav->created_at)->format('d.m.Y')}}</p>
                                    <span></span>
                                    <p>{{$fav->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="back/assets/img/clock.png" alt="">
                                    <span>{{$fav->reading_time}} dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                                <a href="{{route('detail', $fav->id)}}"style="color: #020202; text-decoration:none">
                                    @if(mb_strlen($fav->post_title) > 20)
                                        {{ html_entity_decode(mb_substr($fav->post_title, 0, 20)) . '...' }}
                                    @else
                                        {!! html_entity_decode($fav->post_title) !!}
                                    @endif
                                </a>
                                <p>
                                    @if(mb_strlen($fav->description) > 60)
                                        {{ html_entity_decode(mb_substr($fav->description, 0, 60)) . '...' }}
                                    @else
                                        {!! html_entity_decode($fav->description) !!}
                                    @endif
                                </p>
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
                                            <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $fav->id }}" style="{{ in_array($fav->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $fav->id }})">
                                            <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $fav->id }}" style="{{ in_array($fav->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $fav->id }})">
            
                                        </button>
                                        <button>
                                            <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $fav->id }}" style="{{ in_array($fav->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $fav->id }})">
                                            <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $fav->id }}" style="{{ in_array($fav->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $fav->id }})">
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
                            <img class="profil-middle-img" src="{{ config('filesystems.disks.post-images.url') . "/$p->image" }}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{($p->created_at)->format('d.m.Y')}}</p>
                                    <span></span>
                                    <p>{{$p->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="back/assets/img/clock.png" alt="">
                                    <span>{{$p->reading_time}} dəq</span>
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
                                            <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $p->id }}" style="{{ in_array($p->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $p->id }})">
                                            <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $p->id }}" style="{{ in_array($p->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $p->id }})">
                                            
                                        </button>
                                        <button>
                                            <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $p->id }}" style="{{ in_array($p->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $p->id }})">
                                            <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $p->id }}" style="{{ in_array($p->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $p->id }})">
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
                        <img src="{{ config('filesystems.disks.post-images.url') . "/$m->image" }}" alt="">
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{($m->created_at)->format('d.m.Y')}}</p>
                                <span></span>
                                <p>{{$m->cat_title}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="back/assets/img/clock.png" alt="">
                                <span>{{$m->reading_time}} dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">

                            <a href="{{route('detail', $m->id)}}"style="color: #020202; text-decoration:none">
                                @if(mb_strlen($m->post_title) > 20)
                                    {{ html_entity_decode(mb_substr($m->post_title, 0, 20)) . '...' }}
                                @else
                                    {!! html_entity_decode($m->post_title) !!}
                                @endif
                            </a>
                            <p>
                                @if(mb_strlen($m->description) > 60)
                                    {{ html_entity_decode(mb_substr($m->description, 0, 60)) . '...' }}
                                @else
                                    {!! html_entity_decode($m->description) !!}
                                @endif
                            </p>
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
                                        <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $m->id }}" style="{{ in_array($m->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $m->id }})">
                                        <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $m->id }}" style="{{ in_array($m->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $m->id }})" >
        
                                    </button>
                                    <button>
                                        <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $m->id }}" style="{{ in_array($m->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $m->id }})">
                                        <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $m->id }}" style="{{ in_array($m->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $m->id }})" >
        
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
    <script src="{{ asset('back/assets/js/app.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>     
    
    <script>
        function likePost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('profilelike') }}',
            method: 'POST',
            data: {
                _token: csrfToken,
                post_id: postId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) { 
                    $('#likeButton_' + postId).hide();
                    $('#dislikeButton_' + postId).show();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

        }
    </script>

    <script>
        function dislikePost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('profiledislike') }}',
            method: 'POST',
            data: {
                _token: csrfToken,
                post_id: postId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#dislikeButton_' + postId).hide();
                    $('#likeButton_' + postId).show();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

        }
    </script>

    <script>
        function bookPost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('profilebook') }}',
            method: 'POST',
            data: {
                _token: csrfToken,
                post_id: postId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) { 
                    $('#bookButton_' + postId).hide();
                    $('#disbookButton_' + postId).show();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

        }
    </script>

    <script>
        function disbookPost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('profiledisbook') }}',
            method: 'POST',
            data: {
                _token: csrfToken,
                post_id: postId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#disbookButton_' + postId).hide();
                    $('#bookButton_' + postId).show();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

        }
    </script>

@endsection
 