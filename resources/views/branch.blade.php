<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $branch->getSeoTitle() }}</title>
    <meta name="description" content="{{ $branch->getSeoDescription() }}">
</head>
<body style="max-width: 800px; margin: 40px auto; font-family: sans-serif; line-height: 1.6;">

    <h1>{{ $branch->seo_h1 ?: $branch->name }}</h1>

    <p><strong>Город:</strong> {{ $branch->city }}</p>
    <p><strong>Адрес:</strong> {{ $branch->address }}</p>
    <p><strong>Телефон:</strong> <a href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a></p>
    @if($branch->email)
        <p><strong>E-mail:</strong> {{ $branch->email }}</p>
    @endif

    @if($branch->intro_text)
        <p>{{ $branch->intro_text }}</p>
    @endif

    <hr>

    <footer style="font-size: 14px; color: #666;">
        @if($legalEntity)
            <p><strong>{{ $legalEntity->name }}</strong></p>
            @if($legalEntity->inn)<p>ИНН: {{ $legalEntity->inn }} @if($legalEntity->ogrn)· ОГРН: {{ $legalEntity->ogrn }}@endif</p>@endif
            @if($legalEntity->legal_address)<p>Юр. адрес: {{ $legalEntity->legal_address }}</p>@endif
        @endif
    </footer>

</body>
</html>
