@extends('layouts.master')

    @section('content')
        <div class="col-md-12">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-auto d-none d-lg-block">
            <img src="{{ asset('storage/'. $data->image) }}" alt="" class="card-img" id="mainImage">
            </div>
           <div class="mt-2">
                @if ($data->images)
                    <img src="{{ asset('storage/' . $data->image) }}" class="img-thumbnail" width="50">
                    @foreach (json_decode($data->images, true) as $image)
                    <img src="{{ asset('storage/' . $image) }}" width="50" class="img-thumbnail">
                    @endforeach
                @endif
            </div>
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
        </div>
    @endsection
@section('extra-js')
  <script>
    var mainImage = document.querySelector('#mainImage');
    var thumbnails = document.querySelectorAll('.img-thumbnail');
    thumbnails.forEach((element) => element.addEventListener('click', changeImage));
    function changeImage(e) {
      mainImage.src = this.src;
    }
  </script>
@endsection
