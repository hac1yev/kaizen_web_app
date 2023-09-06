@extends('front.Layouts.master')

@section('content')
    <section class="mt-2 post-share">
        @if($user->verified == 1)
            <div class="container">
                <form method="POST" action="{{ route('postadd') }}" enctype="multipart/form-data" id="postadd">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h3>MƏQALƏ PAYLAŞIN</h3>
                        </div>
                        <div class="col-12 mt-2 row">
                            <div class="col-md-6">
                                <input type="file" name="image" id="actual-btn" hidden onchange="updateFileName(this)"/>
                                <label for="actual-btn" class="file-label">Kiçik başlıq şəkli</label>
                            </div>
                            <div class="col-md-6">
                                <span id="file-chosen">Şəkil seçilməyib*</span>
                            </div>
                        </div>
    
                        <div class="col-12 mt-2 row">
                            <div class="col-md-12">
                                <input name="title" id="content"  placeholder="Başlıq *" class="mezmun">
                            </div>
                        </div>
                        <div class="col-12 mt-2 row">
                            <div class="col-md-12">
                            </div>
                            <div class="col-md-12">
                                <input name="description" id="content" placeholder="Özət *" class="mezmun">
                            </div>
                        </div>
                        <div class="col-12 mt-2 row">
                            <div class="col-md-12">
                                <label for="actual-btn" class="text-area">Məzmun <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-12">
                                <textarea name="content" id="content" class="text-editor"></textarea>
                            </div>
                        </div>

                        <div class="col-12 mt-2 row">
                            <div class="col-md-4">
                                <label for="" class="dropdown__kategory-label">Kateqoriya seçin <span class="text-danger">*</span></label>
                                <input type="checkbox" class="dropdown__switch" id="filter-switch" hidden />
                                <label for="filter-switch" class="dropdown__options-filter">
                                    <ul class="dropdown__filter select__kategory" role="listbox" tabindex="-1">
                                        <li class="dropdown__filter-selected" aria-selected="true" id="selected-category">
                                        </li>
                                        <select class="form-control custom-select2" name="category">
                                            <option value="" disabled>Kateqoriyalar</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                @endforeach
                                        </select>
                                    </ul>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="dropdown__switch2-label">Heşteq seçin <span class="text-danger">*</span></label>
                                <input type="checkbox" class="dropdown__switch2" id="filter-switch2" hidden />
                                <label for="filter-switch2" class="dropdown__options-filter2">
                                    <ul class="dropdown__filter2" role="listbox" tabindex="-2">
                                        <li>
                                            <select class="form-control" multiple="multiple" id="tagSelect" name="tags[]">
                                                @php
                                                    $uniqueTags = []; 
                                                @endphp
                                                @foreach ($tags as $tag)
                                                    @if ($tag->tags)
                                                        @php
                                                            $tagsArray = explode(',', $tag->tags);
                                                        @endphp
                                                        @foreach ($tagsArray as $singleTag)
                                                            @if (!in_array($singleTag, $uniqueTags))
                                                                @php
                                                                    $uniqueTags[] = $singleTag; 
                                                                @endphp
                                                                <option class="dropdown__select-option2" role="option">{{ $singleTag }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
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
        @else
            <div class="container">
                <div style="text-align: center;color:#0b0403;padding: 100px 0">
                    <h3>Məqalə paylaşmaq üçün hesabınızı
                        <form action="{{route('activation')}}" method="POST">
                            @csrf
                            <button style="color:#f60404;padding: 0px; margin-top:50px; background-color:transparent; border:none; text-decoration:underline;">Aktivləşdirin</button>

                        </form>
                    </h3>
                </div>
            </div>
        @endif
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
