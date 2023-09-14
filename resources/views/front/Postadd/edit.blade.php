@extends('front.Layouts.master')

@section('content')
    <section class="mt-2 post-share">
            <div class="container">
                <form method="POST" action="{{ route('editPostpost') }}" enctype="multipart/form-data" id="postadd">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h3>MƏQALƏ PAYLAŞIN</h3>
                        </div>
                        <div class="col-12 mt-2 row">
                            <div class="col-md-12">
                                <input type="file" name="image" class="w-100" id="actual-btn" onchange="updateFileName(this)"/>
                                <label for="actual-btn" class="file-label w-100">Kiçik başlıq şəkli</label>
                            </div>
                            
                        </div>
    
                        <div class="col-12 mt-2 row">
                            <div class="col-md-12">
                                <input name="title" id="contentt"  placeholder="Başlıq *" class="mezmun" value="{{$post->title}}">
                            </div>
                        </div>
                        <div class="col-12 mt-2 row">
                            <div class="col-md-12">
                                <input name="description" id="content" placeholder="Özət *" class="mezmun" value="{{$post->description}}">
                            </div>
                        </div>
                        <div class="col-12 mt-2 row">
                            <div class="col-md-12">
                                <label for="actual-btn" class="text-area">Məzmun <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-12">
                                <textarea name="content" id="contenttt" class="text-editor">{!! $post->content !!}</textarea>
                            </div>
                        </div>

                        <div class="col-12 mt-2 row">
                            <div class="col-md-12">
                            <label for="select_aaa" class="dropdown__kategory-label" style="margin-bottom: 0;">Kateqoriya seçin <span class="text-danger">*</span></label>

                                <select class="select-aaa" name="" id="select_aaa">
                                    <option value="aaa">AAA</option>
                                    <option value="bbb">BBB</option>
                                    <option value="ccc">CCC</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 mt-2 row">
                            <div class="col-md-4">
                                <label for="select_category" class="dropdown__kategory-label" style="margin-bottom: 0;">Kateqoriya seçin <span class="text-danger">*</span></label>
                                <input type="checkbox" class="dropdown__switch" id="filter-switch" hidden />
                                <select class="select-aaa" name="category" id="select_category">
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}" @if($post->category_id == $cat->id) selected @endif>{{$cat->title}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="dropdown__switch2-label">Heşteq seçin <span class="text-danger">*</span></label>
                                <input type="checkbox" class="dropdown__switch2" id="filter-switch2" hidden />
                                <label for="filter-switch2" class="dropdown__options-filter2">
                                    <ul class="dropdown__filter2" role="listbox" tabindex="-2">
                                        <li>
                                            <select class="form-control" multiple="multiple" id="tagSelect" name="tags[]">
                                                {{-- @php
                                                    $uniqueTags = []; 
                                                @endphp --}}
                                                @foreach ($activePosts as $post)
                                                    @if($post->tags)
                                                        @foreach(array_unique(explode(",", $post->tags)) as $tag)
                                                            <option class="dropdown__select-option2" role="option">{{ $tag }}</option>
                                                        @endforeach
                                                    @endif

                                                {{-- @if ($tag->tags)
                                                        @php
                                                            $tagsArray = explode(',', $tag->tags);
                                                        @endphp
                                                        @foreach ($tagsArray as $singleTag)
                                                            @if (!in_array($singleTag, $uniqueTags))
                                                                @php
                                                                    $uniqueTags[] = $singleTag; 
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif --}}
                                                @endforeach
                                            </select>

                                            
                                        </li>
                                    </ul>
                                </label>
                            </div>
                            <div class="col-12">
                                <div class="content-button">
                                    <button type="submit">Paylaş</button>
                                </div>
                            </div>
                    </div>
                </form>
            </div>                
       
    </section>
       
@endsection

@section('js') 
    <script src="back/assets/js/app.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="back/assets/js/users.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   

    <script>
        $(document).ready(function() {
            var errorMessages = {
                required: 'Bu sahə mütləq doldurulmalıdır!',

            };
        
            $("#postadd").validate({
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
                    content: {
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
                    content: {
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




    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const selectOptions = document.querySelectorAll('.dropdown__select-option');
          const selectedCategory = document.getElementById('selected-category');
  
          selectOptions.forEach(option => {
              option.addEventListener('click', function () {
                  selectedCategory.textContent = option.textContent;
              });
          });
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

    <script>
        function updateFileName(input) {
            const fileName = input.files[0].name;
            document.getElementById('file-chosen').textContent = fileName;
        }
    </script>
 
@endsection
