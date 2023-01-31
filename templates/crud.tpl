<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $cars
 * @var $testo
 * @var $id
 */
?>

<?php $this->layout('home', ['titolo' => 'Esempio CRUD']) ?>

<h1>Ricerca Veicoli</h1>

<form action="index.php" method="post">
    <input type="text" name="targa">
    <input type="submit">
</form>

<?php if(count($cars)==0):?>
<p>Non Ci sono Macchine con quella targa</p>
<?php else:?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Targa</th>
            <th>Marca</th>
            <th>Modello</th>
            <th>Colore</th>
            <th>Nome Prop.</th>
            <th>Cognome Prop.</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cars as $car):?>
            <tr>
                <td><?= $car['targa']?></td>
                <td><?= $car['modello']?></td>
                <td><?= $car['marca']?></td>
                <td><?= $car['colore']?></td>
                <td><?= $car['nome_proprietario']?></td>
                <td><?= $car['cognome_proprietario']?></td>
            </tr>

        <?php endforeach;?>
    </tbody>
</table>
<?php endif;?>

