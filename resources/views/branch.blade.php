@extends('layouts.app')

@section('title', $branch->getSeoTitle())
@section('meta_description', $branch->getSeoDescription())

@section('content')
    <h1>{{ $branch->seo_h1 ?: $branch->name }}</h1>

    <p><strong>Город:</strong> {{ $branch->city }}</p>
    <p><strong>Адрес:</strong> {{ $branch->address }}</p>
    <p><strong>Телефон:</strong> <a href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a></p>
    @if($branch->email)
        <p><strong>E-mail:</strong> {{ $branch->email }}</p>
    @endif

    @if($branch->working_hours)
        <p><strong>Часы работы:</strong></p>
        <ul>
            @foreach($branch->working_hours as $day => $hours)
                <li>{{ $day }}: {{ $hours }}</li>
            @endforeach
        </ul>
    @endif

    @if($branch->intro_text)
        <p>{{ $branch->intro_text }}</p>
    @endif

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "MedicalBusiness",
        "name": "{{ $branch->name }}",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "{{ $branch->city }}",
            "streetAddress": "{{ $branch->address }}"
        },
        "telephone": "{{ $branch->phone }}"
        @if($legalEntity),
        "legalName": "{{ $legalEntity->name }}"
        @endif
    }
    </script>
@endsection
