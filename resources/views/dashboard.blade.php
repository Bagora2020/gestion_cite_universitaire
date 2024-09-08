@extends('layouts.apps')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
           
                <tr>
                <th scope="row">1</th>
                <td>Gora BA</td>
                <td>BA@gmail.com</td>
                <td>admin</td>
                <td>
                @can('edit-users')
                    <a href="#"><button class="btn btn-primary">Editer</button></a>
                @endcan
                    @can('delete-users')
                    <form action="#" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" class="d-inline">
                         @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    @endcan
                </td>
                </tr>
              
            </tbody>
            </table>


                   
                         
                   
                </div>
            </div>
        </div>
    </div>
@endsection
