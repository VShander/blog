@php
  /** @var \App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        @if ($item->is_published)
          Опубликовано
        @else
          Черновик
        @endif
      </div>
      <div class="card-body">
        <div class="card-title">
          <div class="cord-subtitle mb-2 text-muted"></div>
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a href="#maindata" data-toggle="tab" role="tab" class="nav-link active">Основные данные</a>
            </li>
            <li class="nav-item">
              <a href="#adddata" data-toggle="tab" role="tab" class="nav-link">Дополнительно</a>
            </li>
          </ul>
          <br>
          <div class="tab-content">
            <div class="tab-pane active" id="maindata" role="tabpanel">
              <div class="form-group">
                <label for="title">Заголовок</label>
                <input name="title" value="{{ $item->title }}"
                       id="title"
                       class="form-control"
                       minlength="3"
                       type="text"
                       required>
              </div>
              <div class="form-group">
                <label for="content_raw">Статья</label>
                <textarea name="content_raw"
                          id="content_raw"
                          class="form-control"
                          rows="20">{{ old('content_raw', $item->content_raw) }}</textarea>
              </div>
            </div>
            <div class="tab-pane" id="adddata" role="tabpanel">
              <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id"
                        placeholder="Выберите категорию"
                        required
                        class="form-control">
                  @foreach ($categoryList as $categoryOption)
                    <option value="{{ $categoryOption->id }}"
                            @if ($categoryOption->id == $item->category_id) selected @endif>
                      {{ $categoryOption->id_title }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="alias">Идентификатор</label>
                <input name="alias" value="{{ $item->alias }}"
                       id="alias"
                       type="text"
                       class="form-control">
              </div>

              <div class="form-group">
                <label for="fragment">Фрагмент</label>
                <textarea name="fragment"
                          id="fragment"
                          class="form-control"
                          rows="3">{{ old('fragment', $item->fragment) }}</textarea>
              </div>
              <div class="form-check">
                <input type="hidden"
                       value="0"
                       name="is_published">
                <input type="checkbox"
                       class="form-check-input"
                       value="1"
                       name="is_published"
                       @if ($item->is_published)
                       checked="checked"
                        @endif
                >
                <label for="form-check-label" for="is_published">Опубликовано</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
