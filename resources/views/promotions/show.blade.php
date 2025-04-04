@extends('layouts.app')

@section('title', $promotion->title)

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">{{ $promotion->title }}</h1>
                <a href="{{ route('promotions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm">Back to List</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <img src="{{ asset('images/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-auto rounded-lg shadow-md">
                </div>
                <div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                        <h2 class="text-xl font-semibold mb-4">Description</h2>
                        <p class="text-gray-700 whitespace-pre-line">{{ $promotion->description }}</p>
                        
                        <div class="mt-8 text-gray-500">
                            <p><strong>Created:</strong> {{ $promotion->created_at->format('F d, Y') }}</p>
                            <p><strong>Last updated:</strong> {{ $promotion->updated_at->format('F d, Y') }}</p>
                        </div>
                        
                        <div class="mt-8 flex space-x-4">
                            <a href="{{ route('promotions.edit', $promotion->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">Edit Promotion</a>
                            <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this promotion?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Delete Promotion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection