@extends('back.layouts.master')
@section('title','Kaizen.az | Məqalələr')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Məqalələr</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Məqalələr</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!--Row-->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Məqalələr</h3>
                </div>
                <div class="card-body">
                    @include('back.layouts.message')
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">№</th>
                                <th class="border-bottom-0">İstifadəçi adı</th>
                                <th class="border-bottom-0">Kateqoriya</th>
                                <th class="border-bottom-0">Başlıq</th>
                                <th class="border-bottom-0">Baxış sayı</th>
                                <th class="border-bottom-0">Tarix</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $key=>$post)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if($post && $post->getUser())
                                                <a href="{{ route('userEdit', $post->getUser()->id) }}" target="_blank">{{ $post->getUser()->fullname }}</a>
                                            @else
                                                <a href="#"></a>
                                            @endif
                                        </td>

                                        <td>{{$post->getCategory->title}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->view}}</td>
                                        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }}</td>
                                        <td>
                                            <div class="main-toggle-group">
                                                <div class="toggle @if($post->status == '1') on @else off @endif" onclick="ChangeStatus({{$post->id}})">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('postEdit',$post->id)}}" class="btn btn-radius btn-warning-light " target="_blank"><i class="fa fa-pencil"></i></a>
                                            <button class="btn btn-radius btn-danger-light " id="delete" onclick="deleteUser({{$post->id}})"><i class="fa fa-trash-o"></i></button>
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

@endsection

@section('js')
    <script>
        const ChangeStatus = (id) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/admin/posts/list",
                data: {
                    _token: CSRF_TOKEN,
                    id,
                },
                success: function (data) {
                    if(data !== '0'){
                        swal("Uğurlu", "Status uğurla dəyişdirildi!", "success");
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
                            url: "/admin/posts/list/delete",
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
