<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Devis N° {{ $devis->reference }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:5px; }

        th { background:#f2f2f2; }
        /* Pied de page */
        .invoice-footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }
        
        .footer-left {
            display: flex;
            flex-direction: column;
        }
        
        .footer-right {
            text-align: right;
        }

        .status-paid {
            background-color: #2ecc71;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            justify-content: center;
        }
        
    </style>
</head>
<body>
        <!-- Content Area -->
        <div class="content">
            <!-- Page Header -->
            <div class="card-header">
                <img src="{{ public_path('images/logo-blanc.jpeg') }}" style="width: 150px; height: 100px;" alt="Logo entreprise" class="">
            </div>
            <div class="card-body">

                <!-- INFOS ENTREPRISE -->
                <div class="mb-4">
                    <h4>{{ $devis->entreprise->nom ?? 'Entreprise' }}</h4>
                    <p>Date : {{ $devis->date_devis }}</p>
                    <p>Référence : {{ $devis->reference }}</p>

                    <p>
                        Statut :
                        @if($devis->statut == 'en_attente')
                            <span class="badge bg-warning">En attente</span>
                        @elseif($devis->statut == 'valide')
                            <span class="badge bg-success">Validé</span>
                        @else
                            <span class="badge bg-danger">Refusé</span>
                        @endif
                    </p>
                </div>

                <!-- CLIENT -->
                <div class="mb-4">
                    <h5>Client</h5>
                    <p>Nom : {{ $devis->client->nom }}</p>
                    <p>Téléphone : {{ $devis->client->telephone ?? '-' }}</p>
                </div>

                <!-- TABLE PRODUITS -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($devis->details as $detail)
                            <tr>
                                <td>{{ $detail->article->nom ?? '-' }}</td>
                                <td>{{ $detail->quantite }}</td>
                                <td>{{ number_format($detail->prix_unitaire, 0, ',', ' ') }} FCFA</td>
                                <td>{{ number_format($detail->total, 0, ',', ' ') }} FCFA</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- TOTAL -->
                <div class="text-end mt-3">
                    <h4>Total : {{ number_format($devis->total, 0, ',', ' ') }} FCFA</h4>
                </div>
            </div>
        </div>

      <!-- Pied de page -->
        <div class="invoice-footer">
            <!--<div class="footer-left">
                <div>Solutions Pro - SAS au capital de 50 000 €</div>
                <div>RCS Paris 123 456 789 - TVA intracommunautaire FR 12 123456789</div>
            </div>-->
            <div class="footer-right">
                <div class="status-paid">DEVIS VALIDÉ</div>
                <div style="margin-top: 10px; font-size: 12px;">Date de paiement: {{ $devis->created_at->format('d/m/Y') }}</div>
            </div>
        </div>
<p>
    Merci pour votre confiance.
</p>

</body>
</html>
  