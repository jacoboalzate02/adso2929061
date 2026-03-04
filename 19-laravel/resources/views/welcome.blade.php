@extends('layouts.app')

@section('title', 'Larapets: Welcome')

@section('content')
    <section class="bg-[#0008]
                    w-[380px]
                    flex-col
                    justify-center
                    text-white
                    items-center
                    p-4
                    rounded-sm">
        <img class="w-[320px]" src="{{ asset('images/logo.png') }}" >
        <p class="text-justify">
            <strong>Larapets</strong> connecting shelters with loving homes. Browse, and adopt pets easily. Find your perfect furry friend today!
        </p>
        <div class="flex gap-2 justify-between mt-8">
            <a class="btn btn-outline w-[160px]" href="{{ url('login') }}">
                Login
            </a>
            <a class="btn btn-outline w-[160px] "href="{{ url('register') }}">
                Register
            </a> 
            @endguest
            @auth
                <a class="btn btn-outline w-[160px]" href="{{ url('dashboard') }}">
                    Dashboard
                </a>
        </div>
    </section>