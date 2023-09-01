@if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-frown-o me-2" aria-hidden="true"></i>
        Gözlənilməyən xəta baş verdi!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i>
        Əməliyyat uğurla tamamlandı!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
@if(session('non_user'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-frown-o me-2" aria-hidden="true"></i>
        İstifadəçi sistemdə mövcud deyildir!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
@if(session('password'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-frown-o me-2" aria-hidden="true"></i>
        Email və ya şifrə yanlışdır!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
