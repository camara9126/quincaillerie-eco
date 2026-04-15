@include('partials.header')
    <div class="dashboard">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Top Navigation -->
            <nav class="top-nav">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <form method="get" action="{{route('tiers.search')}}" class="form-inline">
                        
                        <input type="text" name="search"  placeholder="Recherche tiers...">                                                   
                            
                    </form>
                </div>

                @include('partials.userMenu')
            </nav>

            <!-- Content Area -->
            <div class="content">
                <!-- Page Header -->

                <div class="card">

                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif

                    <div class="card-header">
                        <span><i class="fas fa-box" style="color: var(--primary); margin-right: 0.5rem;"></i>Liste des tiers ( {{$tiers->count()}} )</span>
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#tiersModal">
                            Nouveau tiers →
                        </button>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                               <table class="">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Telephone</th>
                                            <th>Email</th>
                                            <th>Adresse</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($tiers as $t)
                                        <tr>
                                            <td>{{$t->nom}}</td>
                                            <td>{{$t->telephone ?? 'Vide'}}</td>
                                            <td>{{$t->email ?? 'Vide'}}</td>
                                            <td>{{$t->adresse ?? 'Vide'}}</td>
                                            <td>{{$t->type ?? 'Vide'}}</td>
                                            <td>
                                            <div class="action-buttons">
                                                <a href="" class="action-btn" data-bs-toggle="modal" data-id="{{ $t->id }}" data-name="{{ $t->nom }}" data-phone="{{ $t->telephone }}" data-email="{{ $t->email }}" data-type="{{ $t->type }}" data-adress="{{$t->adresse }}" data-bs-target="#tiersEditModal" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{route('tiers.destroy', $t->id)}}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn delete" title="Supprimer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <!--<a href="" class="action-btn" title="Dupliquer"><i class="fas fa-copy"></i></a>-->
                                            </div>
                                        </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" align="center">Donnee vide !</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>  
                            <div class="d-flex justify-content-center mt-4">
                                {{$tiers->links()}}
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif 

                            <!-- Nouveau tiers -->
                            <div class="modal fade" id="tiersModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="post" action="{{route('tiers.store')}}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Nouveau tiers</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Nom du tiers</label>
                                                    <input type="text" name="nom" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Téléphone</label>
                                                    <input type="text" name="telephone" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Adresse</label>
                                                    <textarea name="adresse" id=""></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Type</label>
                                                    <select name="type" id="type">
                                                        <option value="client">Client</option>
                                                        <option value="fournisseur">Fournisseur</option>
                                                        <option value="mixte">Mixte</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                             <!-- Edit client -->
                            <div class="modal fade" id="tiersEditModal" tabindex="-1">
                                <div class="modal-dialog">

                                    <form method="post" id="editTiersForm" action="">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modification tiers</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="tiers_id">

                                                <div class="mb-3">
                                                    <label>Nom du tiers</label>
                                                    <input type="text" name="nom" id="name" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Téléphone</label>
                                                    <input type="text" name="telephone" id="phone" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Email</label>
                                                    <input type="email" name="email" id="email" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Adresse</label>
                                                    <textarea name="adresse" id="adress" class="form-control" rows="3"></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Type</label>
                                                    <select name="type" id="type">
                                                        <option value="client" id="type">Client</option>
                                                        <option value="fournisseur" id="type">Fournisseur</option>
                                                        <option value="mixte" id="type">Mixte</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    <!--Recuperation des donnees tiers pour l'Edit -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('tiersEditModal');
            const form = document.getElementById('editTiersForm');

            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                // Récupération des données
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const email = button.getAttribute('data-email');
                const phone = button.getAttribute('data-phone');
                const adress = button.getAttribute('data-adress');
                const type = button.getAttribute('data-type');
                
                // Remplir le formulaire
                modal.querySelector('#tiers_id').value = id;
                modal.querySelector('#name').value = name;
                modal.querySelector('#phone').value = phone;
                modal.querySelector('#email').value = email;
                modal.querySelector('#adress').value = adress;
                modal.querySelector('#type').value = type;
                
                // Mettre à jour l'action du formulaire avec l'ID récupéré
                const updateUrl = `/tiers/${id}`;
                form.action = updateUrl;
            });
        });
    </script>

@include('partials.footer')