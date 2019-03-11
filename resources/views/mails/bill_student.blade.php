<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <style>
            table {
                margin-left: 140px;
            }

            td {
                min-width: 150px;
            }

            .logo {
                float: left;
            }

            .coords {
                float: left;
                padding: 50px 0 0 180px;
            }

            .content {
                padding-top: 170px;
            }

            .logo img{
                height: 200px;
            }

            h2 {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="logo">
            <a href="https://www.espaceyambae.com/">
                <img src="https://static.wixstatic.com/media/920d8e_7f9b58e695c749d69eece01a9127f7d0~mv2.png">
            </a>
        </div>

        <div class="coords">
            <strong>ESPACE YAMBAE</strong><br>
            4625 Av du Parc<br>
            H2V 4E4, Montréal<br>
            +1 (514) 585-6784<br>
            espaceyambae@gmail.com<br><br>
        </div>

        <div class="content">
            <h2>Votre facture</h2>

            <table>
                {{-- DATE --}}
            <tr>
                    <td><strong>Date</strong></td>
                    <td>{{ $bill->created_at->format('Y-m-d') }}</td>
                </tr>

                {{-- PRODUCT --}}
                <tr>
                    <td><strong>Produit</strong></td>
                    <td>{{ $bill->product->label }}</td>
                </tr>


                @if ($bill->product->isSessionSalsa())
                    {{-- SESSION --}}
                    <tr>
                        <td><strong>Session</strong></td>
                        <td>{{ $bill->session->label }}</td>
                    </tr>

                    {{-- LEVEL --}}
                    <tr>
                        <td><strong>Niveau</strong></td>
                        <td>{{ $bill->level->label }}</td>
                    </tr>
                @endif

                {{-- QUANTITY --}}
                <tr>
                    <td><strong>Quantité</strong></td>
                    <td>1</td>
                </tr>

                {{-- PRICE --}}
                <tr>
                    <td><strong>Prix HT</strong></td>
                    <td>{{ $bill->getPriceHT() }} $</td>
                </tr>

                {{-- TAXES --}}
                <tr>
                    <td><strong>Taxes</strong></td>
                    <td>{{ $bill->getTaxesAmount() }} $</td>
                </tr>

                {{-- PRICE TOTAL --}}
                <tr>
                    <td><strong>Prix total</strong></td>
                    <td>{{ $bill->price }} $</td>
                </tr>
            </table>
        </div>

    </body>
</html>
