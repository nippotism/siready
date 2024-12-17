@extends('header')

@section('title','Closed')

@section('page')

  {{-- navbar --}}
  <x-navbar></x-navbar>

  {{-- endnavbar --}}

    <div class="flex overflow-hidde">

      {{-- sidebar --}}

        <x-side-bar :active="request()->route()->getName()">

        </x-side-bar>
      {{-- end sidebar --}}



        <div id="main-content" class="relative w-full h-full font-poppins overflow-y-auto lg:ml-52 dark:bg-blek-900">

            <div class="flex flex-col justify-center items-center px-6 mx-auto h-screen xl:px-0 dark:bg-blek-900">
                <div class=" md:max-w-xs animate-bounce ">
                    <img src="{{ asset('images/maintenance.svg') }}"alt="maintenance image">
                </div>
                <div class="text-center xl:max-w-4xl">
                    <h1 class="text-xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-3xl dark:text-white">IRS Anda Sudah Disetujui !</h1>
                    {{-- <p class="mb-5 text-base font-normal text-gray-500 md:text-lg dark:text-gray-400">Sorry for the inconvenience but were performing some maintenance at the moment. If you need to you can always <a href="#" class="text-primary-700 hover:underline dark:text-primary-500">contact us</a>, otherwise we’ll be back online shortly!.</p> --}}
                </div>
            </div>
        </div>
    </div>

    

@endsection
