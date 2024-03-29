@php
  /** @var \App\Models\BlogCategory $item */
  /** @var \Illuminate\Support\Collection $categoryList */
  /** @var old */
@endphp
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title"></div>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a href="#maindata" class="nav-link active" role="tab" data-toggle="tab">Основные данные</a>
          </li>
        </ul>
        <br>
        <div class="tab-content">
          <div class="tab-pane active" id="maindata" role="tabpanel">
            <div class="form-group">
              <label for="title">Заголовок</label>
              <input name="title" value="{{ $item->title }}"
                     id="title"
                     type="text"
                     class="form-control"
                     minlength="3"
                     required>
            </div>

            <div class="form-group">
              <label for="alias">Идентификатор</label>
              <input name="alias" value="{{ $item->alias }}"
                     id="alias"
                     type="text"
                     class="form-control">
            </div>

            <div class="form-group">
              <label for="parent_id">Родитель</label>
              <select name="parent_id"
                      id="parent_id"
                      class="form-control"
                      placeholder="Выберите категорию"
                      required>
                @foreach ($categoryList as $categoryOption)
                  <option value="{{ $categoryOption->id }}"
                    @if ($categoryOption->id == $item->parent_id) selected @endif>
{{--                    {{ $categoryOption->id }}. {{ $categoryOption->title }}--}}
                    {{ $categoryOption->id_title }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="description">Описание</label>
              <textarea name="description" id="description" class="form-control"
                        rows="3">{{ old('description', $item->description) }}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>