@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <span class="float-start">
            <h4>Create New Form</h4>
        </span>

        <div class="btn-group btn-group-sm float-end" role="group">
            <a href="{{ route('form.index') }}" class="btn btn-primary" title="Show All Form">
                All Forms
            </a>
        </div>

    </div>

    <div class="panel-body">

        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('form.store') }}" accept-charset="UTF-8" id="create_form_form"
                    name="create_form_form" class="form-horizontal">
                    {{ csrf_field() }}
                    @include ('forms.form', [
                    'form' => null,
                    ])

                    <div class="mx-3 my-3">
                        <div class="col-md-offset-2 col-md-10">
                            <input class="btn btn-primary" type="submit" value="Add">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection