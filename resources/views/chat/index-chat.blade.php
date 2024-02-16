@extends('_layouts.app')

@section('content')
<div class="flex h-screen antialiased text-gray-800">
    <div class="flex flex-row h-full w-full overflow-x-hidden">
      <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0">
        <div class="flex flex-row items-center justify-center h-12 w-full">
          
          <img src="{{ asset('images/logo.png') }}"/>
        </div>

        <div class="flex flex-col mt-8">
            <button
            class="bg-primary rounded-xl p-2 hover:bg-darker text-sm font-semibold text-white"
          >
            Tambah Konsultasi
          </button>
          <div class="flex flex-col space-y-1 mt-4 -mx-2 h-100 overflow-y-auto">
           
            <button
              class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
            >
              <div class="ml-2 text-sm font-semibold">Henry Boyd</div>
            </button>
          </div>
        </div>
      </div>
      <div class="flex flex-col flex-auto h-full p-6">
        <div
          class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4"
        >
          <div class="flex flex-col h-full overflow-x-auto mb-4">
            <div class="flex flex-col h-full">
              <div class="grid grid-cols-12 gap-y-2">
                <div class="col-start-6 col-end-13 p-3 rounded-lg">
                    <div class="flex items-center justify-start flex-row-reverse">
                        <div class="relative mr-3 text-sm bg-background py-2 px-4 shadow rounded-xl text-white">
                            <div>Kamu gapapa?</div>
                        </div>
                    </div>
                </div>

                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                  <div class="flex flex-row items-center">
                    <div
                      class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                    >
                      <div>Aku gapapa kok</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4"
          >
            
            <div class="flex-grow ml-4">
              <div class="relative w-full">
                <input
                  type="text"
                  class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                />
              </div>
            </div>
            <div class="ml-4">
              <button
                class="flex items-center justify-center bg-primary hover:bg-darker rounded-xl text-white px-4 py-1 flex-shrink-0"
              >
                <span>Kirim</span>
                <span class="ml-2">
                  <svg
                    class="w-4 h-4 transform rotate-45 -mt-px"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                    ></path>
                  </svg>
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection