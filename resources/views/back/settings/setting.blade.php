@extends('back.layouts.master')
@section('title','Kaizen.az | Tənzimləmələr')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Tənzimləmələr</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tənzimləmələr</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    @include('back.layouts.message')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Haqqında</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('settingsPost')}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <label for="email" class="form-label">Haqqında</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="about" id="" cols="30" rows="3">{{$settings->about}}</textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Təsdiqlə</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Buta Logo</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column mb-4 bg-dark">
                        <p class="text-light">Cari Buta Logo:  </p>
                        <img src="{{asset($settings->logo_buta)}}" alt="" style="width: 200px;height: 100px">
                    </div>
                    <form class="form-horizontal" action="{{route('butaLogoPost')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                        <div class="row mb-4">
                            <label for="email" class="form-label">Yeni logo</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="buta_image">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Təsdiqlə</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Kaizen Logo Header</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column mb-4">
                        <p>Cari Kaizen Logo Header:</p>
                        <img src="{{asset($settings->logo_kaizen_header)}}" alt="" style="width: 200px;height: 100px">
                    </div>
                    <form class="form-horizontal" action="{{route('kaizenHeaderPost')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="row mb-4">
                            <label for="email" class="form-label">Yeni logo</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="kaizen_header">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Təsdiqlə</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Kaizen Logo Footer</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column mb-4">
                        <p>Cari Kaizen Logo Footer:</p>
                        <img src="{{asset($settings->logo_kaizen_footer)}}" alt="" style="width: 200px;height: 100px">
                    </div>
                    <form class="form-horizontal" action="{{route('kaizenFooterPost')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="row mb-4">
                            <label for="email" class="form-label">Yeni logo</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="kaizen_footer">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Təsdiqlə</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Kaizen Favicon</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column mb-4">
                        <p>Cari Kaizen Favicon:</p>
                        <img src="{{asset($settings->favicon)}}" alt="" style="width: 32px;height: 32px">
                    </div>
                    <form class="form-horizontal" action="{{route('faviconPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="email" class="form-label">Yeni logo</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="favicon">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Təsdiqlə</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection
