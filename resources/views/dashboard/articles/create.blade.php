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
   
                <div class="card">
                    <div class="card-header">
                        <span><i class="fas fa-plus-circle" style="color: var(--primary); margin-right: 0.5rem;"></i> Ajouter un nouvel article</span>
                        <span class="badge-success">Formulaire d'ajout</span>
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

                    <div class="card-body">
                        <form method="post" action="{{ route('article.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Nom du produit *</label>
                                    <input type="text" name="nom" placeholder="Ex: Perceuse Bosch GBH 2-26" required>
                                </div>
                                <div class="form-group">
                                    <label>Catégorie *</label>
                                    <select name="categorie_id" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach($categorie as $c)
                                            <option value="{{$c->id}}">{{$c->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Prix (FCFA) *</label>
                                    <input type="number" name="prix" placeholder="Ex: 85000" required>
                                </div>

                                <div class="form-group">
                                    <label>Stock *</label>
                                    <input type="number" name="stock" placeholder="Ex: 50" required>
                                </div>
                               
                                <div class="form-group full-width">
                                    <label>Description </label>
                                    <textarea rows="4" name="description" placeholder="Description complète, caractéristiques..."></textarea>
                                </div>

                                <div class="form-group full-width">
                                    <label>Images du produit</label>
                                    <div class="image-upload">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <input type="file" name="image" class="form-file">Cliquez ou glissez-déposez des images ici
                                        <p style="font-size: 0.85rem; color: var(--gray-600);">PNG, JPG jusqu'à 5MB</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Images galerie 1</label>
                                    <div class="image-upload">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <input type="file" name="gal_1" class="form-file">Cliquez ou glissez-déposez des images ici
                                        <p style="font-size: 0.85rem; color: var(--gray-600);">PNG, JPG jusqu'à 5MB</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Images galerie 2</label>
                                    <div class="image-upload">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <input type="file" name="gal_2" class="form-file">Cliquez ou glissez-déposez des images ici
                                        <p style="font-size: 0.85rem; color: var(--gray-600);">PNG, JPG jusqu'à 5MB</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Statut</label>
                                    <select>
                                        <option value="1">Publié</option>
                                        <option value="0">En attente</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Étiquettes</label>
                                    <input type="text" name="etiquette" placeholder="Ex: promotion, nouveau, vedette">
                                </div>
                            </div>
                            <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1rem;">
                                <a href="{[ route(categorie.index') }}" type="button" class="btn-outline">Annuler</a>
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer l'article
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

@include('partials.footer')