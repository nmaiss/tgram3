@extends('layouts.app')

@section('content')

<div class="container p-5">

  <div class="card mb-4">
      <div class="card-header">{{ __('Catégories') }}</div>
      <div class="card-body">
          <form method="POST" action="/category/store" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                  <div class="col-md-6">
                      <input id="name" name="name" type="text" class="form-control" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Url') }}</label>

                  <div class="col-md-6">
                      <input id="url" name="url" type="text" class="form-control" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                  <div class="col-md-6">
                      <input id="image" name="image" type="file" class="form-control" required>
                  </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ 'Ajouter' }}
                      </button>
                  </div>
              </div>
          </form>
      </div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Url</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
            @foreach($categories ?? '' as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->url }}</td>
                <td><a href="/category/{{ $category->id }}/delete">Supprimer</a></td>
            </tr>
        </tbody>
        @endforeach
      </table>
  </div>

    @foreach($data as $el)
        <div class="alert alert-info">
            <form action="/admin/accept" enctype="multipart/form-data" method="post">
                @csrf

                <label for="name">
                    <h1><input value="{{$el->name}}" type="text" name="name" id="name" placeholder="name" class="form-control"></h1>
                </label>
                <a href="https://t.me/"><h5>t.me/{{ $el->url }}</h5></a>
                <label for="description">
                    <textarea name="description" id="description" class="form-control" placeholder="description" style="height: 200px; width: 100%"; >{{$el->description}}</textarea>
                </label>

                <label for="members">
                    <h1><input value="{{$el->members}}" type="text" name="members" id="members" placeholder="members" class="form-control"></h1>
                </label>

                <div class="col-md-6">
                    <input id="image" name="image" type="file" class="form-control" required>
                </div>

                <p><small>{{ $el->created_at }}</small></p>
                <input type="hidden" value="{{$el->id}}" name="id" id="id">
                <a href="{{ route('reject-channel', $el->id) }}">Rejeter</a>


                <div class="row pt-3">
                    <button class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    @endforeach
</div>

@endsection
