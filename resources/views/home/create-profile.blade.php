@extends('_layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
           Tambah Profile
        </h2>
        <p class="mt-2 text-center text-sm leading-5 text-gray-500 max-w">
            Memberi saran kesehatan berdasarkan profile kamu
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form  action="{{ route('post-create-profile') }}" method="POST">
                @csrf
                <div>
                    <label for="nama" class="block text-sm font-medium leading-5  text-gray-700">Nama</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="name" name="name" placeholder="Asep " type="text" required="" value="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        
                    </div>
                </div>


                <div class="mt-6">
                    <label for="date_of_birth" class="block text-sm font-medium leading-5  text-gray-700">
                        Tanggal lahir
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="date_of_birth" name="date_of_birth" placeholder="user@example.com" type="date" required="" value="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="gender" class="block text-sm font-medium leading-5 text-gray-700">
                        Jenis Kelamin
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <select name="gender" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>


                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:primary-dark transition duration-150 ease-in-out">
                        Selanjutnya
                        </button>
                    </span>   
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

