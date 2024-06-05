@extends('admin.layouts.app')
@section('title','Edit Permission')
@section('content')
<div class="my-5">
    <div class="container mx-auto max-w-xl shadow py-4 px-10">
        @if(session()->has('error'))
        <div class="bg-red-500 text-black px-4 py-2">
            {{session('error')}}
        </div>
        @endif
        <a href="{{route('admin.permissions.index')}}" class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md">Go back</a>
        <div class="my-3">
            <h1 class="text-center text-3xl font-bold">Edit Permission</h1>
            <form action="{{route('admin.permissions.update', $permission)}}" method="post">
                @csrf
                @method('put')
                <div class="my-2">
                    <label for="name" class="text-md font-bold">Name</label>
                    <input type="text" name="name" class="block w-full border border-emerald-500 outline emerald-800 px-2 py-2 text-md rounded" value="{{$permission->name}}">
                    @error('name')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <button class="px-5 py-1 bg-emerald-500 rounded-md text-black text-lg shadow-md">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection