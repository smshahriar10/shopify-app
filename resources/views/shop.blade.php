<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Ostad First Assignment</title>
</head>
<body>
	<div class="bg-green-600">
	    <div class="max-w-screen-xl mx-auto px-4 py-3 items-center gap-x-4 justify-center text-white sm:flex md:px-8">
	        <p class="py-2 font-medium">
	            Shop Details
	        </p>
	        <a href="{{ URL::tokenRoute('home') }}" class="flex-none inline-block w-full mt-3 py-2 px-3 text-center text-black font-medium bg-yellow-400 duration-150 hover:bg-gray-100 active:bg-gray-200 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
	            Go back
	        </a>
	    </div>
	</div>

	<!-- Shop Details Section -->
	<div class="container mx-auto mt-10 p-6 bg-white px-4 py-3 rounded shadow-lg md:px-8">
		<p class="text-gray-800"><strong>Shop Name:</strong> {{ $shopInfo['name'] }}</p>
		<p class="text-gray-800"><strong>Shop ID:</strong> {{ $shopInfo['id'] }}</p>
	</div>

</body>
</html>
