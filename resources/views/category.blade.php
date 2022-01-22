@section('title')
    Meilleurs canaux de la catégorie {{ $category->name }} pour Telegram
@endsection

@section('description')Cette page liste les meilleures chaînes Telegram. Toutes les chaînes sont classées par catégories: trouvez une chaîne de votre choix ou ajoutez la vôtre.@endsection

@extends('layouts.app')

@section('content')

<div class="container box pt-5 mb-0">
  <h3 align="center">{{ $category->name }}</h3>
</div>

<div class="content-box content-box--channels">
        <section class="channel-cards-list">
                <div class="channel-cards-container">
                    <div class="channel-card channel-card--promoted">
                      <header class="channel-card__top">
                          <span class="channel-card__crown"></span>
                          <picture class="channel-card__cover">
                              <source type="image/jpeg" srcset="
                                  /channels/{{ $promoted->url }}.jpeg">
                              <img width="50" height="50" src="/channels/{{ $promoted->url }}.jpeg">
                          </picture>

                          <div class="channel-card__info">
                              <h3 class="channel-card__title">
                                  <a href="https://t.me/{{ $promoted->url }}" target="_blank" rel="noreferrer nofollow">{{ $promoted->name }}</a>
                              </h3>

                              <div class="channel-card__meta">

                                  <img src="/icons/icon.png" aria-hidden="true" width="18" height="18">
                                  <span class="channel-card__subscribers">{{ $promoted->members }}</span>
                                  <a class="channel-card__username" href="https://t.me/{{ $promoted->url }}" target="_blank" rel="noreferrer nofollow">
                                      {{ "@" . $promoted->url }}
                                  </a>
                              </div>
                          </div>

                          <a class="channel-card__subscribe" href="https://t.me/{{ $promoted->url }}" aria-label="Открыть канал" target="_blank" rel="noreferrer nofollow" role="button">
                              S'abonner
                          </a>
                      </header>

                      <div class="channel-card__description">
                          {{ $promoted->description }}
                      </div>

                      <a class="channel-card__promo-label" rel="nofollow" target="_blank" href="https://t.me/Nicolas">
                          Promotion    </a>
                  </div>
        @foreach($channels as $channel)
          <div class="channel-card">
            <header class="channel-card__top">
                <picture>
                    <source type="image/jpeg" srcset="/channels/{{ $channel->url }}.jpeg">
                    <img class="channel-card__cover" loading="lazy" decoding="async" src="/channels/{{ $channel->url }}.jpeg" >
                </picture>

                <div class="channel-card__info">
                    <h3 class="channel-card__title">
                        <a href="https://t.me/{{$channel->url}}">{{ $channel->name }}</a>
                    </h3>

                    <div class="channel-card__meta">
                        <img src="/icons/icon.png" aria-hidden="true" width="18" height="18">
                        <span class="channel-card__subscribers">{{ $channel->members }}</span>
                        <a class="channel-card__username" href="https://t.me/{{ $channel->url }}">
                            {{ "@" . $channel->url }}
                        </a>
                    </div>
                </div>

                <a class="channel-card__subscribe" href="https://t.me/{{ $channel->url }}" title="Ouvrir le canal">
                    <img src="https://img.icons8.com/material-two-tone/344/right.png" aria-hidden="true" width="18" height="18">
                Ouvrir le canal</a>
            </header>

            <div class="channel-card__description">
                {{ $channel->description }}
            </div>
          </div>
        @endforeach

@endsection
