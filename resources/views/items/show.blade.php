@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Item Details</h2>
                <a href="{{ route('items.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Name:</strong> {{ $item->name }}
            </div>
            <div class="mb-3">
                <strong>Description:</strong> {{ $item->description }}
            </div>
            <div class="mb-3">
                <strong>Price:</strong> ${{ number_format($item->price, 2) }}
            </div>
            <div class="mb-3">
                <strong>Created At:</strong> {{ $item->created_at->format('F d, Y h:i A') }}
            </div>
            <div class="mb-3">
                <strong>Updated At:</strong> {{ $item->updated_at->format('F d, Y h:i A') }}
            </div>
        </div>
    </div>
@endsection