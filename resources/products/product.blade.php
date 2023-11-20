@extends('shopify-app::layouts.default')

@section('content')
    <h1>Welcome</h1>
    <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
    <p> <a href="{{ route('product.index') }}">Products</a></p>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection