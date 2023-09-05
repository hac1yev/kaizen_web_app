@extends('front.Layouts.master')

<style>
    .paper-col6 {
        border-bottom: 1px solid #000;
        padding: 10px 0;
    }
</style>

@section('content')
<section class="paper-section">

    <div class="container paper-container mt-4">
        <div class="row">
            @if(!empty($posts))
                @foreach($posts as $post)
                <div class="col-md-6 mt-4">
                    <div class="paper-col6">
                        <div class="paper-blog2-img">
                            <img src="{{$post->image}}" alt="blog2" />
                        </div>
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-time">
                                
                                <span
                                    class="paper-date">{{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y') }}</span>
                                <span>{{ $post->getCategory->title }}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{ asset('back/assets/img/clock.png') }}"
                                    alt="clock" />
                                2 dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{route('detail', $post->id)}}" style="color: #020202; text-decoration:none">
                                @if(mb_strlen($post->post_title) > 40)
                                    {{ html_entity_decode(mb_substr($post->post_title, 0, 40)) . '...' }}
                                @else
                                    {!! html_entity_decode($post->post_title) !!}
                                @endif
                            </a>
                            <p>
                                @if(mb_strlen($post->description) > 80)
                                    {{ html_entity_decode(mb_substr($post->description, 0, 80)) . '...' }}
                                @else
                                    {!! html_entity_decode($post->description) !!}
                                @endif
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', $post->id)}}"><button>
                                    Daha çox
                                    <img src="{{ asset('back/assets/img/more.png') }}"
                                        alt="more" />
                                </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{ asset('back/assets/img/look.png') }}"
                                        alt="look" />
                                        {{$post->view}}
                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $post->id }}" style="{{ in_array($post->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $post->id }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $post->id }}" style="{{ in_array($post->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $post->id }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $post->id }}" style="{{ in_array($post->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $post->id }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $post->id }}" style="{{ in_array($post->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $post->id }})" >

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                   <h1>fdssdsdfsf </h1>        
            @endif



        </div>
    </div>
</section>

@endsection

@section('js')

    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('back/assets/js/app.js') }}"></script>

    <script>
        function likePost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('inkisaflike') }}',
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
            url: '{{ route('inkisafdislike') }}',
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
            url: '{{ route('inkbook') }}',
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
            url: '{{ route('inkdisbook') }}',
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