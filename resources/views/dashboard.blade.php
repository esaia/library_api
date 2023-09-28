@props(['books'])



<x-layout>



    <div class="max-w-[950px] m-auto p-6">
        <div class="flex flex-col md:flex-row  justify-between items-end md:items-center gap-3 my-5">

            <div class="flex items-center gap-2 justify-between w-full md:w-fit">
                <a href="{{ route('book.create') }}"
                    class="py-1 px-5 bg-gray-200  text-gray-700 hover:bg-gray-300 rounded-md">Add new book</a>

                <form action="{{ route('book.dashboard') }}" method="GET">
                    <input name="query" value="{{ request('query') }}"
                        class="block h-8 p-3 rounded-md border border-gray-200 outline-none">
                </form>
            </div>

            <form method="GET" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 text-white rounded-md py-1 px-5">Log out</button>
            </form>


        </div>


        @if ($books->isempty())
            <p>No books</p>
        @else
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Book
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Authors
                            </th>
                            <th scope="col" class="px-6 py-3">
                                date of issue
                            </th>
                            <th scope="col" class="px-6 py-3">
                                status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="bg-white border-b  hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 max-w-[170px]  ">
                                    <p> {{ $book->name }}</p>
                                </th>
                                <td class="px-6 py-4">

                                    @foreach ($book->authors as $author)
                                        <div class="block">
                                            <p>
                                                *{{ $author->name }}
                                            </p>
                                        </div>
                                    @endforeach

                                </td>
                                <td class="px-6 py-4">
                                    {{ $book->year }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class=" flex items-center justify-start h-full gap-2 ">

                                        @if ($book->status)
                                            <div class="w-2 h-2 rounded-full bg-green-600"></div>
                                            <p>Free</p>
                                        @else
                                            <div class="w-2 h-2 rounded-full bg-red-600"></div>
                                            <p>Busy</p>
                                        @endif

                                    </div>


                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('book.edit', $book) }}"
                                        class="font-medium  px-5 py-2 rounded-[15px] text-blue-600 bg-blue-300">Edit</a>


                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium px-5 py-2 rounded-[15px] text-red-600 bg-red-300">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        @endif





    </div>


</x-layout>
