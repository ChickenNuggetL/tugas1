@extends('layouts.app')

@section('title', 'All Promotions')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-2xl font-bold mb-6">Current Promotions</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($promotions as $promotion)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('images/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $promotion->title }}</h2>
                            <p class="text-gray-600 mb-4">{{ Str::limit($promotion->description, 100) }}</p>
                            <div class="flex justify-between">
                                <a href="{{ route('promotions.show', $promotion->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm">View Details</a>
                                <div class="flex space-x-2">
                                    <a href="{{ route('promotions.edit', $promotion->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-md text-sm">Edit</a>
                                    <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this promotion?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500">No promotions available.</p>
                        <a href="{{ route('promotions.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">
                            Add New Promotion
                        </a>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-6">
                {{ $promotions->links() }}
            </div>
        </div>
    </div>
@endsection