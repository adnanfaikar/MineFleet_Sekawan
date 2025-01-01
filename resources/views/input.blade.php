<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="flex">
    <div class="box-border h-screen w-[270px] border-2 border-black bg-[#2A272A] text-white">
        <h1 class="text-4xl m-4">DASHBOARD</h1>
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

        <div class="m-2">
            <h2 class="font-bold text-2xl ">Input Pemesanan Kendaraan</h2>
            <form action="{{ route('input') }}" method="POST">
                @csrf
                <p>Nama Kendaraan</p>
                <input type="text" name="vehicle_name" required
                    class="border-2 border-black rounded-md w-[308px] h-[30px] p-2">
                <p>Nama Pengemudi</p>
                <input type="text" name="driver_name" required
                    class="border-2 border-black rounded-md w-[308px] h-[30px] p-2">
                <p>Supervisor yang menyetujui</p>
                <input type="text" name="supervisor_name" required
                    class="border-2 border-black rounded-md w-[308px] h-[30px] p-2">
                <p>Tanggal Peminjaman</p>
                <input type="date" name="start_date" required
                    class="border-2 border-black rounded-md w-[308px] h-[30px] p-2">
                <p>Tanggal Pengembalian</p>
                <input type="date" name="end_date" required
                    class="border-2 border-black rounded-md w-[308px] h-[30px] p-2">
                <p>Keperluan</p>
                <textarea name="purpose" required cols="30" rows="10"
                    class="border-2 border-black rounded-md w-[308px] h-[100px] p-2"></textarea>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-800 mt-2 p-2">Submit</button>
            </form>

        </div>

    </div>
</body>

</html>
