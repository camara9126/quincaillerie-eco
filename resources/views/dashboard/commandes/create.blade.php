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
                    <form method="get" action="{{route('article.search')}}" class="form-inline">
                        
                        <input type="text" name="search"  placeholder="Rechercher...">                                                   
                            
                    </form>
                </div>

                @include('partials.userMenu')
            </nav>

            <!-- Content Area -->
            <div class="content">
                <!-- Page Header -->

                <div class="card">
                    <div class="card-header">
                        <span><i class="fas fa-box" style="color: var(--primary); margin-right: 0.5rem;"></i>Nouvelle comannde</span>
                    </div>
                    
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif

                    <div class="card-body">
                        @if ($errors->any())
                                <div style="color: red; margin-bottom: 10px;">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <h2 class="text-center mb-2">Nouvelle vente</h2>

                            <form action="{{ route('commandes.store') }}" method="POST" class="contact-form">
                                @csrf
                                {{-- CLIENT --}}
                                <div class="row mt-2">
                                    <div class="col-7">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Client</label><br>
                                            <select name="client_id" class="form-select" required>
                                                <option value="">-- Sélectionner un client --</option>
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">
                                                        {{ ucfirst($client->nom) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>                                
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nouveau Client</label><br>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#clientModal">
                                                Ajouter
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                {{-- PRODUITS --}}
                                
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <h4>Articles</h4>
                                    </div>
                                </div>

                                <table border="1" cellpadding="8" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nom Article</th>
                                            <th>Quantité</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {{-- ARTICLE --}}
                                        <tr>
                                            <td>
                                                <select name="articles[0][article_id]" class="form-select" required>
                                                    <option value="">-- Choisir --</option>
                                                    @foreach($articles as $article)
                                                        <option value="{{ $article->id }}">
                                                            {{ $article->nom }} : prix de vente({{number_format($article->prix, 0, ',',' ')}} XOF/U)
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="articles[0][quantite]" class="form-control" min="1" value="1" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Enregistrer la vente
                                </button>
                            </form>
                            
                            <!-- Nouveau client -->
                            <div class="modal fade" id="clientModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="post" action="{{route('clients.store')}}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Nouveau client</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Nom du client</label>
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

@include('partials.footer')