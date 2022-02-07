<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Partykungen</title>
</head>

<body>
  <div class='w-full mt-12'>
    <div class='mx-12 flex flex-col'>
      <form class="w-full" id="article-form">
        <div class="mb-6">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
            Article Id
          </label>
          <div>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" placeholder="12345" id="article-id">
          </div>
          <span id="error-span" class="text-red-500"></span>
          <span id="loader"></span>
        </div>
        <div class="flex mb-2">
          <button class="mr-4 w-1/2 shadow bg-blue-500 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-full" type="submit">
            Fetch article
          </button>
          <button class="w-1/2 shadow bg-gray-500 hover:bg-gray-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-full" onclick="resetState()" type="button">
            Reset
          </button>
        </div>
      </form>
      <div id="statistics"></div>
    </div>
  </div>
</body>
<script src="../javascript/index.js"></script>

</html>
