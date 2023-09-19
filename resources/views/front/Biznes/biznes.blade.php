@extends('front.Layouts.master')


@section('content')
    <section class="paper-section">

        <div class="container paper-container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="paper-col6">
                        <div class="paper-blog2-img">
                            <img src="{{ config('filesystems.disks.post-images.url') . "/{$business[0]['image']}" }}" alt="blog2" />
                        </div>
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-time">
                                @php
                                    use Carbon\Carbon;

                                @endphp
                                <span
                                    class="paper-date">{{ \Carbon\Carbon::parse($business[0]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{ $business[0]['cat_title'] }}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{ asset('back/assets/img/clock.png') }}" alt="clock" />
                                {{$business[0]['reading_time']}} dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['post' => $business[0]['id']]) }}"
                                style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($business[0]['post_title'] )!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($business[0]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a
                                href="{{ route('detail', ['post' => $business[0]['id']]) }}"><button>
                                    Daha çox
                                    <img src="{{ asset('back/assets/img/more.png') }}" alt="more" />
                                </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{ asset('back/assets/img/look.png') }}" alt="look" />
                                    {{ $business[0]['view'] }}
                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[0]['id'] }}" style="{{ in_array($business[0]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[0]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[0]['id'] }}" style="{{ in_array($business[0]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[0]['id'] }})" >


                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[0]['id'] }}" style="{{ in_array($business[0]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[0]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[0]['id'] }}" style="{{ in_array($business[0]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[0]['id'] }})" >
                            </div>
                        </div>
                    </div>
                    <div class="paper-blog2-bottom">
                        <div class="paper-blog2-bottom-left">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-bottom-time">
                                    <span
                                        class="paper-bottom-date">{{ \Carbon\Carbon::parse($business[1]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{ $business[1]['cat_title'] }}</span>
                                </p>
                                <span class="paper-minute">
                                    <img src="{{ asset('back/assets/img/clock.png') }}"
                                        alt="clock" />
                                        {{$business[1]['reading_time']}} dəq
                                </span>
                            </div>
                            <div class="paper-blog2-content">
                                <a href="{{ route('detail', ['post' => $business[1]['id']]) }}"
                                    style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($business[1]['post_title'])!!}</a>
                                <p>
                                    {!! htmlspecialchars_decode($business[1]['description'])!!}
                                </p>
                            </div>
                            <div class="paper-blog2-button">
                                <a
                                    href="{{ route('detail', ['post' => $business[1]['id']]) }}"><button
                                        class="read-more">Daha çox

                                        <img src="{{ asset('back/assets/img/more.png') }}" alt="">
                                    </button>
                                </a>
                                <div>
                                    <span>
                                        <img src="{{ asset('back/assets/img/look.png') }}"
                                            alt="look" />
                                        {{ $business[1]['view'] }}

                                    </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[1]['id'] }}" style="{{ in_array($business[1]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[1]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[1]['id'] }}" style="{{ in_array($business[1]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[1]['id'] }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[1]['id'] }}" style="{{ in_array($business[1]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[1]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[1]['id'] }}" style="{{ in_array($business[1]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[1]['id'] }})" >
                                </div>
                            </div>
                        </div>
                        <div class="paper-blog2-bottom-right">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-bottom-time">
                                    <span
                                        class="paper-bottom-date">{{ \Carbon\Carbon::parse($business[2]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{ $business[2]['cat_title'] }}</span>
                                </p>
                                <span class="paper-minute">
                                    <img src="{{ asset('back/assets/img/clock.png') }}"
                                        alt="clock" />
                                        {{$business[2]['reading_time']}} dəq
                                </span>
                            </div>
                            <div class="paper-blog2-content">
                                <a href="{{ route('detail', ['post' => $business[2]['id']]) }}"
                                    style="color: #020202; text-decoration:none">
                                    {!! htmlspecialchars_decode($business[2]['post_title'])!!}</a>
                                <p>
                                    {!! htmlspecialchars_decode($business[2]['description'])!!}
                                </p>
                            </div>
                            <div class="paper-blog2-button">
                                <a
                                    href="{{ route('detail', ['post' => $business[2]['id']]) }}"><button
                                        class="read-more">Daha çox

                                        <img src="{{ asset('back/assets/img/more.png') }}" alt="">
                                    </button>
                                </a>
                                <div>
                                    <span>
                                        <img src="{{ asset('back/assets/img/look.png') }}"
                                            alt="look" />
                                        {{ $business[2]['view'] }}

                                    </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[2]['id'] }}" style="{{ in_array($business[2]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[2]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[2]['id'] }}" style="{{ in_array($business[2]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[2]['id'] }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[2]['id'] }}" style="{{ in_array($business[2]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[2]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[2]['id'] }}" style="{{ in_array($business[2]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[2]['id'] }})" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-5">
                    <div class="paper-1">
                        <img class="paper-1-img" src="{{ config('filesystems.disks.post-images.url') . "/{$business[3]['image']}" }}"
                            alt="paper-1-img" />
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($business[3]['created_at'])->format('d.m.Y') }}
                                </p>
                                <span></span>
                                <p>{{ $business[3]['cat_title'] }}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{ asset('back/assets/img/clock.png') }}" alt="">
                                <span>{{$business[3]['reading_time']}} dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['post' => $business[3]['id']]) }}"
                                style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($business[3]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($business[3]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a
                                href="{{ route('detail', ['post' => $business[3]['id']]) }}"><button
                                    class="read-more">
                                    Daha çox
                                    <img src="{{ asset('back/assets/img/more.png') }}" alt="">
                                </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{ asset('back/assets/img/look.png') }}" alt="">
                                    <p>{{ $business[3]['view'] }}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[3]['id'] }}" style="{{ in_array($business[3]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[3]['id'] }})">
                                        <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[3]['id'] }}" style="{{ in_array($business[3]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[3]['id'] }})" >
                                    </button>
                                    <button>
                                        <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[3]['id'] }}" style="{{ in_array($business[3]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[3]['id'] }})">
                                        <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[3]['id'] }}" style="{{ in_array($business[3]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[3]['id'] }})" >
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="paper-k-img d-flex align-items-center justify-content-center">
                            <img src="{{ asset('back/assets/img/paper/paper-k.png') }}"
                                alt="paper-k" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-7 paper-k-content-mobile">
                    <div class="paper-blog1-bottom-left">
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-bottom-time">
                                <span
                                    class="paper-bottom-date">{{ \Carbon\Carbon::parse($business[4]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{ $business[4]['cat_title'] }}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{ asset('back/assets/img/clock.png') }}" alt="clock" />
                                {{$business[4]['reading_time']}} dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['post' => $business[4]['id']]) }}"
                                style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($business[4]['post_title'])!!}</a>
                            <p>
                                {!! htmlspecialchars_decode($business[4]['description'])!!}
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a
                                href="{{ route('detail', ['post' => $business[4]['id']]) }}"><button>
                                    Daha çox
                                    <img src="{{ asset('back/assets/img/more.png') }}" alt="more" />
                                </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{ asset('back/assets/img/look.png') }}" alt="look" />
                                    {{ $business[4]['view'] }}

                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[4]['id'] }}" style="{{ in_array($business[4]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[4]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[4]['id'] }}" style="{{ in_array($business[4]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[4]['id'] }})" >
                                
                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[4]['id'] }}" style="{{ in_array($business[4]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[4]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[4]['id'] }}" style="{{ in_array($business[4]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[4]['id'] }})" >
                            </div>
                        </div>
                    </div>
                    <div class="paper-2">
                        <img class="paper-1-img" src="{{ config('filesystems.disks.post-images.url') . "/{$business[5]['image']}" }}"
                            alt="paper-1-img" />
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($business[5]['created_at'])->format('d.m.Y') }}
                                </p>
                                <span></span>
                                <p>{{ $business[5]['cat_title'] }}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{ asset('back/assets/img/clock.png') }}" alt="">
                                <span>{{$business[5]['reading_time']}} dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['post' => $business[5]['id']]) }}"
                                style="color: #020202; text-decoration:none">
                                {!! htmlspecialchars_decode($business[5]['post_title'])!!}</a>
                            <p>{!! htmlspecialchars_decode($business[5]['description'])!!}</p>
                        </div>
                        <div class="blog-det-3">
                            <a
                                href="{{ route('detail', ['post' => $business[5]['id']]) }}"><button
                                    class="read-more">
                                    Daha çox
                                    <img src="{{ asset('back/assets/img/more.png') }}" alt="">
                                </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{ asset('back/assets/img/look.png') }}" alt="">
                                    <p>{{ $business[5]['view'] }}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[5]['id'] }}" style="{{ in_array($business[5]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[5]['id'] }})">
                                        <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[5]['id'] }}" style="{{ in_array($business[5]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[5]['id'] }})" >
                                    </button>
                                    <button>
                                        <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[5]['id'] }}" style="{{ in_array($business[5]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[5]['id'] }})">
                                        <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[5]['id'] }}" style="{{ in_array($business[5]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[5]['id'] }})" >
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mobile-paper-2">
                    <img class="paper-1-img" src="{{ config('filesystems.disks.post-images.url') . "/{$business[6]['image']}" }}"
                        alt="paper-1-img" />
                    <div class="blog-det">
                        <div class="blog-date">
                            <p>{{ \Carbon\Carbon::parse($business[6]['created_at'])->format('d.m.Y') }}
                            </p>
                            <span></span>
                            <p>{{ $business[6]['cat_title'] }}</p>
                        </div>
                        <div class="blog-time">
                            <img src="{{ asset('back/assets/img/clock.png') }}" alt="">
                            <span>{{$business[6]['reading_time']}} dəq</span>
                        </div>
                    </div>
                    <div class="blog-det-2">
                        <a href="{{ route('detail', ['post' => $business[6]['id']]) }}"
                            style="color: #020202; text-decoration:none">
                            {!! htmlspecialchars_decode($business[6]['post_title'])!!}</a>
                        <p>{!! htmlspecialchars_decode($business[6]['description'])!!}</p>
                    </div>
                    <div class="blog-det-3">
                        <a
                            href="{{ route('detail', ['post' => $business[6]['id']]) }}"><button
                                class="read-more">
                                Daha çox
                                <img src="{{ asset('back/assets/img/more.png') }}" alt="">
                            </button>
                        </a>
                        <div class="action-sec">
                            <div class="look-numb">
                                <img src="{{ asset('back/assets/img/look.png') }}" alt="">
                                <p>{{ $business[6]['view'] }}</p>
                            </div>
                            <div class="act-btns">
                                <button>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[6]['id'] }}" style="{{ in_array($business[6]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[6]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[6]['id'] }}" style="{{ in_array($business[6]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[6]['id'] }})" >
                                </button>
                                <button>
                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[6]['id'] }}" style="{{ in_array($business[6]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[6]['id'] }})">
                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[6]['id'] }}" style="{{ in_array($business[6]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[6]['id'] }})" >
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
                            <img class="w-100" src="{{ config('filesystems.disks.post-images.url') . "/{$business[7]['image']}" }}"
                                alt="elizabeth" />
                        </div>
                        <div class="paper-blog3-bottom-left">
                            <div class="paper-blog2-under">
                                <p class="paper-blog2-time">
                                    <span
                                        class="paper-date">{{ \Carbon\Carbon::parse($business[7]['created_at'])->format('d.m.Y') }}</span>
                                    <span>{{ $business[7]['cat_title'] }}</span>
                                </p>
                            </div>
                            <div class="paper-blog2-content">
                                <a href="{{ route('detail', ['post' => $business[7]['id']]) }}"
                                    style="color: #020202; text-decoration:none">
                                    @if(mb_strlen($business[7]['post_title']) > 40)
                                        {{ html_entity_decode(mb_substr($business[7]['post_title'], 0, 40)) . '...' }}
                                    @else
                                        {!! html_entity_decode($business[7]['post_title']) !!}
                                    @endif
                                </a>
                                <p>
                                    @if(mb_strlen($business[7]['description']) > 80)
                                        {{ html_entity_decode(mb_substr($business[7]['description'], 0, 80)) . '...' }}
                                    @else
                                        {!! html_entity_decode($business[7]['description']) !!}
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
                            <img src="{{ config('filesystems.disks.post-images.url') . "/{$business[8]['image']}" }}" alt="blog2" />
                        </div>
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-time">
                                <span
                                    class="paper-date">{{ \Carbon\Carbon::parse($business[8]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{ $business[8]['cat_title'] }}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{ asset('back/assets/img/clock.png') }}" alt="clock" />
                                {{$business[8]['reading_time']}} dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">
                            <a href="{{ route('detail', ['post' => $business[8]['id']]) }}"
                                style="color: #020202; text-decoration:none">
                                @if(mb_strlen($business[8]['post_title']) > 40)
                                    {{ html_entity_decode(mb_substr($business[8]['post_title'], 0, 40)) . '...' }}
                                @else
                                    {!! html_entity_decode($business[8]['post_title']) !!}
                                @endif
                            </a>
                            <p>
                                @if(mb_strlen($business[8]['description']) > 80)
                                    {{ html_entity_decode(mb_substr($business[8]['description'], 0, 80)) . '...' }}
                                @else
                                    {!! html_entity_decode($business[8]['description']) !!}
                                @endif
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a
                                href="{{ route('detail', ['post' => $business[8]['id']]) }}"><button>
                                    Daha çox
                                    <img src="{{ asset('back/assets/img/more.png') }}" alt="more" />
                                </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{ asset('back/assets/img/look.png') }}" alt="look" />
                                    {{ $business[8]['view'] }}

                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[8]['id'] }}" style="{{ in_array($business[8]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[8]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[8]['id'] }}" style="{{ in_array($business[8]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[8]['id'] }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[8]['id'] }}" style="{{ in_array($business[8]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[8]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[8]['id'] }}" style="{{ in_array($business[8]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[8]['id'] }})" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 paper-blog2-bottom-left-col">
                    <div class="paper-blog2-bottom-left">
                        <div class="paper-blog2-under">
                            <p class="paper-blog2-bottom-time">
                                <span
                                    class="paper-bottom-date">{{ \Carbon\Carbon::parse($business[9]['created_at'])->format('d.m.Y') }}</span>
                                <span>{{ $business[9]['cat_title'] }}</span>
                            </p>
                            <span class="paper-minute">
                                <img src="{{ asset('back/assets/img/clock.png') }}" alt="clock">
                                {{$business[9]['reading_time']}} dəq
                            </span>
                        </div>
                        <div class="paper-blog2-content">

                            <a href="{{ route('detail', ['post' => $business[9]['id']]) }}"
                                style="color: #020202; text-decoration:none">
                                @if(mb_strlen($business[9]['post_title']) > 40)
                                    {{ html_entity_decode(mb_substr($business[9]['post_title'], 0, 40)) . '...' }}
                                @else
                                    {!! html_entity_decode($business[9]['post_title']) !!}
                                @endif
                            </a>
                            <p>
                                @if(mb_strlen($business[9]['description']) > 80)
                                    {{ html_entity_decode(mb_substr($business[9]['description'], 0, 80)) . '...' }}
                                @else
                                    {!! html_entity_decode($business[9]['description']) !!}
                                @endif
                            </p>
                        </div>
                        <div class="paper-blog2-button">
                            <a
                                href="{{ route('detail', ['post' => $business[9]['id']]) }}"><button>
                                    Daha çox
                                    <img src="{{ asset('back/assets/img/more.png') }}" alt="more">
                                </button>
                            </a>
                            <div>
                                <span>
                                    <img src="{{ asset('back/assets/img/look.png') }}" alt="look">
                                    {{ $business[9]['view'] }}

                                </span>
                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[9]['id'] }}" style="{{ in_array($business[9]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[9]['id'] }})">
                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[9]['id'] }}" style="{{ in_array($business[9]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[9]['id'] }})" >

                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[9]['id'] }}" style="{{ in_array($business[9]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[9]['id'] }})">
                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[9]['id'] }}" style="{{ in_array($business[9]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[9]['id'] }})" >
                            </div>
                        </div>
                    </div>
                    <div class="paper-1">
                        <img class="paper-1-img" src="{{ config('filesystems.disks.post-images.url') . "/{$business[10]['image']}" }}"
                            alt="paper-1-img">
                        <div class="blog-det">
                            <div class="blog-date">
                                <p>{{ \Carbon\Carbon::parse($business[10]['created_at'])->format('d.m.Y') }}
                                </p>
                                <span></span>
                                <p>{{ $business[10]['cat_title'] }}</p>
                            </div>
                            <div class="blog-time">
                                <img src="{{ asset('back/assets/img/clock.png') }}" alt="">
                                <span>{{$business[10]['reading_time']}} dəq</span>
                            </div>
                        </div>
                        <div class="blog-det-2">
                            <a href="{{ route('detail', ['post' => $business[10]['id']]) }}"
                                style="color: #020202; text-decoration:none">
                                @if(mb_strlen($business[10]['post_title']) > 40)
                                    {{ html_entity_decode(mb_substr($business[10]['post_title'], 0, 40)) . '...' }}
                                @else
                                    {!! html_entity_decode($business[10]['post_title']) !!}
                                @endif
                            </a>
                            <p>
                                @if(mb_strlen($business[10]['description']) > 100)
                                    {{ html_entity_decode(mb_substr($business[10]['description'], 0, 100)) . '...' }}
                                @else
                                    {!! html_entity_decode($business[10]['description']) !!}
                                @endif
                            </p>
                        </div>
                        <div class="blog-det-3">
                            <a
                                href="{{ route('detail', ['post' => $business[10]['id']]) }}"><button
                                    class="read-more">
                                    Daha çox
                                    <img src="{{ asset('back/assets/img/more.png') }}" alt="">
                                </button>
                            </a>
                            <div class="action-sec">
                                <div class="look-numb">
                                    <img src="{{ asset('back/assets/img/look.png') }}" alt="">
                                    <p>{{ $business[10]['view'] }}</p>
                                </div>
                                <div class="act-btns">
                                    <button>
                                        <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $business[10]['id'] }}" style="{{ in_array($business[10]['id'], $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $business[10]['id'] }})">
                                        <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $business[10]['id'] }}" style="{{ in_array($business[10]['id'], $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $business[10]['id'] }})" >
                                    </button>
                                    <button>
                                        <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $business[10]['id'] }}" style="{{ in_array($business[10]['id'], $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $business[10]['id'] }})">
                                        <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $business[10]['id'] }}" style="{{ in_array($business[10]['id'], $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $business[10]['id'] }})" >
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row owl-carousel-row">
                <div class="owl-carousel">
                    @foreach($slayd as $s)

                        <div class="col-12">
                            <div class="paper-carousel row">
                                <div class="paper-carousel-img col-md-5">
                                    <img src="{{ config('filesystems.disks.post-images.url') . "/$s->image" }}" alt="blog2" />
                                </div>
                                <div class="paper-carousel-content col-md-7">
                                    <span>{{ ($s->created_at)->format('d.m.Y') }}</span>
                                    <a href="{{ route('detail', $s->id) }}"
                                        style="color: #020202; text-decoration:none">
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
                                            <img src="{{ asset('back/assets/img/look.png') }}"
                                                alt="">
                                            <p>{{ $s->view }}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach



                </div>
            </div>
            <div class="paper-load-more">
                <a href="{{ route('biznesall') }}">
                <button>
                    Daha çox
                    <img src="{{ asset('back/assets/img/paper/load-more.png') }}"
                        alt="load-more" />
                </button>
                </a>
            </div>
        </div>
    </section>
    @foreach($adverts as $ads)

        <a href="{{ $ads->redirect_link }}" target="_blank">
            <img src="{{ $ads->image }}" alt="employment.az" style="width:100%; height:320px;">
        </a>
    @endforeach
@endsection

@section('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('back/assets/js/app.js') }}"></script>
    <script src="{{ asset('back/assets/js/owl.carousel.min.js') }}"></script>

    <script>
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            items: 1,
            nav: true,
            navText: [
                "<img src='{{ asset('back/assets/img/paper/navText.png') }}' />",
                "<img src='{{ asset('back/assets/img/paper/navText.png') }}' />",
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
                url: '{{ route('bizneslike') }}',
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
            url: '{{ route('biznesdislike') }}',
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
                url: '{{ route('biznesbook') }}',
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
            url: '{{ route('biznesdisbook') }}',
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