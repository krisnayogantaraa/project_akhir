<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../dist/output.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Your App</title>
    <style>
        .body {
            border-right: 2.5px solid #1A1B1D;
            border-left: 2.5px solid #1A1B1D;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.10) 0%, rgba(0, 0, 0, 0.10) 100%), #151719;
        }

        .datepicker {
            z-index: 1100 !important;
        }
    </style>
</head>

<body bgcolor="#151719" class="font-medium font-roboto flex items-center justify-center h-screen">
    <div class="container w-1/4">
        <h1 class="text-4xl text-positif text-center mb-12">
            Login
        </h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
                <label for="email" class="text-abu-pale">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 ps-10" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="text-abu-pale">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 ps-10" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <a href="{{ route('register') }}" class="text-white text-sm">Don't have an account? Register here.</a>
            </div>
                <button type="submit" class="mt-5 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Login</button>
        </form>
    </div>

    <script type="module" src="acquisitions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../node_modules/chart.js/dist/chart.js"></script>
    <script src="../../../node_modules/flowbite/dist/flowbite.js"></script>
</body>

</html>