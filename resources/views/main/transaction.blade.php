@extends('layouts.app')

@section('content')


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
                <a href="{{ route('finances.index') }}" class="flex items-center p-2 pb-6 text-abu-pale hover:fill-current hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                        <path stroke="currentColor" d="M6.375 14.875V10.625C6.375 10.2493 6.52426 9.88894 6.78993 9.62327C7.05561 9.35759 7.41594 9.20833 7.79167 9.20833H9.20833C9.58406 9.20833 9.94439 9.35759 10.2101 9.62327C10.4757 9.88894 10.625 10.2493 10.625 10.625V14.875M3.54167 8.5H2.125L8.5 2.125L14.875 8.5H13.4583V13.4583C13.4583 13.8341 13.3091 14.1944 13.0434 14.4601C12.7777 14.7257 12.4174 14.875 12.0417 14.875H4.95833C4.58261 14.875 4.22228 14.7257 3.9566 14.4601C3.69092 14.1944 3.54167 13.8341 3.54167 13.4583V8.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ms-3 hover:text-white dark:hover:text-white">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('trans') }}" class="flex items-center p-2 pb-6 text-white hover:fill-current hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" class="">
                        <path stroke="currentColor" d="M14.875 11.9089H2.125M14.875 11.9089L12.75 14.1667M14.875 11.9089L12.75 9.65104M4.25 6.64063L2.125 4.38281M2.125 4.38281L4.25 2.125M2.125 4.38281H14.875" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ms-3 hover:text-abu-pale dark:hover:text-white">Transactions</span>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center text-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-green-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:text-negatif">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" class="stroke-current">
                            <path d="M1.25 13.875V12.4583C1.25 11.7069 1.54851 10.9862 2.07986 10.4549C2.61122 9.92351 3.33189 9.625 4.08333 9.625H6.91667C7.66811 9.625 8.38878 9.92351 8.92014 10.4549C9.45149 10.9862 9.75 11.7069 9.75 12.4583V13.875M2.66667 3.95833C2.66667 4.70978 2.96518 5.43045 3.49653 5.9618C4.02788 6.49316 4.74855 6.79167 5.5 6.79167C6.25145 6.79167 6.97212 6.49316 7.50347 5.9618C8.03482 5.43045 8.33333 4.70978 8.33333 3.95833C8.33333 3.20689 8.03482 2.48622 7.50347 1.95486C6.97212 1.42351 6.25145 1.125 5.5 1.125C4.74855 1.125 4.02788 1.42351 3.49653 1.95486C2.96518 2.48622 2.66667 3.20689 2.66667 3.95833Z" />
                        </svg>
                        <span class="ms-3">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>

