@extends('layouts.master')

@section('content')
    @foreach ($produit as $data)
        <div class="col-md-3">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
           <div class="col-auto d-none d-lg-block">
            <img src="{{ asset('storage/'. $data->image) }}" alt="" class="card-img">
            </div>
            <div class="col p-4 d-flex flex-column position-static">
            <small class="d-inline-block mb-2">

            </small>
            <strong class="d-inline-block mb-2 text-primary">
                @foreach($data->categories as $category)
                {{  $category->name}}
                @endforeach</strong>
            <h5 class="mb-0">{{$data->title}}</h5>
            <p class="card-text mb-auto">{{$data->subtitle}}
                <span class="badge badge-secondary">{{$data->created_at->format('d/m/y H:m:s')}}</span>
            </p>
            <strong class="card-text mb-auto">{{$data->getPrice()}}</strong>
            <a href="{{route('products.show', $data->slug)}}" class="stretched-link btn btn-info">Voire</a>
            </div>
        </div>
        </div>
    @endforeach 
            {{ $produit->appends(request()->input())->links()}}
@endsection
