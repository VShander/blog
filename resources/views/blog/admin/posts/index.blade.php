@extends('layouts.app')

@section('content')
  <div class="container">
    @if (session('success'))
      <div class="row justify-content-center">
        <div class="col-md-11">
          <div class="alert alert-success" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('success') }}
          </div>
        </div>
      </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-md-12">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
          <a href="{{ route('blog.admin.posts.create') }}" class="btn btn-primary">Добавить запись</a>
        </nav>
        <div class="card">
          <div class="card-dody">
            <table class="table table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>Автор</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Дата публикации</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($paginator as $post)
                @php
                  /** @var \App\Models\BlogPost $post */
                @endphp
                <tr @if (!$post->is_published) class="bg-secondary" @endif>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->user_id }}</td>
                  <td>{{ $post->category_id }}</td>
                  <td>
                    <a @if (!$post->is_published) class="text-white" @else  class="text-dark" @endif
                    href="{{ route('blog.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                  </td>
                  <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.m.Y H:i') : '' }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @if ($paginator->total() > $paginator->count())
      <br>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              {{ $paginator->links() }}
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection