<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/cerulean/bootstrap.min.css">
 
<div class="container"  style="background-image: url('/img/ouv1.jpg'); background-size: cover; background-position: center; height: 100vh; width: 100vw">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-md-4">
                <div class="card bg-white border-0 shadow-lg rounded-0">
                    <div class="card-header bg-transparent border-0">
                        <div class="col-md-8 m-auto text-center mt-3">
                            <img class="img-fluid" src="" alt=""
                                srcset="/img/crous.png">
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-10 m-auto">
                                    <input id="email" type="email"
                                        class=" rounded-0 shadow-none form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email Address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-10 m-auto">
                                    <input id="password" type="password"
                                        class="form-control rounded-0 shadow-none  @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-10 m-auto">
                                    <button type="submit" class="m-auto d-block btn btn-primary shadow-none rounded-0">
                                        {{ __('Se Connecter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

