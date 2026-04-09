<?php

    use App\Models\Article;
    use App\Models\Bon_commande;
    use App\Models\Categorie;
    use App\Models\Client;
    use App\Models\Devis;
    use App\Models\Vente;

    $categories= Categorie::latest()->get();
    $articles= Article::latest()->get();
    $clients= Client::latest()->get();
    $commandes= Vente::latest()->get();
    $devis= Devis::latest()->get();
    $bonCommandes= Bon_commande::latest()->get();

?>
       <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>
                   <img src="{{asset('images/logo-blanc.jpeg')}}" width="100" alt="">
                </h2>
                <p>Dashboard d'administration</p>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="">
                            <i class="fas fa-chart-pie"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('articles.index') }}">
                            <i class="fas fa-box"></i>
                            <span>Articles</span>
                            <span class="badge">{{$articles->count()}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categorie.index') }}">
                            <i class="fas fa-tags"></i>
                            <span>Catégories</span>
                            <span class="badge">{{$categories->count()}}</span>
                        </a>
                    </li>

                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="{{ route('fournisseurs.index') }}">
                            <i class="fas fa-truck"></i>
                            <span>Fournisseurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mouvements') }}">
                            <i class="fas fa-bars-staggered"></i>
                            <span>Mouvement stock</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bonCommande.index') }}">
                            <i class="fas fa-list"></i>
                            <span>Bon de commande</span>
                            <span class="badge">{{$bonCommandes->count()}}</span>
                        </a>
                    </li>


                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="{{ route('clients.index') }}">
                           <i class="fas fa-users"></i>
                            <span>Client</span>
                            <span class="badge">{{$clients->count()}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('commandes.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Commandes</span>
                            <span class="badge">{{$commandes->count()}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('devis.index') }}">
                            <i class="fas fa-file-invoice"></i>
                            <span>Devis</span>
                            <span class="badge">{{$devis->count()}}</span>
                        </a>
                    </li>

                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="{{ route('paiements.index') }}">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Paiements</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('recettes.index') }}">
                            <i class="fas fa-right-left"></i>
                            <span>Recettes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('depenses.index') }}">
                            <i class="fas fa-arrow-right-from-bracket"></i>
                            <span>Depenses</span>
                        </a>
                    </li>

                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="{{ route('rapports') }}">
                            <i class="fas fa-chart-bar"></i>
                            <span>Rapports</span>
                        </a>
                    </li>
                    
                    <!--<li>
                        <a href="#">
                            <i class="fas fa-star"></i>
                            <span>Avis</span>
                        </a>
                    </li>-->

                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="{{ route('parametre') }}">
                            <i class="fas fa-cog"></i>
                            <span>Paramètres</span>
                        </a>
                    </li>
                    
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Déconnexion</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>
