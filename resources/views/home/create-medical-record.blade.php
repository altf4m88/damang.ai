@extends('_layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
           Tambah Riwayat Kesehatan
        </h2>
        <p class="mt-2 text-center text-sm leading-5 text-gray-500 max-w">
            Memberi saran kesehatan berdasarkan riwayat kesehatan kamu
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form action="{{ route('post-create-medical-record', $id) }}" method="POST">
              @csrf
              <div>
                <label for="weight" class="block text-sm font-medium leading-5  text-gray-700">Berat Badan</label>
                
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="weight" name="weight" placeholder="70" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
                <p class="text-xs text-gray-600 italic">Masukan dalam satuan KG</p>
              </div>

              <div class="mt-6">
                <label for="height" class="block text-sm font-medium leading-5  text-gray-700">Tinggi Badan</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="height" name="height" placeholder="70" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    
                </div>
                <p class="text-xs text-gray-600 italic">Masukan dalam satuan CM</p>
              </div>

                <div class="mt-6">
                    <label for="medical_condition" class="block text-sm font-medium leading-5  text-gray-700">Kondisi Kesehatan</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                      <textarea name="medical_condition" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="Saya sakit..."></textarea>
                    </div>
                </div>


                <div class="mt-6">
                    <label for="date_of_birth" class="block text-sm font-medium leading-5  text-gray-700">
                        Alergi
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                      <textarea name="allergies" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="Cacing"></textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="blood_type" class="block text-sm font-medium leading-5 text-gray-700">
                        Golongan Darah
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <select name="blood_type" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option selected>Pilih Golongan Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>


                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:primary-dark transition duration-150 ease-in-out">
                          Simpan
                        </button>
                    </span>   
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

