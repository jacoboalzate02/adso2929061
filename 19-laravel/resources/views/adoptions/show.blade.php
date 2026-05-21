@extends('layouts.app')

@section('title', 'Larapets: Show Adoption')

@section('content')
@include('partials.navbar')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"/>
    </svg>
    Show Adoption #{{ $adoption->id }}
</h1>
<div class="breadcrumbs text-sm text-white mb-6">
    <ul>
        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('adoptions') }}">Adoptions Module</a></li>
        <li>Show Adoption</li>
    </ul>
</div>

<div class="bg-[#0009] p-10 rounded-sm">
    <div class="flex gap-6 flex-col md:flex-row flex-wrap">
        {{-- User card --}}
        <div class="flex flex-col items-center gap-2">
            <p class="text-white text-lg font-semibold mb-2">Adopter</p>
            <div class="avatar">
                <div class="mask mask-squircle w-40">
                    <img src="{{ asset('images/' . $adoption->user->photo) }}" alt="{{ $adoption->user->fullname }}" />
                </div>
            </div>
            <ul class="list bg-[#0006] text-white rounded-box shadow-md w-64 mt-2">
                <li class="list-row"><span class="text-[#fff9] font-semibold">Name:</span> <span>{{ $adoption->user->fullname }}</span></li>
                <li class="list-row"><span class="text-[#fff9] font-semibold">Email:</span> <span>{{ $adoption->user->email }}</span></li>
                <li class="list-row"><span class="text-[#fff9] font-semibold">Phone:</span> <span>{{ $adoption->user->phone }}</span></li>
            </ul>
        </div>

        {{-- Arrow --}}
        <div class="flex items-center justify-center text-white text-5xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-16" fill="currentColor" viewBox="0 0 256 256">
                <path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"/>
            </svg>
        </div>

        {{-- Pet card --}}
        <div class="flex flex-col items-center gap-2">
            <p class="text-white text-lg font-semibold mb-2">Adopted Pet</p>
            <div class="avatar">
                <div class="mask mask-squircle w-40">
                    <img src="{{ asset('images/pets/' . $adoption->pet->image) }}" alt="{{ $adoption->pet->name }}" />
                </div>
            </div>
            <ul class="list bg-[#0006] text-white rounded-box shadow-md w-64 mt-2">
                <li class="list-row"><span class="text-[#fff9] font-semibold">Name:</span> <span>{{ $adoption->pet->name }}</span></li>
                <li class="list-row"><span class="text-[#fff9] font-semibold">Kind:</span> <span>{{ $adoption->pet->kind }}</span></li>
                <li class="list-row"><span class="text-[#fff9] font-semibold">Breed:</span> <span>{{ $adoption->pet->breed }}</span></li>
                <li class="list-row"><span class="text-[#fff9] font-semibold">Age:</span> <span>{{ $adoption->pet->age }} year(s)</span></li>
                <li class="list-row"><span class="text-[#fff9] font-semibold">Weight:</span> <span>{{ $adoption->pet->weight }} kg</span></li>
            </ul>
        </div>
    </div>

    <div class="mt-6">
        <ul class="list bg-[#0006] text-white rounded-box shadow-md w-64">
            <li class="list-row"><span class="text-[#fff9] font-semibold">Adoption ID:</span> <span>#{{ $adoption->id }}</span></li>
            <li class="list-row"><span class="text-[#fff9] font-semibold">Date:</span> <span>{{ $adoption->created_at->format('Y-m-d') }}</span></li>
            <li class="list-row"><span class="text-[#fff9] font-semibold">Registered:</span> <span>{{ $adoption->created_at->diffForHumans() }}</span></li>
        </ul>
    </div>
</div>
@endsection