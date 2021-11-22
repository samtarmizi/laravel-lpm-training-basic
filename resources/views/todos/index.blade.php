<h1>this is index todos : {{ $todos->count()}} numbers of todo</h1>

@foreach ($todos as $todo)
    <h4>{{ $todo->title }}-{{ $todo->description }}</h4>
    <br>
@endforeach
