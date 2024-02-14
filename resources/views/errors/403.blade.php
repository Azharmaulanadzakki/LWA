@extends('layout.app')
@section('content')

    
<div class="bg-gray-100 flex items-center min-h-screen">
        <div class="container flex flex-col md:flex-row items-center justify-center px-5 text-gray-700">
            <div class="max-w-md">
                <h1 class="text-6xl font-bold">403 Unautorized!</h1>
                <p class="text-2xl md:text-3xl font-light leading-normal">You can't access this site because your not an admin. </p>
                <p class="mb-8">But dont worry, you can find plenty of other things on our homepage.</p>

                <form action="{{route('home.index')}}" class="flex justify-start items-start">
                    <button class="px-4 py-3 rounded-md bg-gray-800 hover:bg-gray-900 duration-200 text-white shadow-md">
                        Back to homepage
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
