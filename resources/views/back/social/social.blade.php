@extends('back.layouts.master')
@section('title','Kaizen.az | Sosial Medialar')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">SEO</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sosial Medialar</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Sosial Medialar</h3>
                </div>
                <form class="card-body" id="seo" action="{{route('socialPost')}}" method="POST">
                    @include('back.layouts.message')
                    @csrf
                    <div class="row row-xs form-group-wrapper">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary-transparent text-primary">
                                     <i class="fa fa-facebook"></i>
                                    </span>
                                    <input id="facebook" name="facebook" value="{{$social->facebook}}" class="form-control" placeholder="Facebook" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary-transparent text-primary">
                                     <i class="fa fa-twitter"></i>
                                    </span>
                                    <input id="twitter" name="twitter" value="{{$social->twitter}}" class="form-control" placeholder="Twitter" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary-transparent text-primary">
                                     <i class="fa fa-instagram"></i>
                                    </span>
                                    <input id="instagram" name="instagram" value="{{$social->instagram}}" class="form-control" placeholder="Instagram" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary-transparent text-primary">
                                     <i class="fa fa-linkedin"></i>
                                    </span>
                                    <input id="linkedin" name="linkedin" value="{{$social->linkedin}}" class="form-control" placeholder="Linkedin" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary-transparent text-primary">
                                     <i class="fa fa-telegram"></i>
                                    </span>
                                    <input id="telegram" value="{{$social->telegram}}" name="telegram" class="form-control" placeholder="Telegram" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary-transparent text-primary">
                                    <img src="{{asset('assets/images/tiktok.svg')}}" alt="">
                                    </span>
                                    <input id="tiktok" name="tiktok" value="{{$social->tiktok}}" class="form-control" placeholder="Tiktok" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Yenilə</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /row -->



@endsection
