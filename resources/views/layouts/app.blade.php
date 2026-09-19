<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $networkName)</title>
    <meta name="description" content="@yield('meta_description', '')">
</head>
<body style="margin:0; font-family: sans-serif; line-height:1.6; color:#1f2937;">

<header style="background:#0f172a; color:#fff; padding:14px 24px;">
    <div style="max-width:1000px; margin:0 auto; display:flex; align-items:center; gap:24px; flex-wrap:wrap;">
        <a href="/" style="color:#fff; font-weight:bold; font-size:20px; text-decoration:none;">{{ $networkName }}</a>

        <nav style="display:flex; gap:18px; flex-wrap:wrap;">
            @foreach($menuHeader as $item)
                <a href="{{ $item->url }}" style="color:#cbd5e1; text-decoration:none;">{{ $item->title }}</a>
            @endforeach
        </nav>

        <select onchange="if(this.value) location.href=this.value" style="margin-left:auto; padding:6px;">
            <option value="">— Выбор филиала —</option>
            @foreach($branches as $b)
                <option value="/filialy/{{ $b->slug }}" {{ isset($branch) && $branch->id === $b->id ? 'selected' : '' }}>
                    {{ $b->city }} — {{ $b->name }}
                </option>
            @endforeach
        </select>
    </div>
</header>

<main style="max-width:1000px; margin:32px auto; padding:0 24px;">
    @yield('content')
</main>

<footer style="background:#111827; color:#9ca3af; padding:24px; font-size:14px;">
    <div style="max-width:1000px; margin:0 auto;">
        @if(isset($legalEntity) && $legalEntity)
            <p style="color:#e5e7eb;"><strong>{{ $legalEntity->name }}</strong></p>
            @if($legalEntity->inn)
                <p>ИНН: {{ $legalEntity->inn }} @if($legalEntity->ogrn)· ОГРН: {{ $legalEntity->ogrn }}@endif</p>
            @endif
            @if($legalEntity->legal_address)<p>{{ $legalEntity->legal_address }}</p>@endif
        @endif
        <nav style="margin-top:12px; display:flex; gap:16px; flex-wrap:wrap;">
            @foreach($menuFooter as $item)
                <a href="{{ $item->url }}" style="color:#9ca3af; text-decoration:none;">{{ $item->title }}</a>
            @endforeach
        </nav>
    </div>
</footer>

</body>
</html>
