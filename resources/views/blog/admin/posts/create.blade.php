@extends('layouts.app')

@section('content')
  @php /** @var \App\Models\BlogPost $item */@endphp
  <div class="container">
    @include('blog.admin.posts.includes.system_messages')
    <form method="POST" action="{{ route('blog.admin.posts.store', $item->id) }}">
      @csrf
      <div class="row justify-content-center">
        <div class="col-md-8">
          @include('blog.admin.posts.includes.post_edit_main_col')
        </div>
        <div class="col-md-3">
          @include('blog.admin.posts.includes.post_edit_add_col')
        </div>
      </div>
    </form>

    @if($item->exists)
      <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
        @method('DELETE')
        @csrf
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card card-block">
              <div class="card-body ml-auto">
                <button class="btn btn-link btn-danger">Удалить</button>
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </form>
    @endif
  </div>
@stop