@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">

        <div class="float-start">
            <h4>{{ !empty($form->code) ? $form->code : 'Form' }}</h4>
        </div>

        <div class="btn-group btn-group-sm float-end" role="group">

            <a href="{{ route('forms.index') }}" class="btn btn-primary" title="Show All Form">
                All Forms
            </a>

        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div class="form-render"></div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-render.min.js"></script>

<script>
    jQuery(function($) {
        let formData = @json($form->content);

        $('.form-render').formRender({
            dataType: 'json',
            formData: formData
        });
    });
</script>