@extends('layouts.app')

@section('title', 'Create Promotion')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Add New Promotion</h1>
                <a href="{{ route('promotions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm">Back to List</a>
            </div>
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="6" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('description') }}</textarea>
                </div>
                
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" name="image" id="image" class="w-full" required>
                    <p class="text-sm text-gray-500 mt-1">Upload an image (JPG, PNG, GIF). Max size: 2MB</p>
                </div>
                
                <div>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        Create Promotion
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection