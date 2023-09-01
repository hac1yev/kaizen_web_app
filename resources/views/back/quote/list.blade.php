@extends('back.layouts.master')
@section('title','Kaizen.az | Quote')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Quote</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Əsas səhifə</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quote</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!--Row-->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Quote</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 d-flex justify-content-end mb-4">
                        <button class="btn btn-outline-success" onclick="addQuote()">Quote əlavə et</button>
                    </div>
                    @include('back.layouts.message')
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">№</th>
                                <th class="border-bottom-0">Yazar</th>
                                <th class="border-bottom-0">Məzmun</th>
                                <th class="border-bottom-0">Tarix</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quotes as $key=>$quote)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{!! $quote->author !!}</td>
                                    <td>{!! $quote->content !!}</td>
                                    <td>{{ \Carbon\Carbon::parse($quote->created_at)->format('j F, Y') }}</td>
                                    <td>
                                        <div class="main-toggle-group">
                                            <div class="toggle @if($quote->status == '1') on @else off @endif" onclick="ChangeStatus({{$quote->id}})">
                                                <span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-radius btn-danger-light " id="delete" onclick="deleteQuote({{$quote->id}})"><i class="fa fa-trash-o"></i></button>
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
    <div class="modal fade"  id="addQuote">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <form action="{{route('quoteListAdd')}}" method="POST" class="modal-content modal-content-demo">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Quote əlavə</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row row-xs form-group-wrapper">
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <input class="form-control border-0" name="author" id="author" placeholder="Yazar" type="text">
                                <label for="author" class="form-label mb-1">Yazar</label>
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="main-form-group">
                                <textarea class="form-control border-0" name="words" id="words" placeholder="Məzmun" type="text"> </textarea>
                                <label for="words" class="form-label mb-1">Məzmun</label>
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
        const addQuote = () => {
            $('#addQuote').modal('show');
        }
        const ChangeStatus = (id) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/admin/quote/status",
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
        const deleteQuote = (id) => {
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
                            url: "/admin/quote/delete",
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
