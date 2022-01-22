@extends('layouts.app')

@section('title')
    Tgram - Ajouter un canal Telegram dans le catalogue
@endsection

@section('content')
    <div class="container pt-5">
        <form action="/add/submit" enctype="multipart/form-data" method="post">
            @csrf

            <div class="alert alert-info">
                Pour être ajouté, le canal doit être de qualité, c'est à dire sans contenu payant, sans arnaque, avec des publications en français correct et ne doit pas faire de la publicité pour des canaux de mauvaise qualité.
            </div>

            <h3 align="center">Ajouter un canal</h3><br />
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif


            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h5 class="pb-3 pt-2">Si vous n'avez pas trouvé votre canal dans le catalogue, utilisez le formulaire pour l'ajouter.</h5>
            <div class="form-add">
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">Adresse :</label>
                    <input name="url" id="title" type="text" class="form-control @error('url') is-invalid @enderror" name="url" required autocomplete="url" autofocus>

                </div>

                <div class="form-group row ">
                    <label for="description" class="col-md-4 col-form-label">Courte description (optionnel) : </label>
                    <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label">Catégorie : </label>
                    <select class="form-control" id="category" name="category">

                        @foreach($categories as $category)
                          <option value="{{ $category->url }}">{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="row pt-3">
                    <button class="btn btn-success">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
@endsection
