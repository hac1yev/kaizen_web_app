@extends('back.layouts.master')
@section('title','Kaizen.az | Əsas səhifə')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Əsas səhifə</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Əsas səhifə</a></li>
            </ol>
            @include('back.layouts.message')
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 -->
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{count($posts)}}</h3>
                            <p class="text-muted fs-13 mb-0">Məqalə sayı</p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                <i class="fa fa-file-text-o text-light"></i>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{count($users)}}</h3>
                            <p class="text-muted fs-13 mb-0">İstifadəçi sayı</p>

                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                                <i class="fa fa-users text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{count($comments)}}</h3>
                            <p class="text-muted fs-13 mb-0">Rəy sayı</p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-info dash ms-auto box-shadow-info">
                                <i class="fa fa-comments-o text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{count($messages)}}</h3>
                            <p class="text-muted fs-13 mb-0">İsmarıc sayı</p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                <i class="fa fa-commenting-o text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 END-->

    <!-- ROW-2 -->
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card product-sales-main">
                <div class="card-header border-bottom">
                    <h3 class="card-title mb-0">Son yazılan məqalələr</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table text-nowrap mb-0 table-bordered">
                            <thead class="table-head">
                            <tr>
                                <th class="bg-transparent border-bottom-0">İstifadəçi</th>
                                <th class="bg-transparent border-bottom-0">Kateqoriya</th>
                                <th class="bg-transparent border-bottom-0">Başlıq</th>
                                <th class="bg-transparent border-bottom-0">Baxış sayı</th>
                                <th class="bg-transparent border-bottom-0 no-btn">Tarix</th>
                                <th class="bg-transparent border-bottom-0 no-btn">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody class="table-body">
                            @foreach($home_posts as $key=>$post)
                            <tr>                                                                                               
                                <td>{!! isset($post->getUser()->id) ? '<a href="'.route('userEdit', $post->getUser()->id).'" target="_blank">'.$post->getUser()->fullname.'</a>' : '' !!}</td>
                                <td>{{$post->getCategory->title}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->view}}</td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }}</td>
                                <td>
                                    <a href="{{route('postEdit',$post->id)}}" class="btn btn-radius btn-warning-light "><i class="fa fa-pencil"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- ROW-2 END -->

@endsection
