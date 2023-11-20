@extends('shopify-app::layouts.default')

@section('content')
    <h1>Products</h1>

    <!-- Dump a single product for debugging -->
    @if(count($products) > 0)
        <h2>Debug Single Product:</h2>
        @foreach($products as $product)
            @dump($product)
            @break
        @endforeach
    @endif

    <!-- Products Table -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection
