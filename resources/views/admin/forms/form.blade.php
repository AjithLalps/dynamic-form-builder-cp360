
<input class="form-control" name="content" type="hidden" id="content">

<div class="mb-3 mx-3 {{ $errors->has('content') ? 'has-error' : '' }}">

    <label class="col-md-2 form-label">Content</label>
    <div class="col-md-10">
        <div id="ed-content"></div>
    </div>
</div>