<?php

namespace Model;
use Util\Connection;

class CarRepository{

    public static function listAll(): array{
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM veicolo ORDER BY targa LIMIT 0,10';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * Il metodo listOne mostra a schermo un array che contiene
     * @param string $targa
     * @return array
     */
    public static function listOne(string $targa): array{
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM veicolo WHERE targa = :targa';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                'targa' => $targa
            ]
        );
        $row = $stmt->fetchAll();
        return $row;
    }

    /**
     * Il metodo searchOne cerca all' interno della tabella le maccchine con la stringa inserita (in modo parziale)
     * @param string $targa
     * @return array
     */
    public static function searchOne(string $targa): array{
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM veicolo WHERE targa LIKE :targa';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                'targa' => '%' . $targa .'%'
            ]
        );
        $row = $stmt->fetchAll();
        return $row;
    }

    public static function addCar (string $targa, string $marca , string $modello, string $colore,
                                   string $name_prop, string $surname_prop, string $codice_fiscale ): int{
        $pdo = Connection::getInstance();
        $sql = 'INSERT INTO veicolo (targa,marca,modello,colore,name_prop,surname_prop,codice_fiscale) VALUES (:testo)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                'targa' => $targa,
                'marca' => $marca,
                'modello' =>$modello,
                'colore' => $colore,
                'nome_proprietario' => $name_prop,
                'cognome_proprietario' => $surname_prop,
                'codice_fiscale'=>$codice_fiscale
            ]
        );
        return $stmt->rowCount();
    }

    public static function completa(int $id): bool{
        $pdo = Connection::getInstance();
        $sql = 'UPDATE todo SET completato = 1 WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        if ($stmt->rowCount() == 1)
            return true;
        return false;
    }

    public static function getCar(string $targa, string $marca , string $modello, string $colore, int $id): array{
        $pdo = Connection::getInstance();
        $sql = 'SELECT targa,marca,modello,colore FROM veicolo WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                'id' => $id
            ]
        );
        $row = $stmt->fetch();
        return $row;
    }


    public static function updateCar(string $targa, string $marca , string $modello, string $colore, int $id): bool{
        $pdo = Connection::getInstance();
        $sql = 'UPDATE veicolo SET targa = :targa, marca =:marca, modello =:modello, colore =:colore WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'targa' => $targa,
            'marca' => $marca,
            'modello' => $modello,
            'colore' => $colore,
            'id' => $id
        ]);
        if ($stmt->rowCount() == 1)
            return true;
        return false;
    }

    public static function delete(int $id):bool
    {
        $pdo = Connection::getInstance();
        $sql = 'DELETE FROM veicolo WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        if ($stmt->rowCount() == 1)
            return true;
        return false;
    }
}