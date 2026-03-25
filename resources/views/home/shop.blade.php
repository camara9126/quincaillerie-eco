<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Boutique | Eco Business Distribution</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="quincaillerie, btp, matériaux construction, outillage" name="keywords">
    <meta content="Votre quincaillerie de confiance pour tous vos projets de construction et rénovation" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

     <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Icon Logo -->
     <link rel="shortcut icon" href="{{asset('images/logo-vert.jpeg')}}"/>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none border-bottom d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="#" class="text-muted me-2"> Aide</a><small> / </small>
                    <a href="#" class="text-muted mx-2"> Support</a><small> / </small>
                    <a href="#" class="text-muted ms-2"> Contact</a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                <small class="text-dark">Appelez-nous :</small>
                <a href="tel:+221776512724" class="text-muted">+221776512724</a>
            </div>

            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted ms-2" data-bs-toggle="dropdown"><small><i
                                    class="fa fa-home me-2"></i> Mon Compte</small></a>
                        <div class="dropdown-menu rounded">
                            @auth
                                <a href="{{ route('dashboard') }}" class="dropdown-item"> Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="dropdown-item"> Connexion</a>
                            @endauth
                            <!--<a href="#" class="dropdown-item"> Wishlist</a>-->
                            <a href="#" class="dropdown-item"> Mon Panier</a>
                            <!--<a href="#" class="dropdown-item"> Notifications</a>-->
                            <!--<a href="#" class="dropdown-item"> Paramètres</a>-->
                            <!--<a href="#" class="dropdown-item"> Mon Profil</a>-->
                            <!--<a href="#" class="dropdown-item"> Déconnexion</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5 py-4 d-none d-lg-block">
        <div class="row gx-0 align-items-center text-center">
            <div class="col-md-4 col-lg-3 text-center text-lg-start">
                <div class="d-inline-flex align-items-center">
                    <a href="/" class="navbar-brand p-0">
                        <img src="{{asset('images/logo-vert.jpeg')}}" width="90" alt="">
                        <h1 class="display-5 text-primary m-0">
                            <!--<i class="fas fa-tools text-secondary me-2"></i>BTP Matériaux-->
                        </h1>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 text-center">
                <div class="position-relative ps-4">
                    <form method="get" action="{{route('recherche')}}">
                        <div class="d-flex border rounded-pill">
                            <input class="form-control border-0 rounded-pill py-3" type="text" name="search" placeholder="Rechercher un produit...">
                        
                            <button type="submit" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a href="#" class="text-muted d-flex align-items-center justify-content-center me-3"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-random"></i></span></a>
                    <a href="#" class="text-muted d-flex align-items-center justify-content-center me-3"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-heart"></i></span></a>
                    <a href="#" class="text-muted d-flex align-items-center justify-content-center"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-shopping-cart"></i></span>
                        <span class="text-dark ms-2">0 FCFA</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar p-0">
        <div class="row gx-0 bg-primary px-5 align-items-center">
            <div class="col-lg-3 d-none d-lg-block">
                <nav class="navbar navbar-light position-relative" style="width: 250px;">
                    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#allCat">
                        <h4 class="m-0"><i class="fa fa-bars me-2"></i>Toutes catégories</h4>
                    </button>
                    <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                        <div class="navbar-nav ms-auto py-0">
                            <ul class="list-unstyled categories-bars">
                                @foreach($categories as $c)
                                    <li>
                                        <div class="categories-bars-item">
                                            <a href="{{ route('category', $c->slug)}}">{{$c->nom}}</a>
                                            <span>({{$c->article->count()}})</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                    <a href="/" class="navbar-brand d-block d-lg-none">
                        <img src="{{asset('images/logo-blanc.jpeg')}}" width="80" alt="">
                        <h1 class="display-5 text-primary m-0">
                            <!--<i class="fas fa-tools text-secondary me-2"></i>BTP Matériaux-->
                        </h1>
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars fa-1x"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="/" class="nav-item nav-link">Accueil</a>
                            <a href="{{ route('boutique') }}" class="nav-item nav-link active">Boutique</a>
                            <!--<a href="#" class="nav-item nav-link">Fiche produit</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0">
                                    <a href="bestseller.html" class="dropdown-item">Meilleures ventes</a>
                                    <a href="cart.html" class="dropdown-item">Panier</a>
                                    <a href="cheackout.html" class="dropdown-item">Commander</a>
                                    <a href="404.html" class="dropdown-item">404</a>
                                </div>
                            </div>-->
                            <a href="{{ route('contact') }}" class="nav-item nav-link me-2">Contact</a>
                            <div class="nav-item dropdown d-block d-lg-none mb-3">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Catégories</a>
                                <div class="dropdown-menu m-0">
                                    <ul class="list-unstyled categories-bars">
                                        @foreach($categories as $c)
                                            <li>
                                                <div class="categories-bars-item">
                                                    <a href="#">{{$c->nom}}</a>
                                                    <span>({{$c->article->count()}})</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="https://wa.me/+221776512724" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i
                                class="bi bi-whatsapp me-2"></i>+221771764106</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Carousel Start -->
    <div class="container-fluid carousel bg-light px-0">
        <div class="row g-0 justify-content-end">
            <div class="col-12 col-lg-7 col-xl-9">
                <div class="header-carousel owl-carousel bg-light py-5">
                    <div class="row g-0 header-carousel-item align-items-center">
                        <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                            <img src="{{asset('assets/img/menuisier.jpg')}}" class="img-fluid w-100" alt="Outillage professionnel">
                        </div>
                        <div class="col-xl-6 carousel-content p-3">
                            <h4 class="text-uppercase fw-bold mb-2 wow fadeInRight" data-wow-delay="0.1s"
                                style="letter-spacing: 2px;">Jusqu'à -25%</h4>
                            <!--<h5 class="display-3 text-capitalize mb-2 wow fadeInRight" data-wow-delay="0.3s">Sur l'outillage électroportatif</h5>-->
                            <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">Perceuses, meuleuses, visseuses professionnelles</p>
                            <a class="btn btn-primary rounded-pill py-2 px-3 wow fadeInRight" data-wow-delay="0.7s"
                                href="#">Je profite</a>
                        </div>
                    </div>
                    <div class="row g-0 header-carousel-item align-items-center">
                        <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                            <img src="{{asset('assets/img/project.png')}}" class="img-fluid w-100" alt="Matériaux construction">
                        </div>
                        <div class="col-xl-6 carousel-content p-3">
                            <h4 class="text-uppercase fw-bold mb-2 wow fadeInRight" data-wow-delay="0.1s"
                                style="letter-spacing: 3px;">Promo chantier</h4>
                            <!--<h5 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">Ciment, fer à béton, parpaings</h5>-->
                            <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">Livraison rapide sur tous vos chantiers</p>
                            <a class="btn btn-primary rounded-pill py-2 px-3 wow fadeInRight" data-wow-delay="0.7s"
                                href="#">Voir les offres</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-12 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
                <div class="carousel-header-banner h-100">
                    <img src="{{asset('assets/img/Perceuse.jpg')}}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Quincaillerie">
                    <div class="carousel-banner-offer">
                        <p class="bg-primary text-white rounded fs-3 py-2 px-3 mb-0 me-3">-15 000 FCFA</p>
                        <p class="text-primary fs-3 fw-bold mb-0">Offre spéciale</p>
                    </div>
                    <div class="carousel-banner">
                        <div class="carousel-banner-content text-center p-4">
                            <a href="#" class="d-block mb-2">Perceuse pro</a>
                            <a href="#" class="d-block text-white fs-3">Bosch GBH 2-26 <br> 850W</a>
                            <del class="me-2 text-white fs-3">125 000 FCFA</del>
                            <span class="text-primary fs-2">110 000 FCFA</span>
                        </div>
                        <a href="#" class="btn btn-primary rounded-pill py-2 px-4"><i
                                class="fas fa-shopping-cart me-2"></i> Ajouter</a>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Services Start -->
    <div class="container-fluid px-0">
        <div class="row  g-0">
            <div class="col-6 col-md-6 col-lg-6 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
                <div class="p-4">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-truck fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Livraison partout</h6>
                            <!--<p class="mb-0">À partir de 50 000 FCFA</p>-->
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-6 col-md-6 col-lg-6 border-end wow fadeInUp" data-wow-delay="0.6s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Service rapide</h6>
                            <!--<p class="mb-0">Traitement 24h</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!--<div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.2s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-undo-alt fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Retour gratuit</h6>
                            <p class="mb-0">Satisfait ou remboursé</p>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.3s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-headset fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Support 24/7</h6>
                            <p class="mb-0">À votre écoute</p>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-gift fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Carte cadeau</h6>
                            <p class="mb-0">Offrez un cadeau utile</p>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-shield-alt fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Paiement sécurisé</h6>
                            <p class="mb-0">Orange Money, Wave, carte</p>
                        </div>
                    </div>
                </div>
            </div>-->

    </div>
    <!-- Services End -->


    <!-- Products Offer Start -->
    <!--<div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                        <div>
                            <p class="text-muted mb-3">Find The Best Camera for You!</p>
                            <h3 class="text-primary">Smart Camera</h3>
                            <h1 class="display-3 text-secondary mb-0">40% <span
                                    class="text-primary fw-normal">Off</span></h1>
                        </div>
                        <img src="img/product-1.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                        <div>
                            <p class="text-muted mb-3">Find The Best Whatches for You!</p>
                            <h3 class="text-primary">Smart Whatch</h3>
                            <h1 class="display-3 text-secondary mb-0">20% <span
                                    class="text-primary fw-normal">Off</span></h1>
                        </div>
                        <img src="img/product-2.png" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Products Offer End -->


    <!-- Shop Page Start -->
    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-3 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <form method="get" action="{{route('recherche')}}">
                        <div class="d-flex border rounded-pill">
                            <input class="form-control border-0 rounded-pill py-3" type="text" name="search" placeholder="Rechercher un produit...">
                        
                            <button type="submit" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <div class="product-categories mb-4">
                        <h4>Categories Articles</h4>
                        <ul class="list-unstyled">
                            @foreach($categories as $c)
                                <li>
                                    <div class="categories-item">
                                        <a href="{{ route('category', $c->slug)}}" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                            {{$c->nom}}</a>
                                        <span>({{$c->article->count()}})</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--<div class="additional-product mb-4">
                        <h4>Select By Color</h4>
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages">
                            <label for="Categories-1" class="text-dark"> Gold</label>
                        </div>
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages">
                            <label for="Categories-2" class="text-dark"> Green</label>
                        </div>
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="Categories-3" name="Categories-1" value="Beverages">
                            <label for="Categories-3" class="text-dark"> White</label>
                        </div>
                    </div>
                    <div class="featured-product mb-4">
                        <h4 class="mb-3">Produits phares</h4>
                        @foreach($phares as $p)
                            <div class="featured-product-item">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="{{asset('storage/'. $p->image)}}" class="img-fluid rounded" alt="Image">
                                </div>
                                <div>
                                    <h6 class="mb-2">{{$p->nom}}</h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">{{$p->prix}} FCFA</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="d-flex justify-content-center my-4">
                                <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w-100">Voir Plus</a>
                            </div>
                        
                    </div>-->
                    <!--<a href="#">
                        <div class="position-relative">
                            <img src="img/product-banner-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center rounded p-4"
                                style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(242, 139, 0, 0.3);">
                                <h5 class="display-6 text-primary">SALE</h5>
                                <h4 class="text-secondary">Get UP To 50% Off</h4>
                                <a href="#" class="btn btn-primary rounded-pill px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>-->
                </div>
                <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded mb-4 position-relative">
                        <img src="{{asset('assets/img/luminaire.png')}}" class="img-fluid rounded w-100" style="height: 250px;"
                            alt="Image">
                        <div class="position-absolute rounded d-flex flex-column align-items-center justify-content-center text-center"
                            style="width: 100%; height: 250px; top: 0; left: 0; background: rgba(242, 139, 0, 0.3);">
                            <h4 class="display-5 text-primary">Vente</h4>
                            <h3 class="display-4 text-white mb-4">Jusqu'à 50 % de réduction</h3>
                            <a href="#" class="btn btn-primary rounded-pill">Achetez maintenant</a>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-xl-7">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <!--<div class="col-xl-3 text-end">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                                <label for="electronics">Sort By:</label>
                                <select id="electronics" name="electronicslist"
                                    class="border-0 form-select-sm bg-light me-3" form="electronicsform">
                                    <option value="volvo">Default Sorting</option>
                                    <option value="volv">Nothing</option>
                                    <option value="sab">Popularity</option>
                                    <option value="saab">Newness</option>
                                    <option value="opel">Average Rating</option>
                                    <option value="audio">Low to high</option>
                                    <option value="audi">High to low</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="col-lg-4 col-xl-2">
                            <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4">
                                <li class="nav-item me-4">
                                    <a class="bg-light" data-bs-toggle="pill" href="#tab-5">
                                        <i class="fas fa-th fa-3x text-primary"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="bg-light" data-bs-toggle="pill" href="#tab-6">
                                        <i class="fas fa-bars fa-3x text-primary"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-5" class="tab-pane fade show p-0 active">
                            <div class="row g-4 product">
                                @foreach($articles as $a)
                                    <div class="col-6 col-lg-4">
                                        <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="product-item-inner border rounded">
                                                <div class="product-item-inner-item">
                                                    <img src="{{asset('storage/'. $a->image)}}" class="img-fluid w-100 rounded-top" alt="">
                                                    @if($a->etiquette == 'nouveau')
                                                        <div class="product-new">New</div>
                                                    @elseif($a->etiquette == 'promo')
                                                        <div class="product-sale">Promo</div>
                                                    @endif
                                                    <div class="product-details">
                                                        <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                                                    </div>
                                                </div>
                                                <div class="text-center rounded-bottom p-1">
                                                    <a href="{{ route('category', $a->categorie->slug)}}" class="d-block mb-2">{{$a->categorie->nom}}</a>
                                                    <a href="{{ route('detail', $a->slug)}}" class="d-block h5">{{$a->nom}}</a>
                                                    <!--<del class="me-2 fs-5">$1,250.00</del>-->
                                                    <span class="text-primary fs-5">{{$a->prix}} FCFA</span>
                                                </div>
                                            </div>
                                            <!--<div
                                                class="product-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                                                <a href="#"
                                                    class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                                        class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="#"
                                                            class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                                class="rounded-circle btn-sm-square border"><i
                                                                    class="fas fa-random"></i></i></a>
                                                        <a href="#"
                                                            class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                                class="rounded-circle btn-sm-square border"><i
                                                                    class="fas fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="tab-6" class="products tab-pane fade show p-0">
                            <div class="row g-4 products-mini">
                                @foreach($articles as $a)
                                    <div class="col-lg-6">
                                        <div class="products-mini-item border">
                                            <div class="row g-0">
                                                <div class="col-5">
                                                    <div class="products-mini-img border-end h-100">
                                                        <img src="{{asset('storage/'. $a->image)}}" class="img-fluid w-100 h-100"
                                                            alt="Image">
                                                        <div class="products-mini-icon rounded-circle bg-primary">
                                                            <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="products-mini-content p-3">
                                                        <a href="{{ route('category', $a->categorie->slug)}}" class="d-block mb-2">{{$a->categorie->nom}}</a>
                                                        <a href="{{ route('detail', $a->slug)}}" class="d-block h4">{{$a->nom}}</a>
                                                        <span class="text-primary fs-5">{{$a->prix}} FCFA</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="products-mini-add border p-3">
                                                <a href="#"
                                                    class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                                        class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                                <div class="d-flex">
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                            class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-random"></i></i></a>
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                            class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-heart"></i></a>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        {{$articles->links()}}
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page End -->

    <!-- Product Banner Start -->
    <div class="container-fluid py-5">
        <div class="container pb-5">
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <a href="#">
                        <div class="bg-primary rounded position-relative">
                            <img src="{{asset('assets/img/porte.jpeg')}}" class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                                style="background: rgba(255, 255, 255, 0.5);">
                                <h3 class="display-5 text-primary">EOS Rebel <br> <span>T7i Kit</span></h3>
                                <p class="fs-4 text-muted">150000 FCFA</p>
                                <a href="#" class="btn btn-primary rounded-pill align-self-start py-2 px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                    <a href="#">
                        <div class="text-center bg-primary rounded position-relative">
                            <img src="{{asset('assets/img/aluminium.png')}}" class="img-fluid w-100" alt="">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                                style="background: rgba(242, 139, 0, 0.5);">
                                <h2 class="display-2 text-secondary">Vente</h2>
                                <h4 class="display-5 text-white mb-4">Get UP To 50% Off</h4>
                                <a href="#" class="btn btn-secondary rounded-pill align-self-center py-2 px-4">Shop
                                    Now</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Banner End -->


    <!-- Footer Start -->
    <div class="container-fluid footer py-4 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-4">
            <div class="row g-2 rounded mb-3" style="background: rgba(255, 255, 255, .03);">
                <div class="col-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-3">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 50px; height: 50px;">
                            <i class="fas fa-map-marker-alt fa-1x text-primary"></i>
                        </div>
                        <div>
                            <h2 class="text-white">Adresse</h2>
                            <p class="mb-2"> Passage à niveau, Diamaguène, Saint-Louis</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-3">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope fa-1x text-primary"></i>
                        </div>
                        <div>
                            <h2 class="text-white">Email</h2>
                            <p class="mb-2">contact@ecobusinessdistribution</p>
                        </div>
                    </div>
                </div>
                <div class=" col-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-3">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt fa-1x text-primary"></i>
                        </div>
                        <div>
                            <h2 class="text-white">Téléphone</h2>
                            <p class="mb-2">+221 33 961 19 68</p>
                            <p class="mb-2">+221 77 651 27 24</p>
                            <p class="mb-2">+221 70 808 61 68</p>
                        </div>
                    </div>
                </div>
                <div class=" col-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-3">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-whatsapp fa-1x text-primary"></i>
                        </div>
                        <div>
                            <h2 class="text-white">WhatsApp</h2>
                            <p class="mb-2"><a href="https://wa.me/+221771764106" class="text-muted">+221771764106</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <div class="footer-item">
                            <h2 class="text-primary mb-4">Newsletter</h2>
                            <p class="mb-3">Recevez nos offres et nouveautés</p>
                            <div class="position-relative mx-auto rounded-pill">
                                <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                    placeholder="Votre email">
                                <button type="button"
                                    class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Service client</h4>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Contact</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Retours</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Historique</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Plan du site</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Avis</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Mon compte</a>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Informations</h4>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> À propos</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Livraison</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Confidentialité</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Conditions</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Garantie</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> FAQ</a>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-primary mb-4">Paiement</h4>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Orange Money</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Wave</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Carte bancaire</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Paypal</a>
                        <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Virement</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href="#" class="border-bottom text-white"><i
                                class="fas fa-copyright text-light me-2"></i>Eco Business Distribution</a>, Tous droits réservés.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">
                    Designed By <a class="border-bottom text-white" href="https://bcmgroupe.com">BCM Groupe 2026</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>