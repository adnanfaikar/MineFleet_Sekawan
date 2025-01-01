<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Requests</title>
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
                    <a href="/supervisor/requests" class="flex items-center">
                        <img src="/img/Google_Forms.png" alt="Order" class="w-6 h-6 mr-2">
                        <p class="pt-1">REQUEST</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="w-full">
        <div class="flex p-4 items-center">
            <p class="font-bold text-2xl">Welcome back Supervisor, {{ auth()->user()->name }}</p>
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

        <div class="box-border rounded-md w-[327px] p-3 border-2 border-black m-4">
            <h1 class="font-bold text-lg text-center">Pending Requests</h1>
            <hr class="w-full border-[1px] border-black mb-2">
            @if ($requests->isEmpty())
                <p>No requests found.</p>
            @else
                @foreach ($requests as $request)
                    <div>
                        <p><strong>Vehicle Name:</strong> {{ $request->vehicle_name }}</p>
                        <p><strong>Driver Name:</strong> {{ $request->driver_name }}</p>
                        <p><strong>Purpose:</strong> {{ $request->purpose }}</p>
                        <form action="{{ url('/supervisor/requests/' . $request->id . '/status') }}" method="POST">
                            @csrf
                            <select name="status" required class="border-2 border-black  h-8 rounded-md">
                                <option value="approved">Approve</option>
                                <option value="rejected">Reject</option>
                            </select>
                            <button type="submit" class="border-2 border-black w-20 h-8 rounded-md">Submit</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</body>



</html>
