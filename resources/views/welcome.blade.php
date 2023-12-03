<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <div class="bg-green-600">
      <div class="max-w-screen-xl mx-auto px-4 py-3 items-center gap-x-4 justify-center text-white sm:flex md:px-8">
          <p class="py-2 font-medium">
              Ostad First Assignment:
          </p>
          <a href="{{ URL::tokenRoute('shop') }}" class="flex-none inline-block w-full mt-3 py-2 px-3 text-center text-black font-medium bg-yellow-400 duration-150 hover:bg-gray-100 active:bg-gray-200 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
              Shop Details
          </a>

          <a href="{{ URL::tokenRoute('collections') }}" class="flex-none inline-block w-full mt-3 py-2 px-3 text-center text-black font-medium bg-red-500 duration-150 hover:bg-gray-100 active:bg-gray-200 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
              Collections
          </a>
      </div>
  </div>
</body>
</html>