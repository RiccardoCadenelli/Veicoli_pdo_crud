<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $cars
 * @var $testo
 * @var $id
 */
?>

<?php $this->layout('home', ['titolo' => 'Listo automobili']) ?>

<h1>Ricerca Veicoli</h1>

<form action="index.php" method="post">
    <input type="text" name="targa">
    <input type="submit">
</form>

<h1>Aggiunta e modifica caratteristiche veicoli</h1>
<form action="index.php" method="post" class="form-horizontal">
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="input-example-1">Targa</label>
        </div>
        <div class="col-9 col-sm-12">
            <label class="form-input" type="text" id="input-example-1" placeholder="Targa"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="input-example-1">Marca</label>
        </div>
        <div class="col-9 col-sm-12">
            <label class="form-input" type="text" id="input-example-1" placeholder="Marca"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="input-example-1">Modello</label>
        </div>
        <div class="col-9 col-sm-12">
            <label class="form-input" type="text" id="input-example-1" placeholder="Modello"></label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="input-example-1">Colore</label>
        </div>
        <div class="col-9 col-sm-12">
            <label class="form-input" type="text" id="input-example-1" placeholder="Colore"></label>
        </div>
    </div>


    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="input-example-1">Proprietario</label>
        </div>
        <div class="col-9 col-sm-12">
            <label class="form-label form-inline">
                <input type="text" name="nome_proprietario">
            </label>
            <label class="form-label form-inline">
                <input type="text" name="cognome_proprietario">
            </label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="input-example-1">Codice Fiscale</label>
        </div>
        <div class="col-9 col-sm-12">
            <label class="form-input" type="text" id="input-example-1" placeholder="Codice Fiscale"></label>
        </div>
    </div>
    Targa:<input type="text" name="targa"><br>
    Marca:<input type="text" name="marca"><br>
    Modello:<input type="text" name="modello"><br>
    Colore:<input type="text" name="colore"><br>

    Codice fiscale: <input type="text" name="codice_fiscale"><br>

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
            <th>Codice Fiscale</th>
            <th>Modifica</th>
            <th>Elimina</th>
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
                <td><?= $car['codice_fiscale']?></td>
                <td><a href="?action=modifica&id=<?= $car['id']?>">Modifica<i class="icon icon-edit"></i></a></td>
                <td><a href="?action=eliminaa&id=<?= $car['id']?>">Elimina<i class="icon icon-delete"></i></a></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php endif;?>

<!--<select>
    <option>Aggiunta veicolo</option> 'se sono dentro questa action devo creare l'input text della targa
    3 select su modello, marca e colore.'
    <option>Ricerca veicolo</option> 'La parte che adesso è funzionante'
</select>-->