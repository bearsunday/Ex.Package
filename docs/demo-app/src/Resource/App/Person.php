<?php

namespace Ex\App\Resource\App;

use BEAR\Resource\Annotation\Link;
use BEAR\Resource\ResourceObject;
use Ray\AuraSqlModule\AuraSqlInject;
use Ray\DbalModule\DbalInject;

class Person extends ResourceObject
{
    use AuraSqlInject;
    use DbalInject;

    /**
     * @param $id
     */
    public function onGet($id)
    {
        $stmt = $this->pdo->query('SELECT name FROM person WHERE id=:id');
        $stmt->execute(['id' => $id]);
        $this['person'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $this;
    }

    /**
     * @param $name
     *
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

    /**
     * @param string $id
     * @param string $name
     */
    public function onPut($id, $name)
    {
        $this->db->executeUpdate('UPDATE person SET name = :name WHERE id = :id', ['id' => $id, 'name' => $name]);

        return $this;
    }
}
