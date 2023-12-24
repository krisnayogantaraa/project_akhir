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

<body>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-9 py-4 overflow-y-auto overflow-x-hidden" style="background: linear-gradient(180deg, #181B1E 0%, #0F1012 37.17%);">
            <a href="#" class="flex items-center ps-5 mb-5 pt-5">
                <span class="self-center text-3xl pb-3 font-pantom font-bold whitespace-nowrap dark:text-white">ZENKAS</span>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="260" height="3" viewBox="0 0 260 3" fill="none" class="p-0">
                <path d="M0.5 1.5H283.5" stroke="#1A1B1D" stroke-width="3" />
            </svg>

            <ul class="space-y-2 font-roboto font-semibold text-xs pt-6">
                <li>
                    <a href="index.html" class="flex items-center p-2 pb-6 text-white hover:fill-current hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                            <path stroke="currentColor" d="M6.375 14.875V10.625C6.375 10.2493 6.52426 9.88894 6.78993 9.62327C7.05561 9.35759 7.41594 9.20833 7.79167 9.20833H9.20833C9.58406 9.20833 9.94439 9.35759 10.2101 9.62327C10.4757 9.88894 10.625 10.2493 10.625 10.625V14.875M3.54167 8.5H2.125L8.5 2.125L14.875 8.5H13.4583V13.4583C13.4583 13.8341 13.3091 14.1944 13.0434 14.4601C12.7777 14.7257 12.4174 14.875 12.0417 14.875H4.95833C4.58261 14.875 4.22228 14.7257 3.9566 14.4601C3.69092 14.1944 3.54167 13.8341 3.54167 13.4583V8.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ms-3 hover:text-white dark:hover:text-white">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="transaction.html" class="flex items-center p-2 pb-6 text-abu-pale hover:fill-current hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" class="">
                            <path stroke="currentColor" d="M14.875 11.9089H2.125M14.875 11.9089L12.75 14.1667M14.875 11.9089L12.75 9.65104M4.25 6.64063L2.125 4.38281M2.125 4.38281L4.25 2.125M2.125 4.38281H14.875" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ms-3 hover:text-abu-pale dark:hover:text-white">Transactions</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    @yield('content')
    <script type="module" src="acquisitions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../node_modules/chart.js/dist/chart.js"></script>
    <script src="../../../node_modules/flowbite/dist/flowbite.js"></script>
</body>

</html>