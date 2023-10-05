@extends('front.Layouts.master')

@section('content')
    
    <div class="container-xl px-4 mt-4">
        <div class="row">
            
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{route('updateprofile')}}" enctype="multipart/form-data" id="edit">
                            @csrf
                            <div class="col-12">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-body text-center d-flex flex-column align-items-cener">
                                        <img class="img-account-profile rounded-circle mb-2" src="{{asset($users->image)}}" alt="">
                                        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="toggle-img" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Şəkil dəyiş
                                                </button>
                                                <div class="dropdown-menu" style="padding: 0 !important;" aria-labelledby="toggle-img">
                                                    <a class="dropdown-item" href="#" onclick="openAvatarModal()">Avatarı dəyiş</a>
                                                    <a class="dropdown-item" href="#" onclick="chooseOption('change-img-new')">Öz şəklini seç</a>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="change-img" tabindex="-1" role="dialog" aria-labelledby="change-imgLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="change-imgLabel">Avatarı dəyiş</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <select style="width: 100%; padding: 10px" name="change-image" id="change-image">
                                                                    <option value="" disabled>Avatarı seç</option>
                                                                </select>
                                                                <div id="selected-img"></div>
                                                                <button class="btn btn-primary deyis" id="submit-change-img" onclick="saveSelectedAvatar()">Dəyiş</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="selected-avatar-url" id="selected-avatar-url" value="">

                                            <input type="file" id="fileInput" class="custom-file-input" style="display: none;">
                                            
                                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">İstifadəçi adı</label>
                                <input class="form-control enable-input" id="inputUsername" name="fullname" type="text" placeholder="Yeni istifadəçi adını daxil et" value="{{$users->fullname}}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-12">
                                    <label class="small mb-1" for="inputFirstName">Yazıçı</label>
                                    <input class="form-control enable-input" id="inputFirstName" type="text" name="username" placeholder="Yazıçı adını daxil et" value="{{$users->username}}">
                                </div>
                              
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-12 text-area-group">
                                    <label class="small mb-1" for="aboutMe">Haqqımda</label>
                                    <textarea name="about" id="aboutMe" rows="5">{{$users->about}}</textarea>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-12">
                                    <label class="small mb-1" for="gmail">E poçt</label>
                                    <input class="form-control" id="gmail" name="email" type="email" value="{{$users->email}}" readonly>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="meqale">Məqalə sayı</label>
                                    <input class="form-control" id="meqale" type="text" value="{{$postscount}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="date">Tarix</label>
                                    <input class="form-control" id="date" type="text" value="{{$users->created_at}}" readonly>
                                </div>
                            </div>
                            <button class="btn btn-primary">Yadda saxla</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('js')
    <script src="{{asset('back/assets/js/app.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function saveSelectedAvatar() {
            let selectedValue = document.getElementById('change-image').value;

            if (selectedValue) {
                document.getElementById('selected-avatar-url').value = selectedValue;
                document.getElementById('profile-form').submit();
            }
        }

    </script>


    <script>
        function chooseOption(option) {
            if (option === 'change-img-new') {
                document.getElementById("fileInput").click();
            }
        }

        function openAvatarModal() {
            $('#change-img').modal('show');
            fetchAvatarOptions();
        }

        function fetchAvatarOptions() {
            let selectElement = document.getElementById('change-image');
            for (let i = 1; i <= 50; i++) {
                let random = Math.floor(Math.random() * 1000);
                let avatarUrl = 'https://api.dicebear.com/7.x/bottts/svg?seed=' + random;
                let option = new Option('Avatar ' + i, avatarUrl);
                selectElement.appendChild(option);
            }
        }

        document.getElementById('change-image').addEventListener('change', function() {
            let selectedValue = this.value;
            let selectedImgDiv = document.getElementById('selected-img');

            if (selectedValue) {
                selectedImgDiv.innerHTML = '<img src="' + selectedValue + '" />';
            } else {
                selectedImgDiv.innerHTML = '';
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var errorMessages = {
                required: 'Bu sahə mütləq doldurulmalıdır!',
            };
        
            $("#edit").validate({
                rules: {
                    fullname: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                    about: {
                        required: true,
                    }
                },
                messages: {
                    username: {
                        required: errorMessages.required,
                    },
                    fullname: {
                        required: errorMessages.required,
                    },
                    about: {
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
    