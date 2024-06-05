@extends('admin.layouts.app')
@section('title','Add New Donor')
@section('content')
<div class="my-5">
    <div class="container mx-auto max-w-xl shadow py-4 px-10">
        @if(session()->has('error'))
        <div class="bg-red-500 text-black px-4 py-2">
            {{session('error')}}
        </div>
        @endif
        <a href="{{route('admin.donors')}}" class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md">Go back</a>
        <div class="my-3">
            <h1 class="text-center text-3xl font-bold">Add New Donor</h1>
            <form action="{{route('admin.donors.update', $donor->id)}}" method="post">
                @csrf
                <div class="my-2">
                    <label for="first_name" class="text-md font-bold">First Name</label>
                    <input type="text" value="{{$donor->first_name}}" name="first_name" class="block w-full border border-emerald-500 outline emerald-800 px-2 py-2 text-md rounded">
                    @error('first_name')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="middle_name" class="text-md font-bold">Middle Name</label>
                    <input type="text" value="{{$donor->middle_name}}" name="middle_name" class="block w-full border border-emerald-500 outline emerald-800 px-2 py-2 text-md rounded">
                </div>
                <div class="my-2">
                    <label for="last_name" class="text-md font-bold">Last Name</label>
                    <input type="text" value="{{$donor->last_name}}" name="last_name" class="block w-full border border-emerald-500 outline emerald-800 px-2 py-2 text-md rounded">
                </div>
                <div class="my-2">
                    <label for="dob" class="text-md font-bold">DOB</label>
                    <input type="date" value="{{$donor->dob}}" name="dob" class="block w-full border border-emerald-500 outline emerald-800 px-2 py-2 text-md rounded">
                    @error('dob')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="phone_no" class="text-md font-bold">Phone Number</label>
                    <input type="number" value="{{$donor->phone_no}}" name="phone_no" class="block w-full border border-emerald-500 outline emerald-800 px-2 py-2 text-md rounded">
                    @error('phone_no')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="photo" class="text-md font-bold">Photo</label>
                    <input type="file" value="{{$donor->photo}}" name="photo" class="block w-full border border-emerald-500 outline emerald-800 px-2 py-2 text-md rounded">
                    @error('photo')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="biodata" class="text-md font-bold">Bio Data</label>
                    <textarea name="biodata" value="{{$donor->biodata}}" class="block w-full border border-emerald-500 outline emerald-800 px-2 py-2 text-md rounded">{{$donor->biodata}}</textarea>
                </div>
                <button class="px-5 py-1 bg-emerald-500 rounded-md text-black text-lg shadow-md">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection