@extends('front.Layouts.master')


@section('content')
    <section class="paper-section">
        <div class="container paper-container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="paper-col6">
                        <div class="paper-blog2-img">
                            <img src="{{ config('filesystems.disks.post-images.url') . "/{$tech[0]['image']}" }}" alt="blog2" />
                        </div>
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-time">
                                @php
                                    use Carbon\Carbon;

                                @endphp
                                <span class="paper-date">{{ \Carbon\Carbon::parse($tech[0]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{$tech[0]['cat_title']}}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                {{$tech[0]['reading_time']}} dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['post' => $tech[0]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($tech[0]['post_title'] )!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($tech[0]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', ['post' => $tech[0]['id']])}}"><button>
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="more" />
                            </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                    {{$tech[0]['view']}}
                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[0]['id'] }}" style="{{ in_array($tech[0]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[0]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[0]['id'] }}" style="{{ in_array($tech[0]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[0]['id'] }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[0]['id'] }}" style="{{ in_array($tech[0]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[0]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[0]['id'] }}" style="{{ in_array($tech[0]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[0]['id'] }})" >

                            </div>
                        </div>
                    </div>
                    <div class="paper-blog2-bottom">
                        <div class="paper-blog2-bottom-left">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-bottom-time">
                                    <span class="paper-bottom-date">{{ \Carbon\Carbon::parse($tech[1]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{$tech[1]['cat_title']}}</span>
                                </p>
                                <span class="paper-minute">
                                     <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                     {{$tech[1]['reading_time']}} dəq
                                </span>
                            </div>
                            <div class="paper-blog2-content">
                                 <a href="{{ route('detail', ['post' => $tech[1]['id']]) }}" style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($tech[1]['post_title'])!!}</a>
                                <p>
                                    {!! htmlspecialchars_decode($tech[1]['description'])!!}
                                </p>
                            </div>
                            <div class="paper-blog2-button">
                                <a href="{{route('detail', ['post' => $tech[1]['id']])}}"><button class="read-more">Daha çox
                                    
                                        <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                    </button>
                                    </a>
                                <div>
                                    <span>
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                        {{$tech[1]['view']}}

                                    </span>
                                    <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[1]['id'] }}" style="{{ in_array($tech[1]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[1]['id'] }})">
                                    <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[1]['id'] }}" style="{{ in_array($tech[1]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[1]['id'] }})" >

                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[1]['id'] }}" style="{{ in_array($tech[1]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[1]['id'] }})">
                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[1]['id'] }}" style="{{ in_array($tech[1]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[1]['id'] }})" >
                                </div>
                            </div>
                        </div>
                        <div class="paper-blog2-bottom-right">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-bottom-time">
                                    <span class="paper-bottom-date">{{ \Carbon\Carbon::parse($tech[2]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{$tech[2]['cat_title']}}</span>
                                </p>
                                <span class="paper-minute">
                                     <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                     {{$tech[2]['reading_time']}} dəq
                                </span>
                            </div>
                            <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['post' => $tech[2]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($tech[2]['post_title'])!!}</a>
                                <p>
                                    {!! htmlspecialchars_decode($tech[2]['description'])!!}
                                </p>
                            </div>
                            <div class="paper-blog2-button">
                                <a href="{{route('detail', ['post' => $tech[2]['id']])}}"><button class="read-more">Daha çox
                                    
                                    <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                </button>
                                </a>
                                <div>
                                    <span>
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                        {{$tech[2]['view']}}

                                    </span>
                                    <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[2]['id'] }}" style="{{ in_array($tech[2]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[2]['id'] }})">
                                    <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[2]['id'] }}" style="{{ in_array($tech[2]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[2]['id'] }})" >

                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[2]['id'] }}" style="{{ in_array($tech[2]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[2]['id'] }})">
                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[2]['id'] }}" style="{{ in_array($tech[2]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[2]['id'] }})" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-5">
                    <div class="paper-1">
                        <img class="paper-1-img" src="{{ config('filesystems.disks.post-images.url') . "/{$tech[3]['image']}" }}" alt="paper-1-img" />
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($tech[3]['created_at'])->format('d.m.Y') }}</p>
                                <span></span>
                                <p>{{$tech[3]['cat_title']}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                <span>{{$tech[3]['reading_time']}} dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['post' => $tech[3]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($tech[3]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($tech[3]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', ['post' => $tech[3]['id']])}}"><button class="read-more">
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                            </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                    <p>{{$tech[3]['view']}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[3]['id'] }}" style="{{ in_array($tech[3]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[3]['id'] }})">
                                        <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[3]['id'] }}" style="{{ in_array($tech[3]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[3]['id'] }})" >
                                    </button>
                                    <button>
                                        <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[3]['id'] }}" style="{{ in_array($tech[3]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[3]['id'] }})">
                                        <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[3]['id'] }}" style="{{ in_array($tech[3]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[3]['id'] }})" >
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
                                <span class="paper-bottom-date">{{ \Carbon\Carbon::parse($tech[4]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{$tech[4]['cat_title']}}</span>
                            </p>
                            <span class="paper-minute">
                                 <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                {{$tech[4]['reading_time']}} dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['post' => $tech[4]['id']]) }}" style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($tech[4]['post_title'])!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($tech[4]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', ['post' => $tech[4]['id']])}}"><button>
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="more" />
                            </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                    {{$tech[4]['view']}}

                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[4]['id'] }}" style="{{ in_array($tech[4]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[4]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[4]['id'] }}" style="{{ in_array($tech[4]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[4]['id'] }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[4]['id'] }}" style="{{ in_array($tech[4]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[4]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[4]['id'] }}" style="{{ in_array($tech[4]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[4]['id'] }})" >
                            </div>
                        </div>
                    </div>
                    <div class="paper-2">
                        <img class="paper-1-img" src="{{ config('filesystems.disks.post-images.url') . "/{$tech[5]['image']}" }}" alt="paper-1-img" />
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($tech[5]['created_at'])->format('d.m.Y') }}</p>
                                <span></span>
                                <p>{{$tech[5]['cat_title']}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                <span>{{$tech[5]['reading_time']}} dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['post' => $tech[5]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($tech[5]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($tech[5]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', ['post' => $tech[5]['id']])}}"><button class="read-more">
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                            </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                    <p>{{$tech[5]['view']}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[5]['id'] }}" style="{{ in_array($tech[5]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[5]['id'] }})">
                                        <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[5]['id'] }}" style="{{ in_array($tech[5]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[5]['id'] }})" >
                                    </button>
                                    <button>
                                        <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[5]['id'] }}" style="{{ in_array($tech[5]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[5]['id'] }})">
                                        <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[5]['id'] }}" style="{{ in_array($tech[5]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[5]['id'] }})" >
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mobile-paper-2">
                    <img class="paper-1-img" src="{{ config('filesystems.disks.post-images.url') . "/{$tech[6]['image']}" }}" alt="paper-1-img" />
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($tech[6]['created_at'])->format('d.m.Y') }}</p>
                                <span></span>
                                <p>{{$tech[6]['cat_title']}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                <span>{{$tech[6]['reading_time']}} dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['post' => $tech[6]['id']]) }}" style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($tech[6]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($tech[6]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', ['post' => $tech[6]['id']])}}"><button class="read-more">
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                            </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                    <p>{{$tech[6]['view']}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[6]['id'] }}" style="{{ in_array($tech[6]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[6]['id'] }})">
                                        <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[6]['id'] }}" style="{{ in_array($tech[6]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[6]['id'] }})" >
                                    </button>
                                    <button>
                                        <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[6]['id'] }}" style="{{ in_array($tech[6]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[6]['id'] }})">
                                        <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[6]['id'] }}" style="{{ in_array($tech[6]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[6]['id'] }})" >
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
                            <img class="w-100" src="{{ config('filesystems.disks.post-images.url') . "/{$tech[7]['image']}" }}" alt="elizabeth" />
                        </div>
                        <div class="paper-blog3-bottom-left">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-time">
                                    <span class="paper-date">{{ \Carbon\Carbon::parse($tech[7]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{$tech[7]['cat_title']}}</span>
                                </p>
                            </div>
                            <div class="paper-blog2-content">
                                <a href="{{ route('detail', ['post' => $tech[7]['id']]) }}" style="color: #020202; text-decoration:none">
                                    @if(mb_strlen($tech[7]['post_title']) > 40)
                                        {{ html_entity_decode(mb_substr($tech[7]['post_title'], 0, 40)) . '...' }}
                                    @else
                                        {!! html_entity_decode($tech[7]['post_title']) !!}
                                    @endif
                                </a>
                                <p>
                                    @if(mb_strlen($tech[7]['description']) > 100)
                                        {{ html_entity_decode(mb_substr($tech[7]['description'], 0, 100)) . '...' }}
                                    @else
                                        {!! html_entity_decode($tech[7]['description']) !!}
                                    @endif
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
                            <img src="{{ config('filesystems.disks.post-images.url') . "/{$tech[8]['image']}" }}" alt="blog2" />
                        </div>
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-time">
                                <span class="paper-date">{{ \Carbon\Carbon::parse($tech[8]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{$tech[8]['cat_title']}}</span>
                            </p>
                            <span class="paper-minute">
                                 <img src="{{asset('back/assets/img/clock.png')}}" alt="clock" />
                                {{$tech[8]['reading_time']}} dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['post' => $tech[8]['id']]) }}" style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($tech[8]['post_title'])!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($tech[8]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', ['post' => $tech[8]['id']])}}"><button>
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="more" />
                            </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="look" />
                                    {{$tech[8]['view']}}

                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[8]['id'] }}" style="{{ in_array($tech[8]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[8]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[8]['id'] }}" style="{{ in_array($tech[8]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[8]['id'] }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[8]['id'] }}" style="{{ in_array($tech[8]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[8]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[8]['id'] }}" style="{{ in_array($tech[8]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[8]['id'] }})" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 paper-blog2-bottom-left-col">
                    <div class="paper-blog2-bottom-left">
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-bottom-time">
                                <span class="paper-bottom-date">{{ \Carbon\Carbon::parse($tech[9]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{$tech[9]['cat_title']}}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="clock">
                                {{$tech[9]['reading_time']}} dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                             
                            <a href="{{ route('detail', ['post' => $tech[9]['id']]) }}" style="color: #020202; text-decoration:none">
                                @if(mb_strlen($tech[9]['post_title']) > 40)
                                    {{ html_entity_decode(mb_substr($tech[9]['post_title'], 0, 40)) . '...' }}
                                @else
                                    {!! html_entity_decode($tech[9]['post_title']) !!}
                                @endif
                            </a>
                            <p>
                                @if(mb_strlen($tech[9]['description']) > 90)
                                    {{ html_entity_decode(mb_substr($tech[9]['description'], 0, 90)) . '...' }}
                                @else
                                    {!! html_entity_decode($tech[9]['description']) !!}
                                @endif
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a href="{{route('detail', ['post' => $tech[9]['id']])}}"><button>
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="more">
                            </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="look">
                                    {{$tech[9]['view']}}

                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[9]['id'] }}" style="{{ in_array($tech[9]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[9]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[9]['id'] }}" style="{{ in_array($tech[9]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[9]['id'] }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[9]['id'] }}" style="{{ in_array($tech[9]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[9]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[9]['id'] }}" style="{{ in_array($tech[9]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[9]['id'] }})" >
                            </div>
                        </div>
                    </div>
                    <div class="paper-1">
                        <img class="paper-1-img" src="{{ config('filesystems.disks.post-images.url') . "/{$tech[10]['image']}" }}" alt="paper-1-img">
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($tech[10]['created_at'])->format('d.m.Y') }}</p>
                                <span></span>
                                <p>{{$tech[10]['cat_title']}}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                <span>{{$tech[10]['reading_time']}} dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['post' => $tech[10]['id']]) }}" style="color: #020202; text-decoration:none">
                                @if(mb_strlen($tech[10]['post_title']) > 40)
                                    {{ html_entity_decode(mb_substr($tech[10]['post_title'], 0, 40)) . '...' }}
                                @else
                                    {!! html_entity_decode($tech[10]['post_title']) !!}
                                @endif
                            </a>
                            <p>
                                @if(mb_strlen($tech[10]['description']) > 100)
                                    {{ html_entity_decode(mb_substr($tech[10]['description'], 0, 100)) . '...' }}
                                @else
                                    {!! html_entity_decode($tech[10]['description']) !!}
                                @endif
                            </p>
                        </div>
                        <div class="blog-det-3">
                            <a href="{{route('detail', ['post' => $tech[10]['id']])}}"><button class="read-more">
                                Daha çox
                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                            </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                    <p>{{$tech[10]['view']}}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $tech[10]['id'] }}" style="{{ in_array($tech[10]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $tech[10]['id'] }})">
                                        <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $tech[10]['id'] }}" style="{{ in_array($tech[10]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $tech[10]['id'] }})" >
                                    </button>
                                    <button>
                                        <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $tech[10]['id'] }}" style="{{ in_array($tech[10]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $tech[10]['id'] }})">
                                        <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $tech[10]['id'] }}" style="{{ in_array($tech[10]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $tech[10]['id'] }})" >
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
                                <img src="{{ config('filesystems.disks.post-images.url') . "/$s->image" }}" alt="blog2" />
                            </div>
                            <div class="paper-carousel-content col-md-7">
                                <span>{{ ($s->created_at)->format('d.m.Y') }}</span>
                                <a href="{{ route('detail', $s->id) }}" style="color: #020202; text-decoration:none">
                                    @if(mb_strlen($s->post_title) > 50)
                                        {{ html_entity_decode(mb_substr($s->post_title, 0, 50)) . '...' }}
                                    @else
                                        {!! html_entity_decode($s->post_title) !!}
                                    @endif
                                </a>
                                <p>
                                    @if(mb_strlen($s->description) > 120)
                                        {{ html_entity_decode(mb_substr($s->description, 0, 120)) . '...' }}
                                    @else
                                        {!! html_entity_decode($s->description) !!}
                                    @endif
                                    
                                </p>
                                <div class="action-sec">
                                    <div class="look-numb">
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                        <p>{{$s->view}}</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
 
                    
                    
                </div>
            </div>
            <div class="paper-load-more">
                <a href="{{ route('techall') }}">
                <button>
                    Daha çox
                    <img src="{{asset('back/assets/img/paper/load-more.png')}}" alt="load-more" />
                </button>
                </a>
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
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> --}}
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


    <script>
        function likePost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }}; 
    
        if (!isLoggedIn) {
            $('#loginModal').modal('show');
        } else {
            $.ajax({
                url: '{{ route('techlike') }}',
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
            url: '{{ route('techdislike') }}',
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
                url: '{{ route('techbook') }}',
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
            url: '{{ route('techdisbook') }}',
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
