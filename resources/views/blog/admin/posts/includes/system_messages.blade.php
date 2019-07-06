@php
  /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp
@if ($errors->any())
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="alert alert-danger" role="alert">
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        {{ $errors->first() }}
      </div>
    </div>
  </div>
@endif
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