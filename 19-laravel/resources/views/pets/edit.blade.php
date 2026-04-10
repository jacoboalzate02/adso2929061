@extends('layouts.app')

@section('title', 'Larapets: Edit Pet')

@section('content')
    @include('partials.navbar')
    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"/>
        </svg>
        Edit Pet
    </h1>
    <div class="breadcrumbs text-sm text-white mb-6">
        <ul>
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('pets') }}">Pet Module</a></li>
            <li>Edit Pet</li>
        </ul>
    </div>
    <div class="card text-white md:w-[720px] w-[320px] bg-black/20 p-4 mb-4 rounded">
        <form method="POST" action="{{ url('pets/'.$pet->id) }}" class="flex flex-col md:flex-row gap-4 mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Left: image --}}
            <div class="w-full md:w-[320px]">
                <div class="avatar flex flex-col gap-1 items-center justify-center cursor-pointer hover:scale-105 transition ease-in">
                    <div id="upload" class="mask mask-squircle w-48">
                        <img id="preview" src="{{ asset('images/pets/'.$pet->image) }}" />
                    </div>
                    <small class="pb-0 border-white border-b flex gap-1 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M208,40H48A24,24,0,0,0,24,64V176a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V64A24,24,0,0,0,208,40Zm8,136a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V64a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8Zm-48,48a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,224ZM157.66,106.34a8,8,0,0,1-11.32,11.32L136,107.31V152a8,8,0,0,1-16,0V107.31l-10.34,10.35a8,8,0,0,1-11.32-11.32l24-24a8,8,0,0,1,11.32,0Z"/>
                        </svg>
                        Upload Image
                    </small>
                    @error('image')
                        <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                    @enderror
                </div>
                <input type="file" id="image" name="image" class="hidden" accept="image/*">
                <input type="hidden" name="originimage" value="{{ $pet->image }}">

                <label class="label text-white mt-4">Description:</label>
                <textarea class="textarea bg-[#0009] outline-0 w-full h-28" name="description" placeholder="Brief description...">{{ old('description', $pet->description) }}</textarea>
                @error('description')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>

            {{-- Middle --}}
            <div class="w-full md:w-[320px]">
                <label class="label text-white">Name:</label>
                <input type="text" class="input bg-[#0009] outline-0" name="name" placeholder="Buddy" value="{{ old('name', $pet->name) }}">
                @error('name')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror

                <label class="label text-white">Kind:</label>
                <select name="kind" class="select bg-[#0009] outline-0">
                    <option value="">Select...</option>
                    <option value="Dog"    @selected(old('kind', $pet->kind) == 'Dog')>Dog</option>
                    <option value="Cat"    @selected(old('kind', $pet->kind) == 'Cat')>Cat</option>
                    <option value="Bird"   @selected(old('kind', $pet->kind) == 'Bird')>Bird</option>
                    <option value="Rabbit" @selected(old('kind', $pet->kind) == 'Rabbit')>Rabbit</option>
                    <option value="Other"  @selected(old('kind', $pet->kind) == 'Other')>Other</option>
                </select>
                @error('kind')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror

                <label class="label text-white">Breed:</label>
                <input type="text" class="input bg-[#0009] outline-0" name="breed" placeholder="Labrador" value="{{ old('breed', $pet->breed) }}">
                @error('breed')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror

                <label class="label text-white">Age (years):</label>
                <input type="number" class="input bg-[#0009] outline-0" name="age" placeholder="3" min="0" value="{{ old('age', $pet->age) }}">
                @error('age')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>

            {{-- Right --}}
            <div class="w-full md:w-[320px]">
                <label class="label text-white">Weight (kg):</label>
                <input type="number" step="0.1" class="input bg-[#0009] outline-0" name="weight" placeholder="5.5" min="0" value="{{ old('weight', $pet->weight) }}">
                @error('weight')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror

                <label class="label text-white">Location:</label>
                <input type="text" class="input bg-[#0009] outline-0" name="location" placeholder="Bogotá, Colombia" value="{{ old('location', $pet->location) }}">
                @error('location')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror

                <label class="label text-white">Adopted:</label>
                <select name="adopted" class="select bg-[#0009] outline-0">
                    <option value="">Select...</option>
                    <option value="0" @selected(old('adopted', $pet->adopted) == '0')>No</option>
                    <option value="1" @selected(old('adopted', $pet->adopted) == '1')>Yes</option>
                </select>
                @error('adopted')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror

                <label class="label text-white">Active:</label>
                <select name="active" class="select bg-[#0009] outline-0">
                    <option value="">Select...</option>
                    <option value="1" @selected(old('active', $pet->active) == '1')>Yes</option>
                    <option value="0" @selected(old('active', $pet->active) == '0')>No</option>
                </select>
                @error('active')
                    <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror

                <button class="btn btn-outline hover:bg-[#fff6] hover:text-white mt-3 w-full">Save Changes</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#upload').click(function (e) { e.preventDefault(); $('#image').click() })
        $('#image').change(function (e) {
            e.preventDefault()
            $('#preview').attr('src', window.URL.createObjectURL($(this).prop('files')[0]))
        })
    })
</script>
@endsection