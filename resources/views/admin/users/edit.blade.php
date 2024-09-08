<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/cerulean/bootstrap.min.css">
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <form action="{{route('users.update', $user)}}" method="post">
                        @csrf
                        @method('PATCH')
                            <div class="form-group">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name')?? $user->name " required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')?? $user->email" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                    

                        @foreach($roles as $role)
                        <div class="form-group" form-check>
                            <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" id="{{$role->id}}"
                            @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                            <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>
                        </div>
                        @endforeach
            
                            <button type="submit" class="btn btn-primary">Modifier les informations</button>

                        </form>
            </div>                  
        </div>
    </div>


                   
                         
              