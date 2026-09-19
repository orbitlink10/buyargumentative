@extends('layouts.public')

@section('title', $page['title'])
@section('meta_description', $page['meta_description'])
@section('canonical', url($page['slug']))
@section('robots', 'index,follow')

@php
    $schemaType = $page['schema'] ?? null;
@endphp

@section('jsonld')
@php
$baseUrl = rtrim(url('/'), '/');
$jsonLd = [];
$org = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Buy Argumentative Essay',
    'url' => $baseUrl,
];
if ($schemaType === 'Organization') {
    $jsonLd = $org;
} elseif ($schemaType === 'Service') {
    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $page['h1'],
        'serviceType' => $page['title'],
        'description' => $page['meta_description'],
        'provider' => $org,
        'url' => $baseUrl . '/' . $page['slug'],
        'areaServed' => ['@type' => 'Country', 'name' => 'Worldwide'],
    ];
} elseif ($schemaType === 'FAQPage' && !empty($page['faqs'])) {
    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(function ($faq) {
            return [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ];
        }, $page['faqs']),
    ];
}

$breadcrumb = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $baseUrl . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => $page['h1'], 'item' => $baseUrl . '/' . $page['slug']],
    ],
];

$out = $jsonLd ? [$jsonLd, $breadcrumb] : [$breadcrumb];
echo json_encode($out, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
@endsection

@section('content')
<main class="page-main">
    <div class="page-head">
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <span>{{ $page['h1'] }}</span>
        </nav>
        <h1>{{ $page['h1'] }}</h1>
        @if(!empty($page['lead']))
            <p class="lead">{{ $page['lead'] }}</p>
        @endif
    </div>
    <article class="prose">
        {!! $page['body'] !!}
    </article>
    <section class="cta-panel">
        <div>
            <h2>Ready to get started?</h2>
            <p>Share your instructions and deadline to receive a custom argumentative essay.</p>
        </div>
        <a class="btn" href="{{ route('order', ['tab' => 'new']) }}">Order Now</a>
    </section>
</main>
@endsection
