@extends('layouts.app')

@section('content')

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="fa fa-tick"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif

<div class="card">

    <div class="card-header">

        <div class="float-start">
            <h4>Forms</h4>
        </div>

        <div class="btn-group btn-group-sm float-end" role="group">
            <a href="{{ route('form.create') }}" class="btn btn-success" title="Create New Form">
                Create
            </a>
        </div>

    </div>

    @if(count($forms) == 0)
    <div class="card-body">
        <h4>No Forms Available.</h4>
    </div>
    @else
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Content</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $form)
                    <tr>
                        <td>{{ $form->code }}</td>
                        <td>{{ $form->name }}</td>
                        <td>{{ $form->content }}</td>

                        <td>

                            <form method="POST" action="{!! route('form.destroy', $form->id) !!}"
                                accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                <div class="btn-group btn-group-xs float-end" role="group">
                                    <a href="{{ route('form.edit', $form->id ) }}" class="btn btn-primary"
                                        title="Edit Form">
                                        Edit
                                    </a>

                                    <button type="submit" class="btn btn-danger" title="Delete Form"
                                        onclick="return confirm(&quot;Click Ok to delete Form.&quot;)">
                                        Delete
                                    </button>
                                </div>

                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="card-footer">
        {!! $forms->render() !!}
    </div>

    @endif

</div>
@endsection