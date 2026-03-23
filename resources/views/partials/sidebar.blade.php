<?php

    use App\Models\article;
    use App\Models\categorie;

    $categories= categorie::latest()->get();
    $articles= article::latest()->get();

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
                        <a href="{{ route('article.index') }}">
                            <i class="fas fa-box"></i>
                            <span>Articles</span>
                            <span class="badge">{{$articles->count()}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('article.create') }}">
                            <i class="fas fa-plus-circle"></i>
                            <span>Ajouter un article</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categorie.index') }}">
                            <i class="fas fa-tags"></i>
                            <span>Catégories</span>
                            <span class="badge">{{$categories->count()}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categorie.create') }}">
                           <i class="fas fa-plus-circle"></i>
                            <span>Ajouter un catégorie</span>
                        </a>
                    </li>
                    
                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Commandes</span>
                            <span class="badge">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-users"></i>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-star"></i>
                            <span>Avis</span>
                        </a>
                    </li>

                    <div class="sidebar-divider"></div>

                    <li>
                        <a href="#">
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
