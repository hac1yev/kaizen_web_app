@php
$settingKeywords = json_decode($seo->meta_keywords, true);
$keywords = implode(', ', array_column($settingKeywords, 'value'));
@endphp
<meta charset="UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="website" content="https://kaizen.az/" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="{{$keywords}}" />
<meta name="description" content="{{$seo->meta_description}}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
@hasSection('og_post_title')
<meta property="og:title" content="{{ $seo->meta_title }} - @yield('og_post_title')" />
@else
<meta property="og:title" content="{{ $seo->meta_title }}" />
@endif
@hasSection('og_post_description')
<meta property="og:description" content="@yield('og_post_description')" />
@else
<meta property="og:description" content="{{ $seo->meta_description }}" />
@endif
@hasSection('og_type_article')
<meta property="og:type" content="article" />
@else
<meta property="og:type" content="website" />
@endif
@hasSection ('og_article_url')
<meta property="og:url" content="@yield('og_article_url')" />    
@else
<meta property="og:url" content="{{ env("APP_URL") }}" />    
@endif
@hasSection ('og_article_image')
<meta property="og:image" content="@yield('og_article_image')" />
@else
<meta property="og:image" content="{{ asset($setting->favicon) }}" />
@endif
<meta property="og:site_name" content="{{ env("APP_NAME") }}" />
<meta property="og:locale" content="{{ app()->getLocale()."_".strtoupper(app()->getLocale()) }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@kaizenaz_" />
@hasSection ('twitter_article_title')
<meta name="twitter:title" content="{{ $seo->meta_title }} - @yield('twitter_article_title')" />
@else
<meta name="twitter:title" content="{{ $seo->meta_title }}" />
@endif
@hasSection('twitter_article_description')
<meta property="twitter:description" content="@yield('twitter_article_description')" />
@else
<meta property="twitter:description" content="{{ $seo->meta_description }}" />
@endif
@hasSection('twitter_article_image')
<meta name="twitter:image" content="@yield('twitter_article_image')" />
@else
<meta name="twitter:image" content="{{ asset($setting->favicon) }}" />
@endif
@hasSection('author')
@php
$author = app()->view->getSections()['author']
@endphp
<meta property="article:author" content="{{ $author }}">
<meta property="author" content="{{ $author }}">
<meta property="author" content="{{ $author }}">
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Person",
"name": "{{ $author }}"
}
</script>
@endif

<title>{{$seo->meta_title}}</title>

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