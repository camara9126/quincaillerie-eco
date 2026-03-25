<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Categorie Produit | Eco Business Distribution</title>
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
                            <a href="/" class="nav-item nav-link active">Accueil</a>
                            <a href="{{ route('boutique') }}" class="nav-item nav-link">Boutique</a>
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
                        <a href="https://wa.me/+221771764106" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i
                                class="bi bi-whatsapp me-2"></i>+221771764106</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Categorie Produits</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="/">Accueil</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">{{$categorie->nom}}</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

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


    <!-- Bestseller Products Start -->
    <div class="container-fluid products pt-5">
        <div class="container products-mini py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                    data-wow-delay="0.1s">{{$categorie->nom}}</h4>
                <p class="mb-0 wow fadeInUp" data-wow-delay="0.2s">Liste des produits de categorie {{$categorie->nom}} disponible.</p>
            </div>
            <div class="row g-4">
                @foreach($article as $a)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="products-mini-item border">
                            <div class="row g-0">
                                <div class="col-5">
                                    <div class="products-mini-img border-end h-100">
                                        <img src="{{asset('storage/'. $a->image)}}" class="img-fluid w-100 h-100" alt="Image">
                                        <div class="products-mini-icon rounded-circle bg-primary">
                                            <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="products-mini-content p-3">
                                        <a href="{{route('category', $a->categorie->slug)}}" class="d-block mb-2">{{$a->categorie->nom}}</a>
                                        <a href="{{route('detail', $a->slug)}}" class="d-block h4">{{$a->nom}}</a>
                                        <span class="text-primary fs-5">{{$a->prix}} FCFA</span>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="products-mini-add border p-3">
                                <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                        class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                <div class="d-flex">
                                    <a href="#"
                                        class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                            class="rounded-circle btn-sm-square border"><i
                                                class="fas fa-random"></i></i></a>
                                    <a href="#"
                                        class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                            class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                                </div>
                            </div>-->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Bestseller Products End -->


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