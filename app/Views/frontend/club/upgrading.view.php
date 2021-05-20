<?php

use App\core\Config;
?>
<div class="container py-5">

<h2 class="text-uppercase text-center mb-5 pb-3">Surclassement</h2>
    <div class="table-responsive  text-white">
        <table class="table  text-white table-striped pb-5 mb-5">
            <thead>
                <tr class="">
                    <th scope="col">Categories</th>
                    <th scope="col">date de naissance</th>
                    <th scope="col">Competitons D"partementale</th>
                    <th scope="col">Competitons Régionnale</th>
                    <th scope="col">Competitons Nationale</th>
                </tr>
            </thead>
            <tbody>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U20']); ?>
                    <td>AUTOMATIQUE </td>
                    <td>AUTOMATIQUE </td>
                    <td>AUTOMATIQUE </td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U19']); ?>
                    <td>AUTOMATIQUE </td>
                    <td>AUTOMATIQUE </td>
                    <td>AUTOMATIQUE </td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U18']); ?>
                    <td class="p-auto">Vers U23 ou Senior 3x3 : <br> <span class="text-success">Médecin de Famille</span> </td>
                    <td class="p-auto">Vers U23 ou Senior 3x3 : <br> <span class="text-success">Médecin de Famille</span> </td>
                    <td class="p-auto">Vers U23 ou Senior 3x3 : <br> <span class="text-success">Médecin de Famille</span> </td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U17']); ?>
                    <td class="m-auto">Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : Médecin de famille</td>
                    <td>Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : Médecin de famille</td>
                    <td>Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : Médecin de famille</td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U16', 'Masculin']); ?>
                    <td>Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : <span class="text-danger">Impossible</span> </td>
                    <td>Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : <span class="text-danger">Impossible</span> </td>
                    <td>Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : Médecin fédéral + avis DTN </td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U16', 'Feminin']); ?>
                    <td>Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : <span class="text-primary">Médecin agréé</span></td>
                    <td>Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : <span class="text-primary">Médecin agréé</span></td>
                    <td>Vers U20 : <span class="text-success">Médecin de Famille</span> <br>Vers Senior : Médecin Régional</td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U15', 'Masculin']); ?>
                    <td>Vers U17 : <span class="text-success">Médecin de Famille</span></td>
                    <td>Vers U17 : <span class="text-primary">Médecin agréé</span></td>
                    <td>Vers U18 : Médecin fédéral + avis DTN</td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U15', 'Feminin']); ?>
                    <td>Vers U18 à U20 : <span class="text-success">Médecin de Famille</span> <br> Pour 3x3 vers U18 : <span class="text-success">Médecin de Famille</span></td>
                    <td>Vers U18 à U20 : <span class="text-primary">Médecin agréé</span> <br> Pour 3x3 vers U18 : <span class="text-success">Médecin de Famille</span></td>
                    <td>Vers U18 à U20 : <span class="text-primary">Médecin agréé</span> <br> Vers Senior : Médecin fédéral + avis DTN</td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U14', 'Masculin (hors 3x3)']); ?>
                    <td>Vers U17 : <span class="text-primary">Médecin agréé</span></td>
                    <td>Vers U17 : <span class="text-primary">Médecin agréé</span></td>
                    <td>Vers U17 à U18 : Médecin fédéral + avis DTN</td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U13', '(hors 3x3)']); ?>
                    <td>Vers U15 : <span class="text-success">Médecin de Famille</span></td>
                    <td>Vers U15 : <span class="text-primary">Médecin agréé</span></td>
                    <td>Vers U15 : Médecin fédéral + avis DTN</td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U12', ' (hors 3x3)']); ?>
                    <td>Vers U15 : <span class="text-success">Médecin de Famille</span></td>
                    <td>Vers U15 : <span class="text-primary">Médecin agréé</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U11', ' (hors 3x3)']); ?>
                    <td>Vers U13 : <span class="text-success">Médecin de Famille</span></td>
                    <td>Vers U13 : <span class="text-primary">Médecin agréé</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U10', ' (hors 3x3)']); ?>
                    <td><span class="text-danger">Impossible</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U9', ' (hors 3x3)']); ?>
                    <td>Vers U11 : <span class="text-success">Médecin de Famille</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U8', ' (hors 3x3)']); ?>
                    <td><span class="text-danger">Impossible</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                </tr>
                <tr class="m-auto ">
                    <?= Config::categorieName(['U7', ' (hors 3x3)']); ?>
                    <td>Vers U9 : <span class="text-success">Médecin de Famille</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                    <td><span class="text-danger">Impossible</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>