<?php

namespace Ex\App\Resource\App;

use BEAR\Resource\ResourceObject;
use BEAR\Resource\Annotation\Link;
use Ex\Package\Inject\AuraSqlInject;
use Ex\Package\Inject\DbalInject;

class Person extends ResourceObject
{
    use AuraSqlInject;
    use DbalInject;

    public function onGet($id)
    {
        $stmt = $this->pdo->query('SELECT name FROM person WHERE id=:id');
        $stmt->execute(['id' => $id]);
        $this['person'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $this;
    }

    /**
     * @Link(rel="new", href="/person{?id}")
     */
    public function onPost($name)
    {
        $stmt = $this->pdo->query('INSERT INTO person(name) VALUES(:name)');
        $stmt->execute(['name' => $name]);
        $this->code = 201; // created
        $this['id'] = $this->pdo->lastInsertId();

        return $this;
    }

    public function onPut()
    {
        var_dump($this->db);

    }
}
