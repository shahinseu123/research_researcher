<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Register</title>
    <style>
        input {
            color: lightgray;

        }

        input:focus {
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container__root">
        <div class=" my-10">

            <div class="">

                <div class="max_w">
                    <h3 class="text-2xl text-gray-700 text-center font-bold uppercase">Please register
                    </h3>
                    <div class="flex justify-center mb-4">
                        {{-- <img class="h-24" src="/img/logo/webLogo.PNG" alt=""> --}}
                    </div>
                    <div class="bg-gray-800 p-4 shadow-md rounded">
                        <form action="{{ route('register.action') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="text-sm mb-2 text-gray-500">Name <span
                                        class="text-red-500">*</span></label>
                                <div>
                                    <input type="text" name="name" id="name" required
                                        class="bg-gray-800 px-2 py-1 border-2 border-gray-600 rounded w-full focus:bg-gray-800">
                                    @error('name')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="text-sm mb-2 text-gray-500">Email <span
                                        class="text-red-500">*</span></label>
                                <div>
                                    <input type="email" name="email" id="email" required
                                        class="bg-gray-800 px-2 py-1 border-2 border-gray-600 rounded w-full focus:bg-gray-800">
                                    @error('email')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="username" class="text-sm mb-2 text-gray-500">Username <span
                                        class="text-red-500">*</span></label>
                                <div>
                                    <input type="text" name="username" id="username" required
                                        class="bg-gray-800 px-2 py-1 border-2 border-gray-600 rounded w-full focus:bg-gray-800">
                                    @error('username')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="address" class="text-sm mb-2 text-gray-500">Address <span
                                        class="text-red-500">*</span></label>
                                <div>
                                    <input type="text" name="address" id="address" required
                                        class="bg-gray-800 px-2 py-1 border-2 border-gray-600 rounded w-full focus:bg-gray-800">
                                    @error('address')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="text-sm mb-2 text-gray-500">Password <span
                                        class="text-red-500">*</span></label>
                                <div>
                                    <input type="password" name="password" id="password" required
                                        class="bg-gray-800 px-2 py-1 border-2 border-gray-600 rounded w-full focus:bg-gray-800">
                                    @error('password')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="text-sm mb-2 text-gray-500">Confirm password
                                    <span class="text-red-500">*</span></label>
                                <div>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        required
                                        class="bg-gray-800 px-2 py-1 border-2 border-gray-600 rounded w-full focus:bg-gray-800">
                                    @error('password_confirmation')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <button
                                    class="bg-gray-800 w-full rounded border-2 border-green-700 text-green-700 py-2 font-semibold text-sm">
                                    SUBMIT
                                </button>
                            </div>
                        </form>

                    </div>

                    <div class="mt-3">
                        <h3 class="text-sm text-gray-600">Already registered? <a class="font-bold text-green-800"
                                href="{{ route('login') }}">Please Login.</a></h3>
                    </div>
                </div>
            </div>
            @if (session('error'))
                <div role="alert">
                    {{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div>{{ session('success') }}</div>
            @endif
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://kit.fontawesome.com/c131658599.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).on('click', '.btn-mobile-menu', function() {
            // $('.mobile-ul').removeClass('slide_0')
            $('.mobile-ul').slideToggle()

        })

        $(document).on('click', '.click_banish', function() {
            $('.message_span').addClass('hidden')
        })
    </script>
</body>

</html>
