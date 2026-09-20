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
    <div class="container header-grid">

        <a href="/" class="header-logo">
            @if(file_exists(public_path('img/logo.png')))
                <img src="/img/logo.png" alt="{{ $networkName }}">
            @else
                <span class="logo-badge">🦶</span>
            @endif
        </a>

        @if($scheduleLabel)
            <div class="header-hours">
                <span class="hours-icon">🕒</span>
                <div>
                    <strong>{{ $scheduleLabel }}</strong><br>
                    <small>Приём ведётся по предварительной записи</small>
                </div>
            </div>
        @endif

        <select class="branch-select" onchange="if(this.value) location.href=this.value">
            <option value="">Выберите филиал</option>
            @foreach($branches as $b)
                <option value="/filialy/{{ $b->slug }}" {{ isset($branch) && $branch->id === $b->id ? 'selected' : '' }}>
                    {{ $b->city }} — {{ $b->name }}
                </option>
            @endforeach
        </select>

        @php $phone = $branch->phone ?? $defaultPhone; @endphp
        @if($phone)
            <a class="header-phone" href="tel:{{ preg_replace('/[^+0-9]/', '', $phone) }}">{{ $phone }}</a>
        @endif

        <a class="btn header-cta" href="{{ isset($branch) ? '#zapis' : '/#zapis' }}">🕐 Запись<br>на приём</a>
    </div>

    <div class="container header-nav">
        <nav class="main-nav">
            @foreach($menuHeader as $item)
                <a href="{{ $item->url }}">{{ $item->title }}</a>
            @endforeach
        </nav>
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
