@extends('layouts.app')

@section('title', 'Larapets: Edit Adoption')

@section('content')
    @include('partials.navbar')
    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"/>
        </svg>
        Edit Adoption
    </h1>
    <div class="breadcrumbs text-sm text-white mb-6">
        <ul>
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('adoptions') }}">Adoptions Module</a></li>
            <li>Edit Adoption</li>
        </ul>
    </div>

    <div class="card text-white md:w-[560px] w-[320px] bg-black/20 p-6 mb-4 rounded">
        <form method="POST" action="{{ url('adoptions/'.$adoption->id) }}" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            {{-- User --}}
            <div>
                <label class="label text-white text-lg mb-1">Select User:</label>
                <select name="user_id" class="select bg-[#0009] outline-0 w-full">
                    <option value="">Choose a user...</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id', $adoption->user_id) == $user->id)>
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
                <label class="label text-white text-lg mb-1">Select Pet:</label>
                <select name="pet_id" class="select bg-[#0009] outline-0 w-full">
                    <option value="">Choose a pet...</option>
                    @foreach ($pets as $pet)
                        <option value="{{ $pet->id }}" @selected(old('pet_id', $adoption->pet_id) == $pet->id)>
                            {{ $pet->name }} — {{ $pet->kind }} / {{ $pet->breed }}
                            @if($pet->adopted && $pet->id != $adoption->pet_id) (Adopted) @endif
                        </option>
                    @endforeach
                </select>
                @error('pet_id')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-outline hover:bg-[#fff6] hover:text-white w-full mt-2">Save Changes</button>
        </form>
    </div>
@endsection