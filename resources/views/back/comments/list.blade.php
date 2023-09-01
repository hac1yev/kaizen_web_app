@extends('back.layouts.master')
@section('title','Kaizen.az | Şərhlər')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Şərhlər</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Şərhlər</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!--Row-->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Şərhlər</h3>
                </div>
                <div class="card-body">
                    @include('back.layouts.message')
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">№</th>
                                <th class="border-bottom-0">İstifadəçi</th>
                                <th class="border-bottom-0">Məqalə</th>
                                <th class="border-bottom-0">Like</th>
                                <th class="border-bottom-0">Dislike</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Tarix</th>
                                <th class="border-bottom-0">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $key=>$comment)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><a href="{{route('userEdit',$comment->getUser ? $comment->getUser->id : '')}}" target="_blank">{{$comment->getUser ? $comment->getUser->fullname : ''}}</a></td>
                                    <td><a href="@if(isset($comment->getPost()->title)) {{route('postEdit',$comment->getPost()->id)}} @else javascript:void(0) @endif" target="_blank">@if(isset($comment->getPost()->title)) {{$comment->getPost()->title}} @else Post Yoxdur @endif</a></td>
                                    <td>{{$comment->likes}}</td>
                                    <td>{{$comment->dislikes}}</td>
                                    <td>
                                        <div class="main-toggle-group">
                                            <div class="toggle @if($comment->status == '1') on @else off @endif" onclick="ChangeStatus({{$comment->id}})">
                                                <span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($comment->created_at)->format('j F, Y') }}</td>
                                    <td>
                                        <button class="btn btn-radius btn-warning-light" data-bs-effect="effect-newspaper" onclick="editComment({{$comment->id}})"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-radius btn-danger-light " id="delete" onclick="deleteComment({{$comment->id}})"><i class="fa fa-trash-o"></i></button>
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
    <div class="modal fade"  id="editComment">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <form action="{{route('commentEditPost')}}" method="POST" class="modal-content modal-content-demo">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Şərh redaktə</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row row-xs form-group-wrapper">
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" name="user" id="user" placeholder="İstifadəçi" type="text" disabled>
                                <label for="user" class="form-label mb-1">İstifadəçi</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" name="post" id="post" placeholder="Məqalə" type="text" disabled>
                                <label for="post" class="form-label mb-1">Məqalə</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control border-0" placeholder="Şərh"></textarea>
                                <label for="comment" class="form-label mb-1">Şərh <span class="text-danger">*</span></label>
                            </div><!-- main-form-group -->
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Redaktə et</button>
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal" >Bağla</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script>
        const editComment = (id) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/admin/comment/edit",
                data: {
                    _token: CSRF_TOKEN,
                    id,
                },
                success: function (data) {
                    if(data !== '0'){
                        document.getElementById('id').value=data[0].id;
                        document.getElementById('comment').value=data[0].comment;
                        document.getElementById('user').value=data[1];
                        document.getElementById('post').value=data[2];
                        $('#editComment').modal('show')
                    }else{
                        swal("Xəta", "Yükləmə zamanı problem yaşandı", "error");
                    }
                },
                error: function () {
                    swal("Xəta", "Gözlənilməyən xəta baş verdi!", "error");
                }
            })

        }
        const ChangeStatus = (id) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/admin/comment/status",
                data: {
                    _token: CSRF_TOKEN,
                    id,
                },
                success: function (data) {
                    if(data !== '0'){
                        swal("Uğurlu", "Status uğurla dəyişdirildi", "success");
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
        }
        const deleteComment = (id) => {
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
                            url: "/admin/comment/delete",
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
