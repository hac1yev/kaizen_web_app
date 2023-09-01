@extends('back.layouts.master')
@section('title','Kaizen.az | İsmarıc')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">İsmarıc</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">İsmarıc</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!--Row-->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">İsmarıc</h3>
                </div>
                <div class="card-body">
                    @include('back.layouts.message')
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">№</th>
                                <th class="border-bottom-0">Ad</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Cavablama</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Tarix</th>
                                <th class="border-bottom-0">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $key=>$message)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>@if($message->isanswer == '0') <button type="button" class="btn btn-warning" onclick="getReply({{$message->id}})"><i class="fe fe-message-circle me-2"></i>Cavabla</button> @else <span class="badge bg-primary my-1">Cavablanıb</span> @endif</td>
                                    <td>
                                     @if($message->status == '0') <span class="badge bg-danger my-1">Oxunmayıb</span> @else <span class="badge bg-success my-1">Oxunub</span> @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($message->created_at)->format('j F, Y') }}</td>
                                    <td>
                                        <button class="btn btn-radius btn-info-light" data-bs-effect="effect-newspaper" onclick="getMessage({{$message->id}})"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-radius btn-danger-light " id="delete" onclick="deleteContact({{$message->id}})"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->


    <!-- MODAL EFFECTS -->
    <div class="modal fade"  id="getMessage">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">İsmarıc</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row row-xs form-group-wrapper">
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" id="name" placeholder="Ad" type="text" disabled>
                                <label for="name" class="form-label mb-1">Ad</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" id="email" placeholder="Email" type="text" disabled>
                                <label for="email" class="form-label mb-1">Email</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea id="message" cols="30" rows="10" class="form-control border-0" placeholder="İsmarıc" disabled></textarea>
                                <label for="message" class="form-label mb-1">İsmarıc</label>
                            </div><!-- main-form-group -->
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" >Bağla</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade"  id="reply">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <form action="{{route('contactReply')}}" method="POST" class="modal-content modal-content-demo">
                @csrf
                <input type="hidden" id="reply_id" name="id">
                <div class="modal-header">
                    <h6 class="modal-title">Cavabınız</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row row-xs form-group-wrapper">
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" id="reply_name" placeholder="Ad" type="text" disabled>
                                <label for="name" class="form-label mb-1">Ad</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" id="reply_email" placeholder="Email" type="text" disabled>
                                <label for="email" class="form-label mb-1">Email</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea id="reply_message" cols="30" rows="10" class="form-control border-0" placeholder="İsmarıc" disabled></textarea>
                                <label for="message" class="form-label mb-1">İsmarıc</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea id="message" name="message" cols="30" rows="10" class="form-control border-0" placeholder="Cavab"></textarea>
                                <label for="message" class="form-label mb-1">Cavab</label>
                            </div><!-- main-form-group -->
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" >Bağla</button>
                    <button class="btn btn-success" type="submit" >Cavabla</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script>
        const getMessage = (id) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/admin/contact/get/message",
                data: {
                    _token: CSRF_TOKEN,
                    id,
                },
                success: function (data) {
                    if(data !== '0'){
                        document.getElementById('name').value=data.name;
                        document.getElementById('email').value=data.email;
                        document.getElementById('message').innerText=data.message;
                        $('#getMessage').modal('show')
                    }else{
                        swal("Xəta", "Yükləmə zamanı problem yaşandı", "error");
                    }
                },
                error: function () {
                    swal("Xəta", "Gözlənilməyən xəta baş verdi!", "error");
                }
            })

        }

        const getReply = (id) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/admin/contact/get/message",
                data: {
                    _token: CSRF_TOKEN,
                    id,
                },
                success: function (data) {
                    if(data !== '0'){
                        document.getElementById('reply_id').value=data.id;
                        document.getElementById('reply_name').value=data.name;
                        document.getElementById('reply_email').value=data.email;
                        document.getElementById('reply_message').innerText=data.message;
                        $('#reply').modal('show')
                    }else{
                        swal("Xəta", "Yükləmə zamanı problem yaşandı", "error");
                    }
                },
                error: function () {
                    swal("Xəta", "Gözlənilməyən xəta baş verdi!", "error");
                }
            })
        }
        const deleteContact = (id) => {
            swal({
                    title: "Əminsiniz?",
                    text: "Silinən məlumat geri qayıtmır!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Bəli",
                    cancelButtonText: "Xeyr",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            type: "POST",
                            url: "/admin/contact/delete",
                            data: {
                                _token: CSRF_TOKEN,
                                id,
                            },
                            success: function (data) {
                                if(data !== '0'){
                                    swal("Uğurlu", "Məlumat uğurla silindi", "success");
                                    setTimeout(()=>{
                                        location.reload();
                                    },1500)
                                }else{
                                    swal("Xəta", "Yükləmə zamanı problem yaşandı", "error");
                                }
                            },
                            error: function () {
                                swal("Xəta", "Gözlənilməyən xəta baş verdi!", "error");
                            }
                        })
                    } else {
                        swal("Ləğv edildi", "Silinmədən imtina edildi", "error");
                    }
                });
        }
    </script>
    <!-- INPUT MASK JS-->
    <script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <!--Internal  jquery.maskedinput js -->
    <script src="{{asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>

    <!--Color Picker js-->
    <script src="{{asset('assets/plugins/colorpicker/pickr.es5.min.js')}}"></script>

    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/table-data.js')}}"></script>
    <!-- Sweet-alert js  -->
    <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
@endsection
