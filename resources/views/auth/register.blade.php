<x-layout>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 ">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up to your
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('user.store') }}" method="POST">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="username" autocomplete="username"
                            class="border border-gray-200 w-full rounded-md outline-none p-2">
                    </div>
                    <div class="h-2">
                        @error('username')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>



                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input id="email" value="{{ old('email') }}" name="email" type="email"
                            autocomplete="email" class="border border-gray-200 w-full rounded-md outline-none p-2">
                    </div>

                    <div class="h-2">
                        @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>

                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>

                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            class="border border-gray-200 w-full rounded-md outline-none p-2">
                    </div>

                    <div class="h-2">
                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div>
                    <button type="submit"
                        class="px-4 py-2 w-full mt-2 bg-blue-900 rounded-md text-white justify-center">Sign
                        up</button>
                </div>


                <div class="flex items-center gap-2">
                    <p>Already have an account?</p>
                    <span class="underline hover:text-gray-500"><a href="{{ route('login') }}">Log in</a></span>
                </div>

            </form>


        </div>
    </div>
</x-layout>
