<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>

    <body class="flex items-center justify-center h-screen">
        <div class="box-border h-[563px] w-[1030px]  border-2 rounded-lg border-accent bg-secondary flex">
            <div class="box-content p-4 m-2 flex items-center ml-4 w-[630px]">
                <h1 class="text-[48px]"><b>Welcome <br> Back!</b> </h1>
            </div>
            <div class="w-px h-full bg-gray-400"></div>
            <div class="box-content p-4 m-2 w-[350px]">
                <h1 class="font-bold text-[40px] mt-28 text-center">LOGIN</h1>

                <form action="{{ route('login') }}" method="POST" class="ml-11 mt-2">
                    @csrf
                    <p>Email:</p>
                    <input type="email" name="email"
                        class="w-[247px] border-2 rounded-md h-8 border-black bg-secondary pl-2"
                        placeholder="Masukkan E-Mail anda" required>
                    <p class="mt-2">Password:</p>
                    <input type="password" name="password"
                        class="w-[247px] border-2 rounded-md h-8 border-black bg-secondary pl-2"
                        placeholder="Masukkan Password anda" required>
                    <button
                        class="w-[247px] h-8 bg-accent text-white rounded-md mt-4 hover:bg-accent-hover">Login</button>
                    @if ($errors->any())
                        <div class="text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>



            </div>
        </div>

    </body>

</html>
