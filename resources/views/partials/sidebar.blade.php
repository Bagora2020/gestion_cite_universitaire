<ul class="navbar-nav sidebar sidebar danger accordion  
        
@if(Route::current()->getName() === 'login' || Route::current()->getName() === 'register') || Route::current()->getName() === '/admin/users/create')
                  d-none
                @else
                ''
                @endif      
" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
          <img src="img/crous.png">
        </div>
        <div class="sidebar-brand-text mx-3" >TechniAlert</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      
      @can('ecrire')
      <li class="nav-item">
        <a class="nav-link" href="{{route('probleme.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="#f9e7c0" d="M437.567 512H88.004a8.18 8.18 0 0 1-8.182-8.182V8.182A8.18 8.18 0 0 1 88.004 0H288.79l156.96 156.96v346.858a8.183 8.183 0 0 1-8.183 8.182"/><path fill="#eac083" d="m288.79 0l156.96 156.96H322.152c-18.426 0-33.363-14.937-33.363-33.363V0z"/><path fill="#597b91" d="M235.078 92.401H126.453c-6.147 0-11.13-4.983-11.13-11.13s4.983-11.13 11.13-11.13h108.625c6.147 0 11.13 4.983 11.13 11.13s-4.983 11.13-11.13 11.13m11.13 61.723c0-6.147-4.983-11.13-11.13-11.13H126.453c-6.147 0-11.13 4.983-11.13 11.13s4.983 11.13 11.13 11.13h108.625c6.147 0 11.13-4.983 11.13-11.13m0 72.854c0-6.147-4.983-11.13-11.13-11.13H126.453c-6.147 0-11.13 4.983-11.13 11.13s4.983 11.13 11.13 11.13h108.625c6.147-.001 11.13-4.983 11.13-11.13m94.038 72.853c0-6.146-4.983-11.13-11.13-11.13H126.453c-6.147 0-11.13 4.983-11.13 11.13s4.983 11.13 11.13 11.13h202.663c6.147 0 11.13-4.983 11.13-11.13m37.493-72.853c0-6.147-4.983-11.13-11.13-11.13h-74.985c-6.146 0-11.13 4.983-11.13 11.13s4.983 11.13 11.13 11.13h74.985c6.147-.001 11.13-4.983 11.13-11.13M299.92 372.685c0-6.146-4.983-11.13-11.13-11.13H126.453c-6.147 0-11.13 4.983-11.13 11.13s4.983 11.13 11.13 11.13H288.79c6.147-.001 11.13-4.984 11.13-11.13m66.21 72.853c0-6.146-4.983-11.13-11.13-11.13H126.453c-6.147 0-11.13 4.983-11.13 11.13s4.983 11.13 11.13 11.13H355c6.146 0 11.13-4.983 11.13-11.13"/></svg>
          <span>Bon de travail</span>
        </a>
      </li>
      @endcan

     
      
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Paramètres
      </div>
    
      <li class="nav-item">
        <a class="nav-link" href="{{route('pavillon.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><path fill="#e8eaf6" d="M42 39H6V23L24 6l18 17z"/><path fill="#c5cae9" d="m39 21l-5-5V9h5zM6 39h36v5H6z"/><path fill="#b71c1c" d="M24 4.3L4 22.9l2 2.2L24 8.4l18 16.7l2-2.2z"/><path fill="#d84315" d="M18 28h12v16H18z"/><path fill="#01579b" d="M21 17h6v6h-6z"/><path fill="#ff8a65" d="M27.5 35.5c-.3 0-.5.2-.5.5v2c0 .3.2.5.5.5s.5-.2.5-.5v-2c0-.3-.2-.5-.5-.5"/></svg>
          <span>Pavillon</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
        <i class="fa fa-wrench" aria-hidden="true"></i>
          <span>Matières</span>
        </a>
      </li>

      @can('ecrire')
      <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1em" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128m89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9l1.2-11.1l7.9-7.9l77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5m45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8l137.9-137.9l-71.7-71.7zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8l-4.1 4.1l71.8 71.7l41.8-41.8c9.3-9.4 9.3-24.5 0-33.9"/></svg>
          <span>Liste des Utilisateurs</span>
        </a>
      </li>
      @endcan
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
