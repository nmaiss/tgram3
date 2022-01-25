@extends('layouts.app')

@section('title')
    Tgram – Annuaire de canaux Telegram francophones
@endsection

@section('description')Cette page liste les meilleures chaînes Telegram. Toutes les chaînes sont classées par catégories: trouvez une chaîne de votre choix ou ajoutez la vôtre.@endsection

@section('content')
    <div class="container box pt-5">
        <h3 align="center">Canaux Telegram francophones</h3>
        <!---<div class="panel panel-default">
            <div class="panel-heading pb-2">Rechercher</div>
            <div class="panel-body">
                <div class="form-group pb-3">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Saisissez les mots-clés (nom, catégorie, description, ...)" />
                </div>

                <div class="container">
                    <div class="row" id="chaines">

                    </div>
                </div>



            </div>
        </div>--->
    </div>

    <section class="channels-categories" id="js-search-fade">
      <!---<h1 class="channel-category-title mb-6">
          <a href="/">Canaux</a>
          Catégories
      </h1>--->
      @foreach($categories as $category)
        <a class="channel-category channel-category--news" href="/category/{{ $category->url }}">
            <picture>
                <source type="image/jpeg" srcset="/categories/{{$category->image}}">
                <img class="channel-category__cover" decoding="async" alt="" loading="eager" src="/categories/{{$category->image}}">
            </picture>

            <h2 class="channel-category__name">
                {{ $category->name }}
            </h2>
        </a>
      @endforeach
    </section>

<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('/.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#chaines').html(data.table_data);
                }
            })
        }

        $(document).on('keyup','#search', function () {
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>

@endsection
