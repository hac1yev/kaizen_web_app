@extends('back.layouts.master')
@section('title','Kaizen.az | Seo')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">SEO</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">SEO</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">SEO</h3>
                </div>
                <form class="card-body" id="seo" action="{{route('seoPost')}}" method="POST">
                    @include('back.layouts.message')
                    @csrf
                    <div class="row row-xs form-group-wrapper">
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" name="meta_title" id="meta_title" placeholder="Meta Title" type="text" value="{{$seo->meta_title}}">
                                <label for="meta_title" class="form-label mb-1">Meta Title</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control border-0" placeholder="Meta Description">{{$seo->meta_description}}</textarea>
                                <label for="meta_description" class="form-label mb-1">Meta Description</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="tags" class="form-label">Açar sözlər <span class="text-danger">*</span></label>
                                <div class="chips">
                                    <input name='tags' class="form-control" autofocus value="{{$seo->meta_keywords}}">
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


@section('css')
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>

    <script>
        var input = document.querySelector('input[name=tags]',{
            maxTags: 5,
        });
        new Tagify(input)
        $("#seo").on("keypress", function (event) {
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13) {
                event.preventDefault();
                return false;
            }
        });
    </script>

@endsection
