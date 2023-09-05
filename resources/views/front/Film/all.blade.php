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
                                {!! htmlspecialchars_decode($post->post_title) !!}</a>
                            <p>
                                {!! htmlspecialchars_decode($post->description) !!}
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
                                <img src="{{ asset('back/assets/img/heart.png') }}"
                                    alt="heart" />
                                <img src="{{ asset('back/assets/img/save.png') }}"
                                    alt="save" />
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('back/assets/js/app.js') }}"></script>


@endsection