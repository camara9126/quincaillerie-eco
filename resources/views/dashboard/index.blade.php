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
                        <a href="#" style="color: var(--primary); text-decoration: none; font-weight: 500;">Voir tout →</a>
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
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                <div class="product-img">
                                                    <i class="fas fa-tools"></i>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600;">Perceuse Bosch Pro</div>
                                                    <div style="font-size: 0.85rem; color: var(--gray-600);">GBH 2-26</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Outillage électrique</td>
                                        <td><strong>85 000 FCFA</strong></td>
                                        <td><span class="badge-success">45 en stock</span></td>
                                        <td><span class="badge-success">Publié</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn" title="Modifier"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn" title="Dupliquer"><i class="fas fa-copy"></i></button>
                                                <button class="action-btn delete" title="Supprimer"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                <div class="product-img">
                                                    <i class="fas fa-tools"></i>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600;">Meuleuse Dewalt</div>
                                                    <div style="font-size: 0.85rem; color: var(--gray-600);">125mm 850W</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Outillage électrique</td>
                                        <td><strong>65 000 FCFA</strong></td>
                                        <td><span class="badge-success">32 en stock</span></td>
                                        <td><span class="badge-success">Publié</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn"><i class="fas fa-copy"></i></button>
                                                <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                <div class="product-img">
                                                    <i class="fas fa-tools"></i>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600;">Ciment Dangote</div>
                                                    <div style="font-size: 0.85rem; color: var(--gray-600);">42.5R (sac 50kg)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Matériaux</td>
                                        <td><strong>5 000 FCFA</strong></td>
                                        <td><span class="badge-warning">8 en stock</span></td>
                                        <td><span class="badge-success">Publié</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn"><i class="fas fa-copy"></i></button>
                                                <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                <div class="product-img">
                                                    <i class="fas fa-tools"></i>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600;">Échelle télescopique</div>
                                                    <div style="font-size: 0.85rem; color: var(--gray-600);">3.8m aluminium</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Équipement</td>
                                        <td><strong>39 900 FCFA</strong></td>
                                        <td><span class="badge-success">15 en stock</span></td>
                                        <td><span class="badge-success">Publié</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn"><i class="fas fa-copy"></i></button>
                                                <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

@include('partials.footer')