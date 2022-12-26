<!doctype html>
<html lang="en"  class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/style/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Error <?= $errorCode ?? '500' ?></title>
</head>
<body class="h-full">
    <div class="bg-white min-h-full px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
        <div class="max-w-max mx-auto">
            <main class="sm:flex">
                <p class="text-4xl font-extrabold text-gray-600 sm:text-5xl">Error</p>
                <div class="sm:ml-6">
                    <div class="sm:border-l sm:border-gray-200 sm:pl-6">
                        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl"><?= $errorCode ?? '500' ?></h1>
                        <p class="mt-1 text-base text-gray-500"><?= $errorMessage ?? 'An error has occured.' ?></p>
                    </div>
                    <div class="mt-5 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                        <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Go back home </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>