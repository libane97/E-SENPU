@extends('layouts.master')

    @section('content')
        <div class="col-md-12">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">World</strong>
                <h5 class="mb-0">{{$data->title}}</h5>
                <div class="mb-1 text-muted">{{$data->created_at->format('d/m/y H:m:s')}}</div>
                <p class="card-text mb-auto">{{$data->subtitle}}</p>
                <strong class="card-text mb-auto">{{$data->getPrice()}}</strong>
                <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                     <input type="hidden" name="product_id" value="{{$data->id}}">
                     <button type="submit" class="btn btn-danger">Ajoute au panier</button>
                </form>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{ $data->image }}" alt="">
            </div>
            </div>
    @endsection
