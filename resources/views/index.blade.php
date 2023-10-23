@extends('front.Layouts.master')

@section('content')

        <section class="first-sec container mt-5">
            <img src="{{asset('back/assets/img/first-sec.png')}}" alt="">
            <div class="random-quote container">
                <img src="{{asset('back/assets/img/rand.png')}}" alt="">
                
                <div>
                    <b>{{ str_replace('"', '', htmlspecialchars_decode($quote->content)) }}</b>
                    <p>{{ str_replace('"', '', htmlspecialchars_decode($quote->author)) }}</p>
                </div>                

            </div>
        </section>
    
        <section class="second-sec container">
            <div class="row">
                <div class="col-lg-12 smile-sec">
                    <h2>Hazırki əhvalınıza uyğun ikon seçin, uyğun məqalə tövsiyəsi alın!</h2>
                        <div class="smile-block">
                            @foreach($emojis as $emoji)
                                <div class="smile-card">
                                    <a href="{{ route('emoji', ['emojiId' => $emoji->id]) }}">
                                        <img src="{{ asset($emoji->src) }}" alt="">
                                    </a>
                                </div>
                            @endforeach


                        </div>
                </div>
            </div>
        </section>
    
        <section class="blogs-sec container">
            <div class="row">
                <div class="col-lg-3 left-side">
    
                    <div>
                        <div class="latest-blog">
                            <h2>Ən son məqalələr</h2>
                        </div>
                        @foreach ($sonposts as $son)
                            
                        <div class="blog-1">
                            <img src="{{ config('filesystems.disks.post-images.url') . "/$son->image" }}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{ ($son->created_at)->format('d.m.Y') }}</p>
                                    <span></span>
                                    <p>{{$son->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                    <span>{{$son->reading_time}} dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                                <a href="{{route('detail', $son->id)}}" style="color: #020202;text-decoration:none">
                                    @if(mb_strlen($son->post_title) > 20)
                                        {{ html_entity_decode(mb_substr($son->post_title, 0, 20)) . '...' }}
                                    @else
                                        {!! html_entity_decode($son->post_title) !!}
                                    @endif
                                </a>
                                <p>
                                    @if(mb_strlen($son->description) > 120)
                                        {{ html_entity_decode(mb_substr($son->description, 0, 120)) . '...' }}
                                    @else
                                        {!! html_entity_decode($son->description) !!}
                                    @endif
                                </p>
                            </div>
                            <div class="blog-det-3">
                                <a href="{{route('detail', $son->id)}}"><button class="read-more">Daha çox
                                    
                                    <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                </button>
                                </a>
                                <div class="action-sec">
                                    <div class="look-numb">
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                        <p>{{$son->view}}</p>
                                    </div>
                                    <div class="act-btns">
                                        <button>
                                            <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $son->id }}" style="{{ in_array($son->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $son->id }})">
                                            <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $son->id }}" style="{{ in_array($son->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $son->id }})" >
                                        </button>
                                        <button>
                                            <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $son->id }}" style="{{ in_array($son->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $son->id }})">
                                            <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $son->id }}" style="{{ in_array($son->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $son->id }})" >
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
                            <h2>Digər məqalələr</h2>
                        </div>
                        @foreach ($diger1 as $diger1)
                            
                            <div class="blog-1">
                                <img class="other-blog-1-img" src="{{ config('filesystems.disks.post-images.url') . "/$diger1->image" }}" alt="">
                                <div class="blog-det">
                                    <div class="blog-date">
                                        <p>{{ ($diger1->created_at)->format('d.m.Y') }}</p>
                                        <span></span>
                                        <p>{{$diger1->cat_title}}</p>
                                    </div>
                                    <div class="blog-time">
                                        <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                        <span>{{$diger1->reading_time}} dəq</span>
                                    </div>
                                </div>
                                <div class="blog-det-2">
                                    <a href="{{route('detail', $diger1->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($diger1->post_title) }}</a>
                                    <p>{{htmlspecialchars_decode($diger1->description)}}</p>

                                </div>
                                <div class="blog-det-3">
                                    <a href="{{route('detail', $diger1->id)}}"><button class="read-more">Daha çox
                                    
                                        <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                    </button>
                                    </a>
                                    <div class="action-sec">
                                        <div class="look-numb">
                                            <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                            <p>{{$diger1->view}}</p>
                                        </div>
                                        <div class="act-btns">
                                            <button>
                                                <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $diger1->id }}" style="{{ in_array($diger1->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $diger1->id }})">
                                                <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $diger1->id }}" style="{{ in_array($diger1->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $diger1->id }})" >
                                            </button>
                                            <button>
                                                <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $diger1->id }}" style="{{ in_array($diger1->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $diger1->id }})">
                                                <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $diger1->id }}" style="{{ in_array($diger1->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $diger1->id }})" >
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    <div class="row">
                        @foreach ($diger2 as $diger2)
                        
                            <div class="col-lg-6">
                                <div class="blog-1">
                                    <img src="{{ config('filesystems.disks.post-images.url') . "/$diger2->image" }}" alt="">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($diger2->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$diger2->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>{{$diger2->reading_time}} dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $diger2->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($diger2->post_title) }}</a>
                                        <p>{{htmlspecialchars_decode($diger2->description)}}</p>

                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $diger2->id)}}"><button class="read-more">Daha çox
                                    
                                            <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                        </button>
                                        </a>
                                        <div class="action-sec">
                                            <div class="look-numb">
                                                <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                                <p>{{$diger2->view}}</p>
                                            </div>
                                            <div class="act-btns">
                                                <button>
                                                    <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $diger2->id }}" style="{{ in_array($diger2->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $diger2->id }})">
                                                    <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $diger2->id }}" style="{{ in_array($diger2->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $diger2->id }})" >
                                                </button>
                                                <button>
                                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $diger2->id }}" style="{{ in_array($diger2->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $diger2->id }})">
                                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $diger2->id }}" style="{{ in_array($diger2->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $diger2->id }})" >
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        @endforeach
                        </div>


                        @foreach ($diger3 as $diger3)
                            
                        <div class="blog-1">
                            <img class="other-blog-1-img" src="{{ config('filesystems.disks.post-images.url') . "/$diger3->image" }}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{ ($diger3->created_at)->format('d.m.Y') }}</p>
                                    <span></span>
                                    <p>{{$diger3->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                    <span>{{$diger3->reading_time}} dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                                <a href="{{route('detail', $diger3->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($diger3->post_title) }}</a>
                                <p>{{htmlspecialchars_decode($diger3->description)}}</p>

                            </div>
                            <div class="blog-det-3">
                                <a href="{{route('detail', $diger3->id)}}"><button class="read-more">Daha çox
                                    
                                    <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                </button>
                                </a>
                                <div class="action-sec">
                                    <div class="look-numb">
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                        <p>{{$diger3->view}}</p>
                                    </div>
                                    <div class="act-btns">
                                        <button>
                                            <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $diger3->id }}" style="{{ in_array($diger3->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $diger3->id }})">
                                            <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $diger3->id }}" style="{{ in_array($diger3->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $diger3->id }})" >
                                        </button>
                                        <button>
                                            <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $diger3->id }}" style="{{ in_array($diger3->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $diger3->id }})">
                                            <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $diger3->id }}" style="{{ in_array($diger3->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $diger3->id }})" >
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

    
                        <a href="{{route('ferdi')}}">
                        <button class="read-more-mid">
                            Daha çox
                            <img src="{{asset('back/assets/img/more.png')}}" alt="">
                        </button>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 right-side">
    
                    <div>
                        <div class="latest-blog">
                            <h2>Məşhur məqalələr</h2>
                        </div>
                        @foreach ($famous as $fam)
                            
                        <div class="blog-1">
                            <img src="{{ config('filesystems.disks.post-images.url') . "/$fam->image" }}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{ ($fam->created_at)->format('d.m.Y') }}</p>
                                    <span></span>
                                    <p>{{$fam->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                    <span>{{$fam->reading_time}} dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                            <a href="{{route('detail', $fam->id)}}" style="color: #020202;text-decoration:none">
                                @if(mb_strlen($fam->post_title) > 20)
                                    {{ html_entity_decode(mb_substr($fam->post_title, 0, 20)) . '...' }}
                                @else
                                    {!! html_entity_decode($fam->post_title) !!}
                                @endif
                            </a>
                                <p>
                                    @if(mb_strlen($fam->description) > 120)
                                        {{ html_entity_decode(mb_substr($fam->description, 0, 120)) . '...' }}
                                    @else
                                        {!! html_entity_decode($fam->description) !!}
                                    @endif
                                </p>
                            </div>
                            <div class="blog-det-3">
                                <a href="{{route('detail', $fam->id)}}"><button class="read-more">Daha çox
                                    
                                    <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                </button>
                                </a>
                                <div class="action-sec">
                                    <div class="look-numb">
                                        <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                        <p>{{$fam->view}}</p>
                                    </div>
                                    <div class="act-btns">
                                        <button>
                                            <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $fam->id }}" style="{{ in_array($fam->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $fam->id }})">
                                            <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $fam->id }}" style="{{ in_array($fam->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $fam->id }})" >
                                        </button>
                                        <button>
                                            <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $fam->id }}" style="{{ in_array($fam->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $fam->id }})">
                                            <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $fam->id }}" style="{{ in_array($fam->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $fam->id }})" >
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



        

        <section class="blog-cats container">
            <h2 style="text-align: center;">Texnologiya</h2>
           <div class="row blog-row">
            <div class="blog-cat">
                <div class="cat-inner">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#ferdi" role="tab" aria-controls="home" aria-selected="true">Fərdi inkişaf</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#seyahet" role="tab" aria-controls="profile" aria-selected="false">Səyahət</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#hekayeler" role="tab" aria-controls="contact" aria-selected="false">Hekayələr</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="film-tab" data-toggle="tab" href="#film" role="tab" aria-controls="contact" aria-selected="false">Filmlər</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="biznes-tab" data-toggle="tab" href="#biznes" role="tab" aria-controls="contact" aria-selected="false">Biznes Dünyası</a>
                        </li>
                      </ul>
                      <button class="see-more-mid">
                        Daha çox
                        <img src="{{asset('back/assets/img/more.png')}}" alt="">
                    </button>
                </div>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="ferdi" role="tabpanel" aria-labelledby="home-tab">
                        @foreach ($ferdi as $ferdi)
                            <div class="blog-1">
                                <img src="{{ config('filesystems.disks.post-images.url') . "/$ferdi->image" }}" alt="">
                                <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($ferdi->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$ferdi->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>{{$ferdi->reading_time}} dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $ferdi->id)}}" style="color: #020202;text-decoration:none">
                                            @if(mb_strlen($ferdi->post_title) > 20)
                                                {{ html_entity_decode(mb_substr($ferdi->post_title, 0, 20)) . '...' }}
                                            @else
                                                {!! html_entity_decode($ferdi->post_title) !!}
                                            @endif
                                        </a>
                                        <p>
                                            @if(mb_strlen($ferdi->description) > 60)
                                                {{ html_entity_decode(mb_substr($ferdi->description, 0, 60)) . '...' }}
                                            @else
                                                {!! html_entity_decode($ferdi->description) !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $ferdi->id)}}"><button class="read-more">Daha çox
                                    
                                            <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                        </button>
                                        </a>
                                        <div class="action-sec">
                                            <div class="look-numb">
                                                <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                                <p>{{$ferdi->view}}</p>
                                            </div>
                                            <div class="act-btns">
                                                <button>
                                                    <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $ferdi->id }}" style="{{ in_array($ferdi->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $ferdi->id }})">
                                                    <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $ferdi->id }}" style="{{ in_array($ferdi->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $ferdi->id }})" >
                                                </button>
                                                <button>
                                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $ferdi->id }}" style="{{ in_array($ferdi->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $ferdi->id }})">
                                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $ferdi->id }}" style="{{ in_array($ferdi->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $ferdi->id }})" >
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="tab-pane fade" id="seyahet" role="tabpanel" aria-labelledby="profile-tab"> 
                        @foreach ($travel as $travel)
                            <div class="blog-1">
                                <img src="{{ config('filesystems.disks.post-images.url') . "/$travel->image" }}" alt="">
                                    <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($travel->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$travel->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>{{$travel->reading_time}} dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $travel->id)}}" style="color: #020202;text-decoration:none">
                                            @if(mb_strlen($travel->post_title) > 20)
                                                {{ html_entity_decode(mb_substr($travel->post_title, 0, 20)) . '...' }}
                                            @else
                                                {!! html_entity_decode($travel->post_title) !!}
                                            @endif
                                        </a>
                                        <p>
                                            @if(mb_strlen($travel->description) > 60)
                                                {{ html_entity_decode(mb_substr($travel->description, 0, 60)) . '...' }}
                                            @else
                                                {!! html_entity_decode($travel->description) !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $travel->id)}}">
                                            <button class="read-more">Daha çox
                                                <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                            </button>
                                        </a>
                                        <div class="action-sec">
                                            <div class="look-numb">
                                                <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                                <p>{{$travel->view}}</p>
                                            </div>
                                            <div class="act-btns">
                                                <button>
                                                    <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $travel->id }}" style="{{ in_array($travel->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $travel->id }})">
                                                    <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $travel->id }}" style="{{ in_array($travel->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $travel->id }})" >
                                                </button>
                                                <button>
                                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $travel->id }}" style="{{ in_array($travel->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $travel->id }})">
                                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $travel->id }}" style="{{ in_array($travel->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $travel->id }})" >
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="hekayeler" role="tabpanel" aria-labelledby="contact-tab">
                        @foreach ($story as $story)
                            <div class="blog-1">
                                <img src="{{ config('filesystems.disks.post-images.url') . "/$story->image" }}" alt="">
                                <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($story->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$story->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>{{$story->reading_time}} dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $story->id)}}" style="color: #020202;text-decoration:none">
                                            @if(mb_strlen($story->post_title) > 20)
                                                {{ html_entity_decode(mb_substr($story->post_title, 0, 20)) . '...' }}
                                            @else
                                                {!! html_entity_decode($story->post_title) !!}
                                            @endif
                                        </a>
                                        <p>
                                            @if(mb_strlen($story->description) > 60)
                                                {{ html_entity_decode(mb_substr($story->description, 0, 60)) . '...' }}
                                            @else
                                                {!! html_entity_decode($story->description) !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $story->id)}}"><button class="read-more">Daha çox
                                        
                                            <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                        </button>
                                        </a>
                                        <div class="action-sec">
                                            <div class="look-numb">
                                                <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                                <p>{{$story->view}}</p>
                                            </div>
                                            <div class="act-btns">
                                                <button>
                                                    <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $story->id }}" style="{{ in_array($story->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $story->id }})">
                                                    <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $story->id }}" style="{{ in_array($story->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $story->id }})" >
                                                </button>
                                                <button>
                                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $story->id }}" style="{{ in_array($story->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $story->id }})">
                                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $story->id }}" style="{{ in_array($story->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $story->id }})" >
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="film" role="tabpanel" aria-labelledby="film-tab">
                        @foreach ($film as $film)
                            <div class="blog-1">
                                <img src="{{ config('filesystems.disks.post-images.url') . "/$film->image" }}" alt="">
                                <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($film->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$film->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>{{$film->reading_time}} dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $film->id)}}" style="color: #020202;text-decoration:none">
                                            @if(mb_strlen($film->post_title) > 20)
                                                {{ html_entity_decode(mb_substr($film->post_title, 0, 20)) . '...' }}
                                            @else
                                                {!! html_entity_decode($film->post_title) !!}
                                            @endif
                                        </a>
                                        <p>
                                            @if(mb_strlen($film->description) > 60)
                                                {{ html_entity_decode(mb_substr($film->description, 0, 60)) . '...' }}
                                            @else
                                                {!! html_entity_decode($film->description) !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $film->id)}}"><button class="read-more">Daha çox
                                        
                                            <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                        </button>
                                        </a>
                                        <div class="action-sec">
                                            <div class="look-numb">
                                                <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                                <p>{{$film->view}}</p>
                                            </div>
                                            <div class="act-btns">
                                                <button>
                                                    <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $film->id }}" style="{{ in_array($film->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $film->id }})">
                                                    <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $film->id }}" style="{{ in_array($film->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $film->id }})" >
                                                </button>
                                                <button>
                                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $film->id }}" style="{{ in_array($film->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $film->id }})">
                                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $film->id }}" style="{{ in_array($film->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $film->id }})" >
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="biznes" role="tabpanel" aria-labelledby="biznes-tab">
                        @foreach ($biznes as $biznes)
                            <div class="blog-1">
                                <img src="{{ config('filesystems.disks.post-images.url') . "/$biznes->image" }}" alt="">
                                <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($biznes->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$biznes->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>{{$biznes->reading_time}} dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $biznes->id)}}" style="color: #020202;text-decoration:none">
                                            @if(mb_strlen($biznes->post_title) > 20)
                                                {{ html_entity_decode(mb_substr($biznes->post_title, 0, 20)) . '...' }}
                                            @else
                                                {!! html_entity_decode($biznes->post_title) !!}
                                            @endif
                                        </a>
                                        <p>
                                            @if(mb_strlen($biznes->description) > 60)
                                                {{ html_entity_decode(mb_substr($biznes->description, 0, 60)) . '...' }}
                                            @else
                                                {!! html_entity_decode($biznes->description) !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $biznes->id)}}"><button class="read-more">Daha çox
                                        
                                            <img src="{{asset('back/assets/img/more.png')}}" alt="">
                                        </button>
                                        </a>
                                        <div class="action-sec">
                                            <div class="look-numb">
                                                <img src="{{asset('back/assets/img/look.png')}}" alt="">
                                                <p>{{$biznes->view}}</p>
                                            </div>
                                            <div class="act-btns">
                                                <button>
                                                    <img src="{{ asset('back/assets/img/heart.png') }}" alt="heart" id="likeButton_{{ $biznes->id }}" style="{{ in_array($biznes->id, $likes) ? 'display: none;' : 'display: inline-block;' }}" onclick="likePost({{ $biznes->id }})">
                                                    <img src="{{ asset('back/assets/img/red-heart.png') }}" alt="redheart" id="dislikeButton_{{ $biznes->id }}" style="{{ in_array($biznes->id, $likes) ? 'display: inline-block;' : 'display: none;' }}" onclick="dislikePost({{ $biznes->id }})" >
                                                </button>
                                                <button>
                                                    <img src="{{ asset('back/assets/img/save.png') }}" alt="save" id="bookButton_{{ $biznes->id }}" style="{{ in_array($biznes->id, $book) ? 'display: none;' : 'display: inline-block;' }}" onclick="bookPost({{ $biznes->id }})">
                                                    <img src="{{ asset('back/assets/img/blackbook.png') }}" alt="black" id="disbookButton_{{ $biznes->id }}" style="{{ in_array($biznes->id, $book) ? 'display: inline-block;' : 'display: none;' }}" onclick="disbookPost({{ $biznes->id }})" >
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                  </div>
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
    <script src="{{asset('back/assets/js/app.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        function likePost(postId) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('indexlike') }}',
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
        function likePost(postId) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }}; 
    
            if (!isLoggedIn) {
                $('#loginModal').modal('show');
            } else {
                $.ajax({
                    url: '{{ route('indexlike') }}',
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
            url: '{{ route('indexdislike') }}',
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
                url: '{{ route('indexbook') }}',
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
            url: '{{ route('indexdisbook') }}',
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

    <script>
        var seeMoreButton = document.querySelector('.see-more-mid');
        seeMoreButton.addEventListener('click', function() {
            var activeTab = document.querySelector('.nav-link.active');
            var tabId = activeTab.getAttribute('href').substring(1); 
            switch (tabId) {
                case 'ferdi':
                    window.location.href = '{{route('ferdi')}}';
                    break;
                case 'seyahet':
                    window.location.href = '{{route('travel')}}';
                    break;
                case 'hekayeler':
                    window.location.href = '{{route('story')}}';
                    break;
                case 'film':
                    window.location.href = '{{route('film')}}';
                    break;
                case 'biznes':
                    window.location.href = '{{route('biznes')}}';
                    break;
                default:
                    break;
            }
        });

    </script>

    <script>
        $(document).ready(function () {
            $(".emoji-button").click(function () {
                var emojiId = $(this).data("emoji-id");

                $.ajax({
                    url: "/emoji/" + emojiId,
                    method: "GET",
                    success: function (data) {
                        console.log(data.posts); 
                    },
                    error: function (error) {
                        console.error("Hata oluştu: " + error);
                    }
                });
            });
        });

    </script>
 @endsection
