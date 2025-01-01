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
                    <a href="/dashboard" class="flex items-center">
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

        <div class="w-[800px]  mt-8 bg-white shadow-md rounded-md p-4 mx-auto border-[1px] border-black">
            <h2 class="text-lg font-bold mb-4 text-center">Export Vehicle Orders</h2>
            <form action="/export-orders" method="GET"
                class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
                <div>
                    <label for="start_date" class="block text-sm font-medium mb-1">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium mb-1">End Date</label>
                    <input type="date" name="end_date" id="end_date"
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600">
                    Export to Excel
                </button>
            </form>
        </div>
    </div>



</body>

</html>
