@extends('_layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900">
           Pilih Profile
        </h2>
        <p class="mt-2 text-sm leading-5 text-gray-500 max-w">
            Silakan pilih profil yang sesuai dengan kamu
        </p>
        <div class="flex justify-center flex-wrap mt-6 gap-4">
            @foreach ($users as $user)
                <a href="{{ URL::to("/users/$user->id/chats") }}" class="p-4 hover:bg-gray-300 cursor-pointer">
                    <img src="{{ asset('images/default.webp') }}" alt="Avatar" class="w-20 h-20 rounded-full">
                    <p class="text-base text-gray-800 font-semibold mt-1">{{ $user->name }}</p>
                </a>
            @endforeach
            
           <a href="{{ route('get-create-profile') }}" class="p-4 hover:bg-gray-300 cursor-pointer">
                <div class="bg-primary w-20 h-20 rounded-full text-3xl flex justify-center items-center text-white" href="#">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <p class="text-base text-gray-800 font-semibold mt-1">Tambah</p>
           </a>
        </div>
    </div>
</div>
@endsection