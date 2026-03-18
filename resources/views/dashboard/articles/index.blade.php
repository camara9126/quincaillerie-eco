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
                    <input type="text" placeholder="Rechercher...">
                </div>

                <div class="user-menu">
                    <i class="fas fa-bell"></i>
                    <i class="fas fa-envelope"></i>
                    <div class="user-profile">
                        <div class="user-avatar">
                            <span>AD</span>
                        </div>
                        <div class="user-info">
                            <div style="font-weight: 600;">Admin</div>
                            <div style="font-size: 0.85rem; color: var(--gray-600);">admin@btpmateriaux.sn</div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Content Area -->
            <div class="content">
                <!-- Page Header -->

                <div class="card">
                    <div class="card-header">
                        <span><i class="fas fa-box" style="color: var(--primary); margin-right: 0.5rem;"></i>Liste des articles</span>
                        <a href="{{ route('article.create') }}" style="color: var(--primary); text-decoration: none; font-weight: 500;">Nouveau article →</a>
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
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Catégorie</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $a)
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                <img src="{{asset('storage/'. $a->image)}}" width="50" alt="">
                                                <div>
                                                    <div style="font-weight: 600;">{{$a->nom}}</div>
                                                    <!--<div style="font-size: 0.85rem; color: var(--gray-600);">GBH 2-26</div>-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$a->categorie->nom}}</td>
                                        <td><strong>{{$a->prix}} FCFA</strong></td>
                                        <td><span class="badge-success">{{$a->stock}} en stock</span></td>
                                        <td><span class="badge-success">{{$a->statut ? 'Publié' : 'En attente'}}</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn" title="Modifier"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn" title="Dupliquer"><i class="fas fa-copy"></i></button>
                                                <button class="action-btn delete" title="Supprimer"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@include('partials.footer')