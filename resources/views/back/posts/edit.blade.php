@extends('back.layouts.master')
@section('title','Kaizen.az | Məqalə redaktə')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Məqalə redaktə</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Məqalə redaktə</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Məqalə redaktə</h3>
                </div>
                <form class="card-body" action="{{route('postEditPost', ['post' => $post->id])}}" id="editPost" method="POST" enctype="multipart/form-data">
                    @include('back.layouts.message')
                    @csrf
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <div class="row row-xs form-group-wrapper">
                        <div class="col-md-12 mb-3 text-center">
                            <p>Cari şəkil:</p>
                            <img src="{{ config('filesystems.disks.post-images.url') . "/$post->image" }}" alt="" style="width: 200px;height: 200px">
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" id="fullname" placeholder="Ad və Soyad" type="text" value="{{ isset($post->getUser()->fullname) ? $post->getUser()->fullname : '' }}" disabled>
                                <label for="fullname" class="form-label mb-1">Ad və Soyad <span class="text-danger">*</span></label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label">Kateqoriya <span class="text-danger">*</span></label>
                                <select class="form-control select2 form-select" name="category" data-placeholder="Kateqoriya seçin">
                                    <option label="Choose one"></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label">Emoji <span class="text-danger">*</span></label>
                                <select class="form-control select2 form-select" name="emoji" data-placeholder="Emoji seçin">
                                    <option label="Choose one"></option>
                                    @foreach($emojis as $emoji)
                                    <option value="{{$emoji->id}}" @if($post->emoji_id == $emoji->id) selected @endif>{{$emoji->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" id="title" name="title" placeholder="Başlıq daxil edin" type="text" value="{{$post->title}}">
                                <label for="title" class="form-label mb-1">Başlıq <span class="text-danger">*</span></label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control border-0" placeholder="Qisa izah">{!! $post->description !!}</textarea>
                                <label for="description" class="form-label mb-1">Qisa izah <span class="text-danger">*</span></label>
                            </div><!-- main-form-group -->
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea name="contentt" id="content" cols="30" rows="10" class="form-control border-0 editor" placeholder="Məzmun">{!! $post->content !!}</textarea>
                                <label for="content" class="form-label mb-1">Məzmun <span class="text-danger">*</span></label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12">
                            <label for="" class="dropdown__switch2-label">Heşteq seçin <span class="text-danger">*</span></label>
                            <input type="checkbox" class="dropdown__switch2" id="filter-switch2" hidden />
                            <label for="filter-switch2" class="dropdown__options-filter2">
                                <ul class="dropdown__filter2" role="listbox" tabindex="-2">
                                    <li>
                                        <select class="form-control" multiple="multiple" id="tagSelect" name="tags[]">
                                            
                                            @foreach($tags as $tag)
                                                <option @if($post->tags->contains($tag->id)) selected @endif class="dropdown__select-option2" role="option" value="{{ $tag->slug }}">{{ $tag->label }}</option>
                                            @endforeach
                                                        
                                        </select>
                                    </li>
                                </ul>
                            </label>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="formFileSm" class="form-label">Şəkil seçin</label>
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

        .dropdown__options-filter2 {
            width: 100%;
        }

        .dropdown__filter2 li span {
            width: 100%!important;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/w1k6apmnhxlhji89nk13e7lf99otylsedl4u2ikej2tqxycg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <script>
        var input = document.querySelector('input[name=tags]',{
            maxTags: 5,
        });
        new Tagify(input)
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea.editor',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [
                { title: 'My page 1', value: 'https://www.tiny.cloud' },
                { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_list: [
                { title: 'My page 1', value: 'https://www.tiny.cloud' },
                { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_class_list: [
                { title: 'None', value: '' },
                { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                }
            },
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

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
            $('#tagSelect').select2({
                tags: true,
                insertTag: function (data, tag) {
                    data.push(tag);
                }
            });
            
            $('#tagSelect').on('select2:open', function () {
                $('#selected-hashtags-placeholder').hide();
            });
            
            $('#tagSelect').on('change', function() {
                const selectedOptions = $(this).val();
                const selectedText = selectedOptions && selectedOptions.length ? selectedOptions.join(', ') : 'Haştaglar seçin';
                $('#selected-hashtags-placeholder').text(selectedText).show();
            });
        });
    </script>

@endsection
