<?php
include_once __DIR__ . '/queryBuilders/SimpleQuery.php';
class Recurso
{
    public $recurso;
    public $SimpleQuery;

    function __construct($recurso = array())
    {
        $this->SimpleQuery = new SimpleQuery($recurso, "recurso");
    }

    function list()
    {
        return $this->SimpleQuery->list("id");
    }

    function listWith($id)
    {
        return $this->SimpleQuery->listWith("idArticulo= ".$id);
    }
    function insert()
    {
        return $this->SimpleQuery->insert();
    }
    function update()
    {
        return $this->SimpleQuery->update();
    }
    function delete($id)
    {
        return $this->SimpleQuery->delete("idArticulo =".$id);
    }
}
?>