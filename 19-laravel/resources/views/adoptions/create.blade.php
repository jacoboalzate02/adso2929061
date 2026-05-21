@extends('layouts.app')

@section('title', 'Larapets: New Adoption')

@section('content')
    @include('partials.navbar')
    <h1 class="mt-6 text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"/>
        </svg>
        New Adoption
    </h1>
    <div class="breadcrumbs text-sm text-white mb-6">
        <ul>
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('adoptions') }}">Adoptions Module</a></li>
            <li>New Adoption</li>
        </ul>
    </div>

    <div class="card text-white md:w-[560px] w-[320px] bg-black/20 p-6 mb-4 rounded">
        <form method="POST" action="{{ url('adoptions') }}" class="flex flex-col gap-4">
            @csrf

            {{-- User --}}
            <div>
                <label class="label text-white text-lg mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 inline mr-1" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"/>
                    </svg>
                    Select User:
                </label>
                <select name="user_id" class="select bg-[#0009] outline-0 w-full">
                    <option value="">Choose a user...</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                            {{ $user->fullname }} — {{ $user->email }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>

            {{-- Pet --}}
            <div>
                <label class="label text-white text-lg mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 inline mr-1" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M240,136a24,24,0,0,0-24-24H192a24,24,0,0,0-24,24v8H88v-8A24,24,0,0,0,64,112H40a24,24,0,0,0-24,24v16a24,24,0,0,0,24,24H64a24,24,0,0,0,24-24v-8h80v8a24,24,0,0,0,24,24h24a24,24,0,0,0,24-24Zm-192,16a8,8,0,0,1-8,8H16a8,8,0,0,1-8-8v-16a8,8,0,0,1,8-8H40a8,8,0,0,1,8,8Zm152,8a8,8,0,0,1-8-8v-16a8,8,0,0,1,8-8h24a8,8,0,0,1,8,8v16a8,8,0,0,1-8,8ZM128,88a32,32,0,1,0-32-32A32,32,0,0,0,128,88Zm0-48a16,16,0,1,1-16,16A16,16,0,0,1,128,40ZM56,96A24,24,0,1,0,32,72,24,24,0,0,0,56,96Zm0-32a8,8,0,1,1-8,8A8,8,0,0,1,56,64Zm144,32a24,24,0,1,0-24-24A24,24,0,0,0,200,96Zm0-32a8,8,0,1,1-8,8A8,8,0,0,1,200,64ZM128,168a24,24,0,1,0,24,24A24,24,0,0,0,128,168Zm0,32a8,8,0,1,1,8-8A8,8,0,0,1,128,200Z"/>
                    </svg>
                    Select Pet (Available only):
                </label>
                <select name="pet_id" class="select bg-[#0009] outline-0 w-full">
                    <option value="">Choose a pet...</option>
                    @foreach ($pets as $pet)
                        <option value="{{ $pet->id }}" @selected(old('pet_id') == $pet->id)>
                            {{ $pet->name }} — {{ $pet->kind }} / {{ $pet->breed }}
                        </option>
                    @endforeach
                </select>
                @error('pet_id')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-outline btn-success w-full mt-2">Register Adoption</button>
        </form>
    </div>
@endsection