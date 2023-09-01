@extends('back.layouts.master')
@section('title','Kaizen.az | Hesabım')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">İstifadəçi redaktə</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hesabım</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Hesabım</h3>
                </div>
                <form class="card-body" action="{{route('profilePost')}}" method="POST" enctype="multipart/form-data">
                    @include('back.layouts.message')
                    @csrf
                    <input type="hidden" name="id" value="{{$admin->id}}">
                    <div class="row row-xs form-group-wrapper">
                        <div class="col-md-12 mb-3 text-center">
                            <p>Cari şəkil:</p>
                            <img src="{{asset($admin->image)}}" alt="" style="width: 200px;height: 200px">
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0"  placeholder="Status" type="text" value="Admin" disabled>
                                <label class="form-label mb-1">Status</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" name="fullname" id="fullname" placeholder="Ad və Soyad" type="text" value="{{$admin->fullname}}">
                                <label for="fullname" class="form-label mb-1">Ad və Soyad</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" id="username" name="username" placeholder="İstifadəçi adı" type="text" value="{{$admin->username}}">
                                <label for="username" class="form-label mb-1">İstifadəçi adı</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" id="email" name="email" placeholder="Email" type="email" value="{{$admin->email}}" disabled>
                                <label for="email" class="form-label mb-1">Email</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea name="about" id="about" cols="30" rows="10" class="form-control border-0" placeholder="Haqqımda">{{$admin->about}}</textarea>
                                <label for="about" class="form-label mb-1">Haqqımda</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="formFileSm" class="form-label">Profil şəkli seçin</label>
                                <input class="form-control file-input form-control-sm" name="image" id="formFileSm" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Təsdiqlə</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /row -->



@endsection
