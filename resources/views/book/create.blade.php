@props(['authors'])



<x-layout>




    <div class="mx-auto max-w-[400px] my-20 ">
        <h2 class="font-bold text-4xl text-center">
            create book:
        </h2>

        <form class="space-y-6" action="{{ route('book.store') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Book Name</label>
                <div class="mt-2">
                    <input id="name" value="{{ old('name') }}" name="name" type="text"
                        class="border border-gray-200 w-full rounded-md outline-none p-2">
                </div>
                <div class="h-2">
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>

                <label for="year" class="block text-sm font-medium leading-6 text-gray-900">year</label>

                <div class="mt-2">
                    <input id="year" name="year" type="number" value="{{ old('year') }}"
                        class="border border-gray-200 w-full rounded-md outline-none p-2">
                </div>
                <div class="h-2">
                    @error('year')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div>
                <label>status </label>
                <div class="flex gap-2 mt-2">

                    <label class="w-full inline-flex items-center border border-gray-200 p-2 rounded-md">
                        <input type="radio" name="status" value="Free"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 "
                            @if (old('status') === 'Free') checked @endif>
                        <span class="ml-2">Free</span>
                    </label>


                    <label class="w-full inline-flex items-center border border-gray-200 p-2 rounded-md">
                        <input type="radio" name="status" value="Busy"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 "
                            @if (old('status') === 'Busy') checked @endif>
                        <span class="ml-2">Busy</span>
                    </label>
                </div>
                @error('status')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-2">


                @foreach ($authors as $author)
                    <div>
                        <input id={{ $author->id }} type="checkBox" name="authors[]" value={{ $author->id }}
                            @if (old('authors') && in_array($author->id, old('authors'))) checked @endif>
                        <label for={{ $author->id }} class="ml-2">{{ $author->name }}</label>
                    </div>
                @endforeach






                @error('authors')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>



            <div>
                <button type="submit" class="px-4 py-2 w-full  bg-blue-900 rounded-md text-white justify-center">Create
                    Book</button>
            </div>
            <div class="flex items-center gap-2">
                <a class="hover:underline" href="{{ route('book.dashboard') }}">Go back</a>
            </div>
        </form>


    </div>



</x-layout>
