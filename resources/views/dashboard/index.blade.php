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
                <div class="page-header">
                    <h1>Tableau de bord</h1>
                    <div>
                        <button class="btn-outline" style="margin-right: 0.5rem;">
                            <i class="fas fa-download"></i> Exporter
                        </button>
                        <button class="btn-primary">
                            <i class="fas fa-plus"></i> Nouvel article
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Articles</h3>
                            <div class="number">{{$articles->count()}}</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Catégories</h3>
                            <div class="number">{{$categories->count()}}</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Commandes</h3>
                            <div class="number">48</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Clients</h3>
                            <div class="number">324</div>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>


                <!-- Recent Products Table -->
                <div class="card">
                    <div class="card-header">
                        <span><i class="fas fa-box" style="color: var(--primary); margin-right: 0.5rem;"></i> Articles récents</span>
                        <a href="{{ route('article.index') }}" style="color: var(--primary); text-decoration: none; font-weight: 500;">Voir tout →</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Catégorie</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Etiquette</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($article as $a)
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
                                        <td>{{$a->etiquette ?? 'Pas d"etiquette'}}</td>
                                        <td><span class="badge-{{$a->statut ? 'success' : 'warning'}}">{{$a->statut ? 'Publié' : 'En attente'}}</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('article.edit', $a->id) }}" class="action-btn" title="Modifier"><i class="fas fa-edit"></i></a>
                                                <form action="{{route('article.destroy', $a->id)}}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

@include('partials.footer')