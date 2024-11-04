<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/cerulean/bootstrap.min.css">
  
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('users.update', $user) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <!-- Champ Nom -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Nom')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $user->name" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Champ Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email') ?? $user->email" required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Section des rôles avec checkbox -->
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Rôles</h3>
                        @foreach($roles as $role)
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id }}" id="role-{{ $role->id }}"
                                @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                <label for="role-{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-pencil-square"></i> Modifier les informations
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



                   
                         
              