<div class="p-9 sm:ml-72 body font-robototext-gray-800 dark:text-white font-bold leading-snug min-h-screen">
    <div class="flex justify-between pb-16">
        <div class="flex">
            <h1 class="text-3xl">
                Transactions
            </h1>
        </div>

        <svg data-modal-target="filter-modal" data-modal-toggle="filter-modal" xmlns="http://www.w3.org/2000/svg" width="26" height="27" viewBox="0 0 26 27" fill="none" style="cursor: pointer;" onclick="openFilterModal()">
            <path d="M1 1H25V4.19412C24.9998 4.9741 24.6836 5.72208 24.121 6.27353L17.5 12.7647V23.0588L8.5 26V13.5L1.78 6.25294C1.27817 5.71166 1.00008 5.00647 1 4.275V1Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>

    <div class="flex flex-row w-full gap-5">
        <div class="basis-1/3">
            <h1 class="text-sm pb-4 ">
                Total Balance
            </h1>
            @if($isNegative == true)
            <h1 class="pb-10 text-3xl text-negatif">
                - Rp. {{$totalCombined}}
            </h1>
            @else
            <h1 class="pb-10 text-3xl">
                Rp. {{$totalCombined}}
            </h1>
            @endif
        </div>
        <div class="basis-1/3">
            <h1 class="text-sm pb-4 ">
                Total Income
            </h1>

            <h1 class="pb-10 text-3xl text-positif">
                + Rp. {{ $totalIncome }}
            </h1>
        </div>
        <div class="basis-1/3">
            <h1 class="text-sm pb-4 ">
                Total Expenses
            </h1>

            <h1 class="pb-10 text-3xl text-negatif">
                - Rp. {{$totalNonIncome}}
            </h1>
        </div>
    </div>

    <div class="pt-10">
        <div class="flex justify-between ">
            <div>
                <h1 class="" style="font-size: 18px;">
                    History
                </h1>
            </div>
            <div class="pr-20">
                <a>
                    <button type="button" data-modal-target="income-modal" data-modal-toggle="income-modal" class="text-green-700 bg-abu-gelap hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-positif dark:text-positif dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Add
                        New</button>
                </a>
            </div>
        </div>



        <div class="pb-14">
            <svg xmlns="http://www.w3.org/2000/svg" width="914" height="4" viewBox="0 0 914 4" fill="none">
                <path d="M0 2H913.5" stroke="#1A1B1D" stroke-width="3" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="59" height="3" viewBox="0 0 59 3" fill="none" style="margin-top: -4;">
                <path d="M57.5 2.5C58.0523 2.5 58.5 2.05228 58.5 1.5C58.5 0.947715 58.0523 0.5 57.5 0.5V2.5ZM0 2.5H57.5V0.5H0V2.5Z" fill="white" />
            </svg>
        </div>

        @php
        $currentDate = null;
        @endphp

        @foreach($finances as $finance)
        @php
        $formattedDate = date('d M, Y', strtotime($finance->date));
        @endphp
        @if ($currentDate != $finance->date)
        <h1 class="text-sm pb-10" style="color: #646667;">
            {{ $formattedDate }}
        </h1>
        @php
        $currentDate = $finance->date;
        @endphp
        @endif

        <div class="flex items-center mb-5">
            <div class=" h-12 w-12 rounded-full border-black border-2 place-content-center  flex bg-abu-gelap">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none" class="m-auto">
                    <path d="M14.875 11.9089H2.125M14.875 11.9089L12.75 14.1667M14.875 11.9089L12.75 9.65104M4.25 6.64063L2.125 4.38281M2.125 4.38281L4.25 2.125M2.125 4.38281H14.875" stroke="white" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <div class="pl-5 basis-1/3">
                <div>
                    <h1 class="text-base text-white">
                        {{$finance->name}}
                    </h1>
                </div>
            </div>

            <div class="basis-1/6">
                @if($finance->type == 'income')
                <h1 class="text-base text-positif">
                    <div class="h-6 rounded-lg place-content-center flex justify-between items-center bg-abu-gelap text-positif" style="width: fit-content;">
                        <div class="ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor" />
                            </svg>
                        </div>
                        <div class="mx-4">
                            <h1 class="text-xs">
                                {{$finance->category}}
                            </h1>
                        </div>
                    </div>
                </h1>
                @else
                <h1 class="text-base text-negatif">
                    <div class=" h-6 rounded-lg place-content-center  flex justify-between items-center bg-abu-gelap text-negatif" style="width: fit-content;">
                        <div class="ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor" />
                            </svg>
                        </div>
                        <div class=" mx-4">
                            <h1 class="text-xs">
                                {{$finance->category}}
                            </h1>
                        </div>
                    </div>
                </h1>
                @endif
            </div>



            <div class="rounded-lg place-content-center ml-4 flex justify-between items-center">
                @if($finance->type == 'income')
                <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39" fill="none">
                    <path d="M24 14L14 24M24 14H15M24 14V23" stroke="#7C7C7C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <rect width="39" height="39" rx="5" fill="#535353" fill-opacity="0.31" />
                </svg>
                @else
                <h1 class="text-base text-negatif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39" fill="none">
                        <rect width="39" height="39" rx="5" fill="#535353" fill-opacity="0.31" />
                        <path d="M24 14L14 24M14 24H23M14 24V15" stroke="#B9B5B5" stroke-opacity="0.55" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </h1>
                @endif
            </div>

            <div class="ml-10 basis-1/5">
                @if($finance->type == 'income')
                <h1 class="text-base text-positif">
                    +Rp. {{ $finance->amount }}
                </h1>
                @else
                <h1 class="text-base text-negatif">
                    -Rp. {{ $finance->amount }}
                </h1>
                @endif
            </div>

            <div class="flex gap-6">
                <form action="{{ route('finances.destroy',$finance->id) }}" method="POST">

                    <!-- <a class="btn btn-primary" href="{{ route('finances.edit',$finance->id) }}"> -->
                    <button type="button" data-modal-target="update-modal{{$finance->id}}" data-modal-toggle="update-modal{{$finance->id}}" class="text-biru-gelap bg-abu-gelap hover:text-white border border-biru-gelap hover:bg-biru-gelap focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-2 py-2 text-center me-2  dark:border-biru-gelap dark:text-biru-gelap dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M10.5 2.82843L14.5 6.82843M1 16.3284H5L15.5 5.82843C15.7626 5.56578 15.971 5.25398 16.1131 4.91082C16.2553 4.56766 16.3284 4.19986 16.3284 3.82843C16.3284 3.45699 16.2553 3.0892 16.1131 2.74604C15.971 2.40287 15.7626 2.09107 15.5 1.82843C15.2374 1.56578 14.9256 1.35744 14.5824 1.2153C14.2392 1.07316 13.8714 1 13.5 1C13.1286 1 12.7608 1.07316 12.4176 1.2153C12.0744 1.35744 11.7626 1.56578 11.5 1.82843L1 12.3284V16.3284Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <!-- </a> -->

                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="text-negatif bg-abu-gelap hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-md text-sm px-2 py-2 text-center me-2  dark:border-negatif dark:text-negatif dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                            <path d="M1 5H17M7 9V15M11 9V15M2 5L3 17C3 17.5304 3.21071 18.0391 3.58579 18.4142C3.96086 18.7893 4.46957 19 5 19H13C13.5304 19 14.0391 18.7893 14.4142 18.4142C14.7893 18.0391 15 17.5304 15 17L16 5M6 5V2C6 1.73478 6.10536 1.48043 6.29289 1.29289C6.48043 1.10536 6.73478 1 7 1H11C11.2652 1 11.5196 1.10536 11.7071 1.29289C11.8946 1.48043 12 1.73478 12 2V5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Income modal -->
            <div id="update-modal{{$finance->id}}" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="update-modal{{$finance->id}}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" action="{{ route('finances.update',$finance->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="w-3/4  mx-auto col-span-2">
                                    <ul class="grid w-full md:grid-cols-2">
                                        @if($finance->type == 'income')
                                        <li>
                                            <input autocomplete="off" type="radio" id="Income{{$finance->id}}" name="type" value="income" checked class="hidden peer">
                                            <label for="Income{{$finance->id}}" class="inline-flex items-center justify-between w-full px-5 py-2 text-green-700 bg-abu-gelap hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-center me-2 mb-2 dark:border-positif dark:text-positif dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 rounded-lg rounded-r-none cursor-pointer  dark:peer-checked:text-white peer-checked:border-positif peer-checked:bg-positif peer-checked:text-white  dark:bg-gray-800 ">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Income</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input autocomplete="off" type="radio" id="Expenses{{$finance->id}}" name="type" value="expenses" class="hidden peer">
                                            <label for="Expenses{{$finance->id}}" class="inline-flex items-center justify-between w-full px-5 py-2 text-red-700 bg-abu-gelap hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-center me-2 mb-2 dark:border-negatif dark:text-neborder-negatif dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800 rounded-lg rounded-l-none cursor-pointer  dark:peer-checked:text-white peer-checked:border-negatif peer-checked:bg-negatif peer-checked:text-white  dark:bg-gray-800 ">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Expenses</div>
                                                </div>
                                            </label>
                                        </li>
                                        @else
                                        <li>
                                            <input autocomplete="off" type="radio" id="Income{{$finance->id}}" name="type" value="income" class="hidden peer">
                                            <label for="Income{{$finance->id}}" class="inline-flex items-center justify-between w-full px-5 py-2 text-green-700 bg-abu-gelap hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-center me-2 mb-2 dark:border-positif dark:text-positif dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 rounded-lg rounded-r-none cursor-pointer  dark:peer-checked:text-white peer-checked:border-positif peer-checked:bg-positif peer-checked:text-white  dark:bg-gray-800 ">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Income</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input autocomplete="off" type="radio" id="Expenses{{$finance->id}}" name="type" value="expenses" checked class="hidden peer">
                                            <label for="Expenses{{$finance->id}}" class="inline-flex items-center justify-between w-full px-5 py-2 text-red-700 bg-abu-gelap hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-center me-2 mb-2 dark:border-negatif dark:text-neborder-negatif dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800 rounded-lg rounded-l-none cursor-pointer  dark:peer-checked:text-white peer-checked:border-negatif peer-checked:bg-negatif peer-checked:text-white  dark:bg-gray-800 ">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Expenses</div>
                                                </div>
                                            </label>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input autocomplete="off" type="text" name="name" value="{{$finance->name}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                    <div class="absolute pt-3 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input autocomplete="off" datepicker type="text" name="date" value="{{$finance->date}}" datepicker-format="yyyy/mm/dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 ps-10" placeholder="Select date">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <optgroup label="Type Income">
                                            @foreach ($incomeCategories as $category)
                                            <option value="{{ $category->name }}" {{ $finance->category == $category->name ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </optgroup>

                                        <optgroup label="Type Expense">
                                            <option value="" disabled>-- Type Expense --</option>
                                            @foreach ($expenseCategories as $category)
                                            <option value="{{ $category->name }}" {{ $finance->category == $category->name ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                    <input autocomplete="off" type="number" name="amount" value="{{$finance->amount}}" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Description</label>
                                    <textarea id="detail" name="detail" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here">{{$finance->detail}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="text-white inline-flex gap-3 items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M10.5 2.82843L14.5 6.82843M1 16.3284H5L15.5 5.82843C15.7626 5.56578 15.971 5.25398 16.1131 4.91082C16.2553 4.56766 16.3284 4.19986 16.3284 3.82843C16.3284 3.45699 16.2553 3.0892 16.1131 2.74604C15.971 2.40287 15.7626 2.09107 15.5 1.82843C15.2374 1.56578 14.9256 1.35744 14.5824 1.2153C14.2392 1.07316 13.8714 1 13.5 1C13.1286 1 12.7608 1.07316 12.4176 1.2153C12.0744 1.35744 11.7626 1.56578 11.5 1.82843L1 12.3284V16.3284Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Change
                            </button>
                        </form>
                    </div>
                </div>


            </div>

        </div>
        @endforeach

    </div>

</div>

<!-- Income modal -->
<div id="income-modal" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="income-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('finances.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="w-3/4  mx-auto col-span-2">
                        <ul class="grid w-full md:grid-cols-2">
                            <li>
                                <input autocomplete="off" type="radio" id="Income" name="type" value="income" class="hidden peer" required>
                                <label for="Income" class="inline-flex items-center justify-between w-full px-5 py-2 text-green-700 bg-abu-gelap hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-center me-2 mb-2 dark:border-positif dark:text-positif dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 rounded-lg rounded-r-none cursor-pointer  dark:peer-checked:text-white peer-checked:border-positif peer-checked:bg-positif peer-checked:text-white  dark:bg-gray-800 ">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Income</div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input autocomplete="off" type="radio" id="Expenses" name="type" value="expenses" class="hidden peer">
                                <label for="Expenses" class="inline-flex items-center justify-between w-full px-5 py-2 text-red-700 bg-abu-gelap hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-center me-2 mb-2 dark:border-negatif dark:text-neborder-negatif dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800 rounded-lg rounded-l-none cursor-pointer  dark:peer-checked:text-white peer-checked:border-negatif peer-checked:bg-negatif peer-checked:text-white  dark:bg-gray-800 ">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Expenses</div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input autocomplete="off" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                        <div class="absolute pt-3 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input autocomplete="off" datepicker type="text" name="date" datepicker-format="yyyy/mm/dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 ps-10" placeholder="Select date">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category" class="origin-bottom bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <optgroup label="Type Income">
                                @foreach ($incomeCategories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </optgroup>

                            <optgroup label="Type Expense">
                                @foreach ($expenseCategories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                        <input autocomplete="off" type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                            Description</label>
                        <textarea id="detail" name="detail" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Add
                </button>
            </form>
        </div>
    </div>


</div>

<!-- filter modal -->
<div id="filter-modal" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="filter-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="/trans" method="get" enctype="multipart/form-data">
                @csrf
                <div class="w-3/4  mx-auto col-span-2">
                    <ul class="grid w-full md:grid-cols-2">
                        <li>
                            <input autocomplete="off" type="radio" id="Income_filter" name="type" value="income" class="hidden peer">
                            <label for="Income_filter" class="inline-flex items-center justify-between w-full px-5 py-2 text-green-700 bg-abu-gelap hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-center me-2 mb-2 dark:border-positif dark:text-positif dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 rounded-lg rounded-r-none cursor-pointer  dark:peer-checked:text-white peer-checked:border-positif peer-checked:bg-positif peer-checked:text-white  dark:bg-gray-800 ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">Income</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input autocomplete="off" type="radio" id="_filter" name="type" value="expenses" class="hidden peer">
                            <label for="_filter" class="inline-flex items-center justify-between w-full px-5 py-2 text-red-700 bg-abu-gelap hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-center me-2 mb-2 dark:border-negatif dark:text-neborder-negatif dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800 rounded-lg rounded-l-none cursor-pointer  dark:peer-checked:text-white peer-checked:border-negatif peer-checked:bg-negatif peer-checked:text-white  dark:bg-gray-800 ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">Expenses</div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 grid-cols-2">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="" value="">Select category</option>
                            <option value="TV">Salary</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                </div>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 grid-cols-2">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                        <div date-rangepicker class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 ps-10" placeholder="Select date start">
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 ps-10" placeholder="Select date end">
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Add Filter
                </button>
            </form>
        </div>
    </div>


</div>


<script>
    const datepickerEl = document.getElementById('datepickerId');
    new Datepicker(datepickerEl, {
        // options
        zIndex: 1000
    });
</script>

@endsection