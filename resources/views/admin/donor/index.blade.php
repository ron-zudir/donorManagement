@extends('admin.layouts.app')
@section('title','Donor Page')
@section('content')
<div class="my-5">
    <div class="container mx-auto">
        <div class="flex justify-between items-center bg-gray-200 p-5 rounded-md">
            <div>
                <h1 class="text-xl text-semibold">Donors | Total: {{$total}}</h1>
            </div>
            <div>
                <a href="{{route('admin.donors.create')}}" class="px-5 py-2 bg-rose-500 text-white rounded-md text-lg shadow-md">Add new</a>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="bg-blue-500 text-black my-2 px-4 py-2 relative">
                <span class="absolute top-0 right-0 mr-2 mt-1 cursor-pointer" onclick="this.parentElement.style.display='none'">&times;</span>
                {{session('success')}}
            </div>
        @elseif(session()->has('deleted'))
            <div class="bg-red-500 text-black my-2 px-4 py-2 relative">
            <span class="absolute top-0 right-0 mr-2 mt-1 cursor-pointer" onclick="this.parentElement.style.display='none'">&times;</span>
                {{session('deleted')}}
            </div>
        @endif
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        #   
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Name  
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        DOB   
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Phone Number 
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Action 
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse($donors as $donor)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$donor->id}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$donor->first_name}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$donor->dob}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$donor->phone_no}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="" class="px-5 py-2 bg-blue-500 rounded-md text-white text-lg shadow-md">View</a>
                                        <a href="{{route('admin.donors.edit', ['id' => $donor->id])}}" class="px-5 py-2 bg-green-500 rounded-md text-white text-lg shadow-md">Edit</a>
                                        <a href="{{route('admin.donors.delete', ['id' => $donor->id])}}" class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md" onclick="confirm('Are you sure you want to delete?')">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <h2>No donors to display</h2>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection