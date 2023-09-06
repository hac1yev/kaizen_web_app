@extends('front.Layouts.master')

@section('content')
    <section class="mt-2">
        <div class="container">
            <div class="row users-row">
                <div class="col-12 users-head">
                    <h3>İSTİFADƏÇİLƏR</h3>
                    <form action="{{route('useraxtar')}}" method="GET">
                        <input type="text" placeholder="Axtar" name="searching" value="{{ (isset($searchingVal)) ? $searchingVal : null }}" />
                    </form>
                </div>
                @if (($searchingVal))
                    @foreach ($users as $u)
                        <div class="col-md-3 col-sm-6 mt-2">
                            <div class="card">
                                <img class="card-img" src="{{$u->image}}" alt="user1" />
                                <h6 class="card-title">{{$u->fullname}}</h6>
                                <span>{{$u->username}}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1>Belə bir istifadəçi yoxdur</h1>
                @endif
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
    <script src="back/assets/js/users.js"></script>
    
@endsection
