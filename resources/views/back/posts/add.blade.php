@extends('back.layouts.master')
@section('title','Kaizen.az | Məqalə əlavə')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Məqalə əlavə</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Məqalə əlavə</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card-header border-bottom">
                <h3 class="card-title">Məqalə əlavə</h3>
            </div>
            <form class="card-body" action="{{route('postAddPost')}}" id="editPost" method="POST" enctype="multipart/form-data">
                @include('back.layouts.message')
                @csrf
                <div class="row row-xs form-group-wrapper">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label class="form-label">Kateqoriya <span class="text-danger">*</span></label>
                            <select class="form-control select2 form-select" name="category" data-placeholder="Kateqoriya seçin">
                                <option label="Choose one"></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="main-form-group">
                            <input class="form-control border-0" id="title" name="title" placeholder="Başlıq daxil edin" type="text">
                            <label for="title" class="form-label mb-1">Başlıq <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="main-form-group">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control border-0" placeholder="Qisa izah"></textarea>
                            <label for="description" class="form-label mb-1">Qisa izah <span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="main-form-group">
                            <textarea name="contentt" id="content" cols="30" rows="10" class="form-control border-0 editor" placeholder="Məzmun"></textarea>
                            <label for="content" class="form-label mb-1">Məzmun <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="tags" class="form-label">Açar sözlər <span class="text-danger">*</span></label>
                            <div class="chips">
                                <input name="tags[]" class="form-control" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="formFileSm" class="form-label">Şəkil seçin <span class="text-danger">*</span></label>
                            <input class="form-control file-input form-control-sm" name="image" id="formFileSm" type="file">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Əlavə et</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /row -->
@endsection

@section('css')
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <style>

        textarea#mentions {
            height: 350px;
        }

        div.card,
        .tox div.card {
            width: 240px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-shadow: 0 4px 8px 0 rgba(34, 47, 62, .1);
            padding: 8px;
            font-size: 14px;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
        }

        div.card::after,
        .tox div.card::after {
            content: "";
            clear: both;
            display: table;
        }

        div.card h1,
        .tox div.card h1 {
            font-size: 14px;
            font-weight: bold;
            margin: 0 0 8px;
            padding: 0;
            line-height: normal;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
        }

        div.card p,
        .tox div.card p {
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
        }

        div.card img.avatar,
        .tox div.card img.avatar {
            width: 48px;
            height: 48px;
            margin-right: 8px;
            float: left;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/w1k6apmnhxlhji89nk13e7lf99otylsedl4u2ikej2tqxycg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <script>
        var input = document.querySelector('input[name="tags[]"]',{
            maxTags: 10,
        });
        new Tagify(input)
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;


    </script>

    <script>
        $("#editPost").on("keypress", function (event) {
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13) {
                event.preventDefault();
                return false;
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var errorMessages = {
                required: 'Bu sahə mütləq doldurulmalıdır!',

            };
        
            $("#editPost").validate({
                rules: {
                    image: {
                        required: true,

                    },
                    title: {
                        required: true,

                    },
                    description: {
                        required: true,

                    },
                    contentt: {
                        required: true,

                    },
                    category: {
                        required: true,

                    },
                    'tags[]': {
                        required: true
                    }

                },
                messages: {
                    image: {
                        required: errorMessages.required,

                    },
                    title: {
                        required: errorMessages.required,

                    },
                    description: {
                        required: errorMessages.required,
                    },
                    contentt: {
                        required: errorMessages.required,
                    },
                    category: {
                        required: errorMessages.required,
                    },
                    'tags[]': {
                        required: errorMessages.required,
                    },
                },
                submitHandler: function(form) {
                    form.submit(); 
                }
            });
        });
    </script>

@endsection
