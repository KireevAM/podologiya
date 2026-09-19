@extends('layouts.app')

@section('title', $networkName . ' — подологические клиники')

@section('content')
    <h1>Наши филиалы</h1>
    <p>Выберите ближайший филиал сети:</p>

    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap:20px; margin-top:20px;">
        @foreach($branches as $branch)
            <a href="/filialy/{{ $branch->slug }}" style="text-decoration:none; color:inherit;">
                <div style="border:1px solid #e5e7eb; border-radius:12px; padding:20px;">
                    <h2 style="margin:0 0 8px; font-size:20px;">{{ $branch->city }} — {{ $branch->name }}</h2>
                    <p style="margin:4px 0; color:#6b7280;">{{ $branch->address }}</p>
                    <p style="margin:4px 0;"><a href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a></p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
