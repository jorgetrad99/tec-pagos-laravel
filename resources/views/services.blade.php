@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($services as $service) 
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        {{-- <p class="card-text">
                            {{ $service->get_excerpt }}
                            <a href="{{ route('service', $service) }}">Leer Más</a>
                        </p> --}}
                        {{-- <p class="text-mutted mb-0">
                            <em>
                                &ndash; {{ $service->user->name }}
                            </em>
                            {{ $service->created_at->format('d M Y') }}
                        </p> --}}
                        <p class="text-mutted mb-0">{{ $service->amount }}</p>
                    </div>   
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
