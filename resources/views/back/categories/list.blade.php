@extends('back.layouts.master')
@section('title','Kaizen.az | Kateqoriyalar')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Kateqoriyalar</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kateqoriyalar</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!--Row-->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Kateqoriyalar</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 d-flex justify-content-end mb-4">
                        <button class="btn btn-outline-success" onclick="addCategory()">Kateqoriya əlavə et</button>
                    </div>
                    @include('back.layouts.message')
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">№</th>
                                <th class="border-bottom-0">Başlıq</th>
                                <th class="border-bottom-0">Məqalə sayı</th>
                                <th class="border-bottom-0">Tarix</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{count($category->getPosts())}}</td>
                                    <td>{{ \Carbon\Carbon::parse($category->created_at)->format('j F, Y') }}</td>
                                    <td>
                                        <div class="main-toggle-group">
                                            <div class="toggle @if($category->status == '1') on @else off @endif" onclick="ChangeStatus({{$category->id}})">
                                                <span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-radius btn-warning-light" data-bs-effect="effect-newspaper" onclick="editCategory({{$category->id}})"><i class="fa fa-pencil"></i></button>
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
    <div class="modal fade"  id="editCategory">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <form action="{{route('categoryEditPost')}}" method="POST" class="modal-content modal-content-demo">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Kateqoriya redaktə</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row row-xs form-group-wrapper">
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" name="title" id="title" placeholder="Başlıq" type="text">
                                <label for="title" class="form-label mb-1">Başlıq</label>
                            </div><!-- main-form-group -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Redaktə et</button>
                    <button class="btn btn-light" data-bs-dismiss="modal" >Bağla</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EFFECTS -->
    <div class="modal fade"  id="addCategory">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <form action="{{route('categoryAddPost')}}" method="POST" class="modal-content modal-content-demo">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Kateqoriya əlavə</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row row-xs form-group-wrapper">
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" name="title" id="add_title" placeholder="Başlıq" type="text">
                                <label for="add_title" class="form-label mb-1">Başlıq</label>
                            </div><!-- main-form-group -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Əlavə et</button>
                    <button class="btn btn-light" data-bs-dismiss="modal" >Bağla</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script>
        const addCategory = () => {
          $('#addCategory').modal('show');
        }
        const editCategory = (id) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/admin/categories/edit",
                data: {
                    _token: CSRF_TOKEN,
                    id,
                },
                success: function (data) {
                    if(data !== '0'){
                        document.getElementById('id').value=data.id;
                        document.getElementById('title').value=data.title;
                        $('#editCategory').modal('show')
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
                url: "/admin/categories/status",
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
        const deleteUser = (id) => {
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
                            url: "/admin/users/delete",
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
