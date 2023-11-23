@extends('shopify-app::layouts.default')

@section('content')
    <h1>Group</h1>
    <a href="{{ URL::tokenRoute('home') }}">Go home</a>

    <form action="{{ route('group.store') }}" method="post">
        <input type="text" name="name" value="">
        <input type="text" name="description" value="">
        @sessionToken
        <button type="submit">Submit</button>

    </form>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <td>{{ $group->name }}</td>
                <td>{{ $group->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Group Page' });
    </script>
@endsection
