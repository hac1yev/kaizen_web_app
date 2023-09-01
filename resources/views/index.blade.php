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
                    <h2>Default əhvalınızı seçin, məqalə generate edək</h2>
                        <div class="smile-block">
                            <div class="smile-card">
                                <button>
                                    <img src="{{asset('back/assets/img/1.png')}}" alt="">
                                </button>
                            </div>
                            <div class="smile-card">
                                <button>
                                    <img src="{{asset('back/assets/img/2.png')}}" alt="">
                                </button>
                            </div>
                            <div class="smile-card">
                                <button>
                                    <img src="{{asset('back/assets/img/3.png')}}" alt="">
                                </button>
                            </div>
                            <div class="smile-card">
                                <button>
                                    <img src="{{asset('back/assets/img/4.png')}}" alt="">
                                </button>
                            </div>
                            <div class="smile-card">
                                <button>
                                    <img src="{{asset('back/assets/img/5.png')}}" alt="">
                                </button>
                            </div>
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
                            <img src="{{$son->image}}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{ ($son->created_at)->format('d.m.Y') }}</p>
                                    <span></span>
                                    <p>{{$son->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                    <span>2 dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                                <a href="{{route('detail', $son->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($son->post_title) }}</a>
                                <p>{{htmlspecialchars_decode($son->description)}}</p>
                            </div>
                            <div class="blog-det-3">
                                <a href="{{route('detail', $son->id)}}"><button class="read-more">Read More
                                    
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
                                            <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                        </button>
                                        <button>
                                            <img src="{{asset('back/assets/img/save.png')}}" alt="">
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
                                <img src="{{$diger1->image}}" alt="">
                                <div class="blog-det">
                                    <div class="blog-date">
                                        <p>{{ ($diger1->created_at)->format('d.m.Y') }}</p>
                                        <span></span>
                                        <p>{{$diger1->cat_title}}</p>
                                    </div>
                                    <div class="blog-time">
                                        <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                        <span>2 dəq</span>
                                    </div>
                                </div>
                                <div class="blog-det-2">
                                    <a href="{{route('detail', $diger1->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($diger1->post_title) }}</a>
                                    <p>{{htmlspecialchars_decode($diger1->description)}}</p>

                                </div>
                                <div class="blog-det-3">
                                    <a href="{{route('detail', $diger1->id)}}"><button class="read-more">Read More
                                    
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
                                                <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                            </button>
                                            <button>
                                                <img src="{{asset('back/assets/img/save.png')}}" alt="">
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
                                    <img src="{{$diger2->image}}" alt="">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($diger2->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$diger2->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>2 dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $diger2->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($diger2->post_title) }}</a>
                                        <p>{{htmlspecialchars_decode($diger2->description)}}</p>

                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $diger2->id)}}"><button class="read-more">Read More
                                    
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


                        @foreach ($diger3 as $diger3)
                            
                        <div class="blog-1">
                            <img src="{{$diger3->image}}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{ ($diger3->created_at)->format('d.m.Y') }}</p>
                                    <span></span>
                                    <p>{{$diger3->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                    <span>2 dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                                <a href="{{route('detail', $diger3->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($diger3->post_title) }}</a>
                                <p>{{htmlspecialchars_decode($diger3->description)}}</p>

                            </div>
                            <div class="blog-det-3">
                                <a href="{{route('detail', $diger3->id)}}"><button class="read-more">Read More
                                    
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
                                            <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                        </button>
                                        <button>
                                            <img src="{{asset('back/assets/img/save.png')}}" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

    
                        <a href="{{route('ferdi')}}">
                        <button class="read-more-mid">
                            Read More
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
                            <img src="{{$fam->image}}" alt="">
                            <div class="blog-det">
                                <div class="blog-date">
                                    <p>{{ ($fam->created_at)->format('d.m.Y') }}</p>
                                    <span></span>
                                    <p>{{$fam->cat_title}}</p>
                                </div>
                                <div class="blog-time">
                                    <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                    <span>2 dəq</span>
                                </div>
                            </div>
                            <div class="blog-det-2">
                            <a href="{{route('detail', $fam->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($fam->post_title) }}</a>
                                <p>{{htmlspecialchars_decode($fam->description)}}
                                @if(mb_strlen(htmlspecialchars_decode($fam->description)) > 5)
                                {{ mb_substr(htmlspecialchars_decode($fam->description), 0, 10) . ' ...' }}
                            @else
                                {{ htmlspecialchars_decode($fam->description) }}
                            @endif
                        </p>
                            </div>
                            <div class="blog-det-3">
                                <a href="{{route('detail', $fam->id)}}"><button class="read-more">Read More
                                    
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
                                            <img src="{{asset('back/assets/img/heart.png')}}" alt="">
                                        </button>
                                        <button>
                                            <img src="{{asset('back/assets/img/save.png')}}" alt="">
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
                        See More
                        <img src="{{asset('back/assets/img/more.png')}}" alt="">
                    </button>
                </div>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="ferdi" role="tabpanel" aria-labelledby="home-tab">
                        @foreach ($ferdi as $ferdi)
                            <div class="blog-1">
                                <img src="{{$ferdi->image}}" alt="">
                                <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($ferdi->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$ferdi->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>2 dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $ferdi->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($ferdi->post_title) }}</a>
                                        <p>{{htmlspecialchars_decode($ferdi->description)}}</p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $ferdi->id)}}"><button class="read-more">Read More
                                    
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
                    <div class="tab-pane fade" id="seyahet" role="tabpanel" aria-labelledby="profile-tab"> 
                        @foreach ($travel as $travel)
                            <div class="blog-1">
                                <img src="{{$travel->image}}" alt="">
                                    <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($travel->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$travel->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>2 dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $travel->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($travel->post_title) }}</a>
                                        <p>{{htmlspecialchars_decode($travel->description)}}</p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $travel->id)}}">
                                            <button class="read-more">Read More
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

                    <div class="tab-pane fade" id="hekayeler" role="tabpanel" aria-labelledby="contact-tab">
                        @foreach ($story as $story)
                            <div class="blog-1">
                                <img src="{{$story->image}}" alt="">
                                <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($story->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$story->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>2 dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $story->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($story->post_title) }}</a>
                                        <p>{{htmlspecialchars_decode($story->description)}}</p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $story->id)}}"><button class="read-more">Read More
                                        
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
                    <div class="tab-pane fade" id="film" role="tabpanel" aria-labelledby="film-tab">
                        @foreach ($film as $film)
                            <div class="blog-1">
                                <img src="{{$film->image}}" alt="">
                                <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($film->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$film->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>2 dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $film->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($film->post_title) }}</a>
                                        <p>{{htmlspecialchars_decode($film->description)}}</p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $film->id)}}"><button class="read-more">Read More
                                        
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
                    <div class="tab-pane fade" id="biznes" role="tabpanel" aria-labelledby="biznes-tab">
                        @foreach ($biznes as $biznes)
                            <div class="blog-1">
                                <img src="{{$biznes->image}}" alt="">
                                <div class="total-detail">
                                    <div class="blog-det">
                                        <div class="blog-date">
                                            <p>{{ ($biznes->created_at)->format('d.m.Y') }}</p>
                                            <span></span>
                                            <p>{{$biznes->cat_title}}</p>
                                        </div>
                                        <div class="blog-time">
                                            <img src="{{asset('back/assets/img/clock.png')}}" alt="">
                                            <span>2 dəq</span>
                                        </div>
                                    </div>
                                    <div class="blog-det-2">
                                        <a href="{{route('detail', $biznes->id)}}" style="color: #020202;text-decoration:none">{{ htmlspecialchars_decode($biznes->post_title) }}</a>
                                        <p>{{htmlspecialchars_decode($biznes->description)}}</p>
                                    </div>
                                    <div class="blog-det-3">
                                        <a href="{{route('detail', $biznes->id)}}"><button class="read-more">Read More
                                        
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
 @endsection
