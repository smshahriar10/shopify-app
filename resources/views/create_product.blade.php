<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Create Product</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-6 rounded shadow-lg">
        <div class="bg-green-600">
            <div class="max-w-screen-xl mx-auto px-4 py-3 items-center gap-x-4 justify-center text-white sm:flex md:px-8">
                <p class="py-2 font-medium">
                    Create Products
                </p>
                <a href="{{ URL::tokenRoute('collections') }}" class="flex-none inline-block w-full mt-3 py-2 px-3 text-center text-black font-medium bg-yellow-400 duration-150 hover:bg-gray-100 active:bg-gray-200 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
                    All collections
                </a>
            </div>
        </div>

        <form action="{{ route('storeProduct') }}" method="post" class="max-w-lg mx-auto" style="margin-top: .3em;">
            @sessionToken

            <div class="mb-4">
                <input type="text" id="title" name="title" placeholder="Enter product title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <textarea id="body_html" name="body_html" placeholder="Enter product description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>

            <button type="submit" class="flex-none inline-block w-full mt-3 py-2 px-3 text-right text-white font-medium bg-indigo-600 duration-150 hover:bg-white-100 active:bg-white-100 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
                Create Product
            </button>
        </form>
    </div>
</body>
</html>
