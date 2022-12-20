<?php
$pageName = "Registration";
require 'app/views/layout/head.view.php'
?>
<div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
    <div class="min-h-full flex items-center justify-center py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-2 text-center text-3xl tracking-tight font-bold text-gray-900">Create a new account</h2>
            </div>
            <form class="mt-8 space-y-6" action="/register" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block mb-2 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-gray-700 focus:z-10 sm:text-sm " placeholder="Email address">
                    </div>
                    <div>
                        <label for="user_name" class="sr-only">User Name</label>
                        <input id="user_name" name="user_name" type="text" required class="appearance-none rounded-none relative block mb-2 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-gray-700 focus:z-10 sm:text-sm" placeholder="User Name">
                    </div>
                    <div>
                        <label for="first_name" class="sr-only">First Name</label>
                        <input id="first_name" name="first_name" type="text" required class="appearance-none rounded-none relative block mb-2 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-gray-700 focus:z-10 sm:text-sm" placeholder="First Name">
                    </div>
                    <div>
                        <label for="last_name" class="sr-only">Last Name</label>
                        <input id="last_name" name="last_name" type="text" required class="appearance-none rounded-none relative block mb-2 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-gray-700 focus:z-10 sm:text-sm" placeholder="Last Name">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-gray-700 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                          <!-- Heroicon name: solid/lock-closed -->
                            <svg class="h-5 w-5 text-white-500 group-hover:text-white-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Register !
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'app/views/layout/footer.view.php' ?>
