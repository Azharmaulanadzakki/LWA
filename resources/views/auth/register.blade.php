@extends('layout.app')
@section('content')

    <body class="bg-gray-50 min-h-screen flex items-center justify-center">
        @include('sweetalert::alert')


        <!-- login container -->
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold text-2xl text-[#002D74]">Register</h2>
                <p class="text-xs mt-4 text-[#002D74]">If you are not already a member, register first</p>

                @if (session('google_user'))
                    <!-- Tampilkan formulir registrasi dengan data pengguna Google -->
                    <form action="{{ route('register.post') }}" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{ session('google_user')->name }}">
                        <input type="hidden" name="email" value="{{ session('google_user')->email }}">
                        <button type="submit">Complete Registration with Google</button>
                    </form>
                @else
                    <form action="{{ route('register.post') }}" method="POST" class="flex flex-col gap-4">
                        @csrf

                        <input class="p-2 mt-8 rounded-xl border" id="name" type="text" name="name"
                            placeholder="Your Name" required>
                        <input class="p-2 rounded-xl border" id="email" type="email" name="email"
                            placeholder="Email" required>
                        <div class="relative">
                            <input class="p-2 rounded-xl border w-full" id="password" type="password" name="password"
                                placeholder="Password" required>
                            <div class="eye-icons" onclick="togglePasswordVisibility('password')">
                                <svg id="eye-off-password" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                                <svg id="eye-slash-password" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="gray"
                                    class="bi bi-eye-slash absolute top-1/2 right-3 -translate-y-1/2 " viewBox="0 0 16 16">
                                    <path
                                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486z" />
                                    <path
                                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                    <path
                                        d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708" />
                                </svg>
                            </div>
                        </div>

                        <div class="relative">
                            <input class="p-2 rounded-xl border w-full" id="password_confirmation" type="password"
                                name="password_confirmation" placeholder="Password confirmation" required>

                            <div class="eye-icons" onclick="togglePasswordVisibility('password_confirmation')">
                                <svg id="eye-off-password-confirmation" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="gray"
                                    class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                                <svg id="eye-slash-password-confirmation" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="gray"
                                    class="bi bi-eye-slash absolute top-1/2 right-3 -translate-y-1/2 " viewBox="0 0 16 16">
                                    <path
                                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486z" />
                                    <path
                                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                    <path
                                        d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708" />
                                </svg>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-400 text-sm font-medium">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit"
                            class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Register</button>
                    </form>
                @endif

                <div class="mt-5 text-xs border-b border-[#002D74] py-4 text-[#002D74]">
                    <a href="#">Forgot your password?</a>
                </div>

                <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
                    <p>Alreay have an account?</p>
                    <form action="{{ route('login') }}">
                        <button class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Login</button>
                    </form>
                </div>
            </div>

            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl aspect-[9/12]" src="{{ asset('img/showcase4.png') }}">
            </div>
        </div>

    </body>


    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const eyeOffIcon = document.getElementById(`eye-off-${inputId}`);
            const eyeSlashIcon = document.getElementById(`eye-slash-${inputId}`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOffIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                eyeOffIcon.style.display = 'block';
                eyeSlashIcon.style.display = 'none';
            }
        }
    </script>
@endsection
