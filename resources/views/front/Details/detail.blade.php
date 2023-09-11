@extends('front.Layouts.master')


@section('content')

    <section class="travel-section">
        <section class="travel-section mt-4">
            <div class="container">
                <div class="row travel-row">
                    <div class="col-12">
                        <div class="travel-links">
                            <a href="{{route('index')}}">Kaizen</a>/
                            @if ($postdetail->cat_title === 'Fərdi İnkişaf')
                                <a href="{{ route('ferdi') }}">Fərdi İnkişaf</a>
                            @elseif ($postdetail->cat_title === 'Səyahət')
                                <a href="{{ route('travel') }}">Səyahət</a>
                            @elseif ($postdetail->cat_title === 'Hekayələr')
                                <a href="{{ route('story') }}">Hekayələr</a>
                            @elseif ($postdetail->cat_title === 'Filmlər')
                                <a href="{{ route('film') }}">Filmlər</a>
                            @elseif ($postdetail->cat_title === 'Biznes Dünyası')
                                <a href="{{ route('biznes') }}">Biznes Dünyası</a>
                            @endif   
                            <p> {!! htmlspecialchars_decode($postdetail->post_title) !!}</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h2 class="travel-title"> {!! htmlspecialchars_decode($postdetail->post_title) !!}</h2>
                        <div class="">
                            <img src="{{asset($postdetail->image)}}" class="w-100" alt="" />
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-bottom-time">
                                    <span class="paper-bottom-date">{{($postdetail->created_at)->format('d.m.Y')}}</span>
                                    <span>{{$postdetail->cat_title}}</span>
                                </p>
                                <span class="paper-minute">
                                    <div>
                                        <img src="{{asset('back/assets/img/travel_eye.png')}}" alt="eye" />
                                        {{$postdetail->view}}
                                    </div>
                                    <div>
                                        <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                        2 dəq
                                    </div>
                                </span>
                            </div>
                            <div class="mt-3 text-justify">
                                {!! htmlspecialchars_decode($postdetail->content) !!}
                            </div>
                        </div>
                        <div class="travel-button-save">
                            <button id="comment-show">
                                <img src="{{asset('back/assets/img/travel-comment.png')}}" alt="travel-comment" />
                                <span id="comment-id">{{count($comments)}}</span> Comment
                            </button>
                            <div>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $postdetail->id }}" style="{{ in_array($postdetail->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $postdetail->id }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $postdetail->id }}" style="{{ in_array($postdetail->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $postdetail->id }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $postdetail->id }}" style="{{ in_array($postdetail->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $postdetail->id }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $postdetail->id }}" style="{{ in_array($postdetail->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $postdetail->id }})" >

                            </div>
                        </div>
                        <div id="comment-write">
                            <button id="comment-write">Şərh Yaz</button>
                        </div>

                        <div class="comment-write-section">
                            @csrf
                            <textarea class="comment-textarea"></textarea>
                            <button data-post="{{ $postdetail->id }}" type="button" class="save-comment">Submit</button>
                        </div>

                        <div id="comment-section" class="comment-section-class">
                            @foreach($comments as $comment)
                                <div class="comment-card">
                                    <div class="comment-card-1">
                                            
                                        <img src="{{asset($comment->getUser->image)}}" alt="">
                                        <p>{{ $comment->getUser->fullname }}</p> 

                                        <span class="saat">{{ $comment->created_at->format('d.m.Y') }}</span>
                                    </div>
                                    <p>{{ $comment->comment }}</p> 
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                    <div class="col-md-3 travel-paper3-col px-0">
                        <div class="travel-paper3-header text-center">
                            <h2>Əlaqəli məqalələr</h2>
                        </div>
                        @foreach ($elaqeli as $e)
                            <div class="paper-4 p-2">
                                <img class="paper-1-img" src="{{asset($e->image)}}" alt="paper-1-img" />
                                <div class="blog-det">
                                    <div class="blog-date">
                                        <p>{{($e->created_at)->format('d.m.Y')}}</p>
                                        <span></span>
                                        <p>{{$e->cat_title}}</p>
                                    </div>
                                </div>
                                <div class="blog-det-2">
                                    <a href="{{route('detail', $e->id)}}" style="color: #020202;text-decoration:none">{!! htmlspecialchars_decode($e->post_title) !!}</a>
                                    <p>{!! htmlspecialchars_decode($e->description) !!}</p>
                                </div>
                                <div class="blog-det-3">
                                    
                                    <a href="{{route('detail', $e->id)}}"><button class="read-more">Daha çox
                                        
                                        <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                    </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </section>
    @foreach ($adverts as $ads)   
        <a href="{{$ads->redirect_link}}" target="_blank">
            <img src="{{$ads->image}}" alt="employment.az" style="width:100%; height:320px;">
        </a>
    @endforeach
@endsection

@section('js')
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
    <script src="{{asset('back/assets/js/travel.js')}}"></script>
    <script src="{{asset('back/assets/js/app.js')}}"></script>

    <script>
        $(document).ready(function() {
            function getErrorMessage(field) {
                var errorMessages = {
                    required: {
                        'AZ': 'Bu sahə doldurulmalıdır!',
                    }
                };
    
                return errorMessages[field]['AZ'] || ''; 
            }
    
            $(".save-comment").on('click', function() {
                var _comment = $(".comment-textarea").val().trim();
                var _post = $(this).data('post');
                var vm = $(this);
    
                if (_comment !== "") {
                    $.ajax({
                        url: "{{ route('commentPost') }}",
                        type: "post",
                        dataType: 'json',
                        data: {
                            comment: _comment,
                            post: _post,
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            vm.text('Saving...').addClass('disabled');
                        },
                        success: function(res) {
                            var _html = '<div class="comment-card">' +
                                '<div class="comment-card-1">' +
                                '<img src="' + res.commentData.user_image + '" alt="">' +
                                '<p>' + res.commentData.user_fullname + '</p>' +
                                '<span class="saat">' + res.commentData.created_at + '</span>' +
                                '</div>' +
                                '<p>' + res.commentData.comment + '</p>' +
                                '</div>';
    
                            if (res.bool == true) {
                                $("#comment-section").prepend(_html);
                                $(".comment-textarea").val(''); 
                                var commentCount = $("#comment-section .comment-card").length;
                                $(".comment-count").text(commentCount);
                                $(".no-comments").hide();
                            }
    
                            vm.text('Save').removeClass('disabled');
                        }
                    });
                } else {
                    alert(getErrorMessage('required'));
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#comment-write").on("click", function() {
                if ({{ Auth::check() ? 'true' : 'false' }}) {
                    document.querySelector('.comment-write-section').style.display = 'block'

                } else {
                    document.querySelector('.comment-write-section').style.display = 'none'
                    $("#loginModal").modal("show");
                }
            });
        });
    </script>

    
    <script>
        function likePost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }}; 

        if (!isLoggedIn) {
            $('#loginModal').modal('show');
        } else {
            $.ajax({
                url: '{{ route('detaillike') }}',
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
        }
    </script>

    <script>
        function dislikePost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('detaildislike') }}',
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
        var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }}; 

        if (!isLoggedIn) {
            $('#loginModal').modal('show');
        } else {
            $.ajax({
                url: '{{ route('detailbook') }}',
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
        }
    </script>

    <script>
        function disbookPost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('detaildisbook') }}',
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
