@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vos Commande Mr {{Auth()->user()->name}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   @foreach(Auth()->user()->commands as $command)
                        <div class="card">
                            <div class="card-header">
                                Commande passée le {{ Carbon\carbon::parse($command->created_at)
                                ->format('d/m/Y à  H:i')}}
                             le numero de commande est {{ $command->id}}   
                            </div>
                        </div>
                         <div class="card-boy">
                            <h6>Les liste de produits</h6>
                            @foreach (unserialize($command->produits) as $produit)
                                     <div class="">Le Nom de produit : {{$produit[0]}}</div>    
                                     <div class="">Le prix de produit : {{getPrice($produit[1])}}</div>    
                                     <div class="">Le quantite de produit : {{$produit[2]}}</div>    
                            @endforeach
                        </div>
                   @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
