@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todos Index') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created</th>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td> {{ $todo->id }}</td>
                                    <td> {{ $todo->title }}</td>
                                    <td> {{ $todo->description }}</td>
                                    <td> {{ $todo->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
