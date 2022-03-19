@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">

        <div class="float-start">
            <h4>{{ !empty($form->code) ? $form->code : 'Form' }}</h4>
        </div>
        <div class="btn-group btn-group-sm float-end" role="group">

            <a href="{{ route('form.index') }}" class="btn btn-primary" title="Show All Form">
                All Forms
            </a>

            <a href="{{ route('form.create') }}" class="btn btn-success" title="Create New Form">
                Create
            </a>

        </div>
    </div>

    <div class="card-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('form.update', $form->id) }}" id="edit_form" name="edit_form"
            accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.forms.form', [
            'form' => $form,
            ])

            <div class="mb-3 my-3">
                <div class="col-md-offset-2 col-md-10">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>

<script>
    jQuery(function($) {

        var options = {
        disableFields: [
            'autocomplete', 
            'button',
            'checkbox-group', 
            'date', 
            'file', 
            'header', 
            'hidden', 
            'paragraph', 
            'radio-group', 
            'starRating', 
            'textarea'
            ],
            showActionButtons: false,
            formData: @json($form->content)
        };

        const formBuilder = $(document.getElementById('ed-content')).formBuilder(options);
        $('#edit_form').submit(function(e) {
           $('#content').val(formBuilder.actions.getData('json', true));
        });
    });
</script>
@endsection