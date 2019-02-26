<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <style>
            body {

            }

            td {
                min-width: 150px;
            }
        </style>
    </head>
    <body>

        <strong>ESPACE YAMBAE</strong><br>
        4625 Av du Parc<br>
        H2V 4E4, Montréal<br>
        +1 (514) 585-6784<br>
        espaceyambae@gmail.com<br><br>


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


    </body>
</html>
