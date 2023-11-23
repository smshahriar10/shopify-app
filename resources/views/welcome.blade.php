@extends('shopify-app::layouts.default')

@section('content')
    <h1>Home</h1>
        <a href="{{ URL::tokenRoute('group.index') }}">All group</a>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Home Page' });
    </script>
@endsection
