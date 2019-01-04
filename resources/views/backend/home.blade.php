@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- PRODUCTS --}}
            <div class="card">
                <div class="card-header">
                    <span class="oi oi-cart"></span> Produits
                </div>

                <div class="card-body">
                    <a href="/list-products" class="btn btn-success btn-md active" role="button" aria-pressed="true">Voir la liste des produits</a>
                    <a href="/new-product" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Créer un nouveau produit</a>
                </div>
            </div>

            <br>

            {{-- STUDENTS --}}
            <div class="card">
                <div class="card-header">
                    <span class="oi oi-people"></span> Élèves
                </div>

                <div class="card-body">
                    <a href="/list-students" class="btn btn-success btn-md active" role="button" aria-pressed="true">Voir la liste des élèves</a>
                    <a href="/new-student" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Créer un(e) nouvel(le) élève</a>
                </div>
            </div>

            <br>

            {{-- BILLS --}}
            <div class="card">
                <div class="card-header">
                    <span class="oi oi-dollar"></span> Factures
                </div>

                <div class="card-body">
                    <a href="/bills/total" class="btn btn-danger btn-md active" role="button" aria-pressed="true">Total</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
