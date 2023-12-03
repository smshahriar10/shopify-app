<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Collections - Ostad First Assignment</title>
</head>
<body class="bg-gray-100">
  <div class="bg-green-600">
      <div class="max-w-screen-xl mx-auto px-4 py-3 items-center gap-x-4 justify-center text-white sm:flex md:px-8">
          <p class="py-2 font-medium">
              Available Collections
          </p>
          <a href="{{ URL::tokenRoute('home') }}" class="flex-none inline-block w-full mt-3 py-2 px-3 text-center text-black font-medium bg-yellow-400 duration-150 hover:bg-gray-100 active:bg-gray-200 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
              Go back
          </a>
      </div>
  </div>

  <div class="container mx-auto mt-10 p-6 bg-white rounded shadow-lg">
    @foreach ($collections as $collection)
      <div class="mb-4 p-4 border-b border-gray-200 px-4 py-3">
        <h2 class="text-lg font-semibold">{{ $collection->title }}</h2>
        <p>{{ $collection->body_html }}</p>
        <div class="mt-4">
            <a href="{{ URL::tokenRoute('editCollection', ['collectionId' => $collection->id]) }}" style="text-decoration: underline;">
                Edit
            </a>
            <a href="{{ URL::tokenRoute('collectionProducts', ['collectionId' => $collection->id]) }}" style="text-decoration: underline;display:inline-block;margin-left:.3em;">
                Products
            </a>
        </div>
      </div>
    @endforeach
  </div>
  <div class="mb-4 px-3" style="margin-top: 1em;">
    <a href="{{ URL::tokenRoute('createCollection') }}" class="flex-none inline-block w-full mt-3 py-2 px-3 text-right text-white font-medium bg-indigo-600 duration-150 hover:bg-white-100 active:bg-white-100 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
      Create Collection
    </a>
  </div>
</body>
</html>
