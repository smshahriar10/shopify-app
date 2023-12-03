<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Collection</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-6 rounded shadow-lg">
        <div class="bg-green-600">
            <div class="max-w-screen-xl mx-auto px-4 py-3 items-center gap-x-4 justify-center text-white sm:flex md:px-8">
                <p class="py-2 font-medium">
                    Edit Collection
                </p>
                <a href="{{ URL::tokenRoute('collections') }}" class="flex-none inline-block w-full mt-3 py-2 px-3 text-center text-black font-medium bg-yellow-400 duration-150 hover:bg-gray-100 active:bg-gray-200 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
                    All collections
                </a>
            </div>
        </div>

        <form action="{{ route('editCollection', ['collectionId' => $collectionDetails->id]) }}" method="post" class="max-w-lg mx-auto" style="margin-top: .3em;">
            @sessionToken
            @method('post')

            <div class="mb-4">
                <input type="text" id="title" name="title" value="{{ $collectionDetails->title }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <textarea id="body_html" name="body_html" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">{{ $collectionDetails->body_html }}</textarea>
            </div>

            <button type="submit" class="bg-indigo-600 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update
            </button>
        </form>
    </div>
</body>
</html>
