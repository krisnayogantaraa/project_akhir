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
                <a href="{{ route('finances.index') }}" class="flex items-center p-2 pb-6 text-white hover:fill-current hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                        <path stroke="currentColor" d="M6.375 14.875V10.625C6.375 10.2493 6.52426 9.88894 6.78993 9.62327C7.05561 9.35759 7.41594 9.20833 7.79167 9.20833H9.20833C9.58406 9.20833 9.94439 9.35759 10.2101 9.62327C10.4757 9.88894 10.625 10.2493 10.625 10.625V14.875M3.54167 8.5H2.125L8.5 2.125L14.875 8.5H13.4583V13.4583C13.4583 13.8341 13.3091 14.1944 13.0434 14.4601C12.7777 14.7257 12.4174 14.875 12.0417 14.875H4.95833C4.58261 14.875 4.22228 14.7257 3.9566 14.4601C3.69092 14.1944 3.54167 13.8341 3.54167 13.4583V8.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ms-3 hover:text-white dark:hover:text-white">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('trans') }}" class="flex items-center p-2 pb-6 text-abu-pale hover:fill-current hover:text-white">
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

<div class="p-9 sm:ml-72 body font-robototext-gray-800 dark:text-white " style="font-style: normal; font-weight: 700; line-height: normal;">
    <h1 class="text-sm pb-4 ">
        Total Balance
    </h1>
    @if($isNegative == true)
    <h1 class="pb-10 text-3xl text-negatif" style="font-size: 38px;">
        - Rp. {{$totalCombined}}
    </h1>
    @else
    <h1 class="pb-10 text-3xl" style="font-size: 38px;">
        Rp. {{$totalCombined}}
    </h1>
    @endif

    <div>
        <form id="year-form" action="/finances" method="get">
            <!-- Elemen tersembunyi untuk menyimpan nilai tahun -->
            <input type="hidden" id="year-input" name="year">

            <!-- Tampilan sebagai elemen h1 -->
            <div class="flex text-2xl gap-5 float-right">
                <button type="button" onclick="decrementYear()">
                    < </button>
                        <h1 id="year-display">2023</h1>
                        <button type="button" onclick="incrementYear()"> > </button>
            </div>

            <!-- Tombol submit tersembunyi untuk dipanggil dari JavaScript -->
            <button type="button" onclick="submitForm()" style="display: none;"></button>
        </form>
    </div>

    <div>
        <canvas id="canvas" height="280" width="600"></canvas>
    </div>



    <div class="pt-10">
        <h1 class="text-2xl pb-10">
            Transactions
        </h1>

        <h1 class="pb-3" style="font-size: 18px;">
            History
        </h1>

        <div class="pb-14">
            <svg xmlns="http://www.w3.org/2000/svg" width="696" height="4" viewBox="0 0 696 4" fill="none">
                <path d="M0 2H696" stroke="#1A1B1D" stroke-width="3" />
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

            <div class="basis-1/5">
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

            <div class="ml-10 basis-1/4">
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
        </div>
        @endforeach

    </div>

</div>
<?php
$tahun = date("Y");
?>


<script>
    var yearInput = document.getElementById("year-input");
    var yearDisplay = document.getElementById("year-display");

    // Mendapatkan nilai pencarian dari parameter URL
    var urlParams = new URLSearchParams(window.location.search);
    var currentYear = urlParams.get('year') || {{$tahun}};

    // Fungsi untuk mendekrementasi tahun
    function decrementYear() {
        currentYear--;
        updateDisplay();
        submitForm();
    }

    // Fungsi untuk mengincrement tahun
    function incrementYear() {
        currentYear++;
        updateDisplay();
        submitForm();
    }

    // Fungsi untuk memperbarui tampilan dan nilai input
    function updateDisplay() {
        yearDisplay.textContent = currentYear;
        yearInput.value = currentYear;
    }

    // Fungsi untuk mensubmit form
    function submitForm() {
        document.getElementById("year-form").submit();
    }

    // Memanggil fungsi untuk membuat tampilan awal
    updateDisplay();
</script>
<script>
    var data_income = <?php echo json_encode($monthlyIncome); ?>;
    var data_expense = <?php echo json_encode($monthlyExpense); ?>;
    var data_months = <?php echo json_encode($months); ?>;

    console.log('Data Income (Before):', data_income);
    console.log('Data Expense (Before):', data_expense);
    console.log('Data Months:', data_months);

    function fillMissingData(data, months) {
        var filledData = [];
        for (var i = 1; i <= 12; i++) {
            var value = data.find(item => item.month === i);
            filledData.push(value ? value.total : 0);
        }
        return filledData;
    }

    data_income = fillMissingData(data_income, data_months);
    data_expense = fillMissingData(data_expense, data_months);

    console.log('Data Income (After):', data_income);
    console.log('Data Expense (After):', data_expense);

    var barChartData = {
        labels: data_months,
        datasets: [{
            label: 'Income',
            backgroundColor: "#00FF29",
            data: data_income
        }, {
            label: 'Expense',
            backgroundColor: "#D20000",
            data: data_expense
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Monthly Income and Expense'
                }
            }
        });
    };
</script>

@endsection