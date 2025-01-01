<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="flex">
    <div class="box-border h-screen w-[230px] border-2 border-black bg-[#2A272A] text-white">
        <h1 class="text-2xl m-4">DASHBOARD</h1>
        <hr class="w-full border-2 border-white">
        <div class="mt-10 ml-4">
            <p class="">MAIN MENU: </p>
            <ul class="mt-4">
                <li class="mt-2 hover:underline font-bold">
                    <a href="" class="flex items-center">
                        <img src="/img/Control_Panel.png" alt="Control Panel" class="w-6 h-6 mr-2">
                        <p class="pt-1">DASHBOARD</p>
                    </a>
                </li>
                <li class="mt-2 hover:underline font-bold">
                    <a href="/input" class="flex items-center">
                        <img src="/img/Google_Forms.png" alt="Order" class="w-6 h-6 mr-2">
                        <p class="pt-1">INPUT</p>
                    </a>
                </li>
                <li class="mt-2 hover:underline font-bold">
                    <a href="/export" class="flex items-center">
                        <img src="/img/Google_Forms.png" alt="Order" class="w-6 h-6 mr-2">
                        <p class="pt-1">EXPORT DOCS</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="w-full">
        <div class="flex p-4 items-center">
            <p class="font-bold text-2xl">Welcome back Admin, {{ auth()->user()->name }}</p>
            <div class="flex items-center ml-auto mr-4">
                <img src="/img/profile_pictures.png" class="w-12 h-12" alt="Profile Picture">
                <p class="font-bold text-xl ml-2">{{ auth()->user()->name }}</p>
                <form action="{{ route('logout') }}" method="POST" class="ml-4">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-800">
                        Logout
                    </button>
                </form>
            </div>
        </div>
        <hr class="w-full border-[1px] border-black">
        <div class="flex mx-auto items-center justify-center">
            <div class="box-border rounded-md w-[327px] h-[124px] border-2 border-black m-4">
                <p class="font-thin underline text-center pt-2 text-lg">Kendaraan Tersedia</p>
                <div class="flex font-bold text-lg ml-4">
                    <img src="img/Car.png" alt="">
                    <h2 class="items-center justify-center my-auto text-2xl ml-2">{{ $vehiclesAvailable }}</h2>
                </div>
            </div>

            <div class="box-border rounded-md w-[327px] h-[124px] border-2 border-black m-4">
                <p class="font-thin underline text-center pt-2 text-lg">Kendaraan Terpakai</p>
                <div class="flex font-bold text-lg ml-4">
                    <img src="img/Car.png" alt="">
                    <h2 class="items-center justify-center my-auto text-2xl ml-2">{{ $vehiclesInUse }}</h2>
                </div>
            </div>

            <div class="box-border rounded-md w-[327px] h-[124px] border-2 border-black m-4">
                <p class="font-thin underline text-center pt-2 text-lg">Kendaraan Diperbaiki</p>
                <div class="flex font-bold text-lg ml-4">
                    <img src="img/Car_Service.png" alt="">
                    <h2 class="items-center justify-center my-auto text-2xl ml-2">{{ $vehiclesUnderRepair }}</h2>
                </div>
            </div>
        </div>
        <div class="relative w-[800px] h-[400px] mx-auto">
            <h2 class="text-xl font-bold text-center">Grafik Pemakaian Kendaraan</h2>
            <canvas id="vehicleChart"></canvas>
        </div>


    </div>


    <script>
        const ctx = document.getElementById('vehicleChart').getContext('2d');
        const vehicleChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Kendaraan Tersedia', 'Kendaraan Terpakai', 'Kendaraan Diperbaiki'],
                datasets: [{
                    label: 'Jumlah Kendaraan',
                    data: [{{ $vehiclesAvailable }}, {{ $vehiclesInUse }}, {{ $vehiclesUnderRepair }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
