<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $networkName)</title>
    <meta name="description" content="@yield('meta_description', 'Сеть подологических клиник')">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container">
        <a href="/" class="logo">{{ $networkName }}</a>
        <nav class="main-nav">
            @foreach($menuHeader as $item)
                <a href="{{ $item->url }}">{{ $item->title }}</a>
            @endforeach
        </nav>
        <select class="branch-select" onchange="if(this.value) location.href=this.value">
            <option value="">— Филиал —</option>
            @foreach($branches as $b)
                <option value="/filialy/{{ $b->slug }}" {{ isset($branch) && $branch->id === $b->id ? 'selected' : '' }}>
                    {{ $b->city }}
                </option>
            @endforeach
        </select>
        @if(isset($branch))
            <a class="header-phone" href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a>
            <a class="btn" href="#zapis">Записаться</a>
        @endif
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container">
        <div>
            @if(isset($legalEntity) && $legalEntity)
                <strong>{{ $legalEntity->name }}</strong><br>
                @if($legalEntity->inn)ИНН: {{ $legalEntity->inn }} @if($legalEntity->ogrn)· ОГРН: {{ $legalEntity->ogrn }}@endif<br>@endif
                @if($legalEntity->legal_address){{ $legalEntity->legal_address }}<br>@endif
            @endif
            <nav style="margin-top:10px;">
                @foreach($menuFooter as $item)
                    <a href="{{ $item->url }}">{{ $item->title }}</a>
                @endforeach
            </nav>
        </div>
        <div>
            {{ $networkName }}<br>
            © {{ date('Y') }}
        </div>
    </div>
</footer>

</body>
</html>
