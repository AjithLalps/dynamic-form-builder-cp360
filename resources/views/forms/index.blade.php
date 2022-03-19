@extends('layouts.app')

@section('content')
<div class="card">

    <div class="card-header">

        <div class="float-start">
            <h4>Available Forms</h4>
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

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $form)
                    <tr>
                        <td>{{ $form->code }}</td>

                        <td>
                            <div class="btn-group btn-group-xs float-end" role="group">
                                <a href="{{ route('forms.show', $form->code ) }}" class="btn btn-primary"
                                    title="View Form">
                                    View
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @endif

</div>
@endsection