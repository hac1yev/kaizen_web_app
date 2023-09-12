<meta charset="UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{$seo->meta_title}}</title>
<meta name="website" content="https://kaizen.az/" />

@php
    $settingKeywords = json_decode($seo->meta_keywords, true);
    $keywords = implode(', ', array_column($settingKeywords, 'value'));
@endphp


<meta name="keywords" content="{{$keywords}}" />
<meta name="description" content="{{$seo->meta_description}}" />
<meta property="og:type" content="Website" />
<meta property="og:url" content="https://kaizen.az/" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('back/assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('back/assets/css/travel.css') }}" />
<link rel="stylesheet" href="{{ asset('back/assets/css/profile.css') }}" />
<link rel="stylesheet" href="{{ asset('back/assets/css/settings.css') }}" />
<link rel="stylesheet" href="{{ asset('back/assets/css/users.css') }}" />
<link rel="stylesheet" href="{{ asset('back/assets/css/share.css') }}" />
<link rel="stylesheet" href="{{ asset('back/assets/css/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('back/assets/css/edit-profile.css')}}" />
<link rel="icon" href="{{ asset($setting->favicon) }}" type="image/x-icon" />

<link rel="stylesheet" href="{{ asset('back/assets/css/owl.theme.default.min.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />