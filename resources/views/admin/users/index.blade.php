
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/cerulean/bootstrap.min.css">
  
<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Liste des utilisateurs et leurs rôles</h1>
            <a href="{{ url()->previous() }}" class=" float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>
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
            @foreach($users as $user)
                <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray() )}}</td>
                <td>
                @can('edit-users')
                    <a href="{{route ('users.edit', $user->id) }}"><button class="btn btn-primary">Editer</button></a>
                @endcan
                    @can('delete-users')
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" class="d-inline">
                         @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    @endcan
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
    </div>
</div>


                   
                         
