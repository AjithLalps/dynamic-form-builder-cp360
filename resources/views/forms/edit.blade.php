@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">

        <div class="float-start">
            <h4 class="mt-5 mb-5">{{ !empty($form->name) ? $form->name : 'Form' }}</h4>
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

    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('form.update', $form->id) }}" id="edit_form_form" name="edit_form_form"
            accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('form', [
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