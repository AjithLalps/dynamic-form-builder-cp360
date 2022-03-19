<div class="mb-3 mx-3 {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 form-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($form)->name) }}"
            minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="mb-3 mx-3 {{ $errors->has('content') ? 'has-error' : '' }}">
    <label for="content" class="col-md-2 form-label">Content</label>
    <div class="col-md-10">
        <input class="form-control" name="content" type="text" id="content"
            value="{{ old('content', optional($form)->content) }}" minlength="1" placeholder="Enter content here...">
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>