@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Que veux-tu faire ?</div>

                <div class="card-body">
                    <a href="/list-students" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Voir la liste des élèves</a>
                    <a href="/new-student" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Créer un(e) nouvel(le) élève</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
