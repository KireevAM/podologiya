@extends('layouts.app')

@section('title', $networkName . ' — центры подологии')
@section('meta_description', 'Сеть центров подологии: профессиональная помощь врача-подолога. Запись онлайн.')

@section('content')

<section class="hero">
    <div class="container">
        <h1>{{ $networkName }}</h1>
        <p>Профессиональная подология: лечение и коррекция стоп, вросших ногтей, диабетическая стопа. Приём ведут врачи-подологи.</p>
        <a class="btn" href="#filialy">Выбрать филиал</a>
        <a class="btn btn-ghost" href="#zapis">Записаться онлайн</a>
    </div>
</section>

<section class="section" id="filialy">
    <div class="container">
        <h2 class="section-title">Наши филиалы</h2>
        <div class="grid">
            @foreach($branches as $branch)
                <a href="/filialy/{{ $branch->slug }}" style="color:inherit;">
                    <div class="card">
                        <div class="icon">📍</div>
                        <h3>{{ $branch->city }} — {{ $branch->name }}</h3>
                        <p style="color:var(--muted);">{{ $branch->address }}</p>
                        <p><strong><a href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a></strong></p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-gray">
    <div class="container">
        <h2 class="section-title">Почему выбирают нас</h2>
        <div class="grid">
            <div class="card"><div class="icon">🩺</div><h3>Врачи-подологи</h3><p>Приём ведут специалисты с медицинским образованием.</p></div>
            <div class="card"><div class="icon">🧴</div><h3>Безопасность</h3><p>Стерилизация инструментов по медицинским стандартам.</p></div>
            <div class="card"><div class="icon">💳</div><h3>Честные цены</h3><p>Стоимость известна до начала приёма.</p></div>
            <div class="card"><div class="icon">📅</div><h3>Онлайн-запись</h3><p>Запишитесь на удобное время за минуту.</p></div>
        </div>
    </div>
</section>

<section class="section" id="zapis">
    <div class="container">
        <h2 class="section-title">Записаться на приём</h2>
        <div class="form-box">
            <p style="text-align:center; color:var(--muted); margin-bottom:18px;">
                Выберите филиал — запись откроется на странице филиала.
            </p>
            <select onchange="if(this.value) location.href=this.value">
                <option value="">— Выберите филиал —</option>
                @foreach($branches as $b)
                    <option value="/filialy/{{ $b->slug }}#zapis">{{ $b->city }} — {{ $b->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</section>

@endsection
