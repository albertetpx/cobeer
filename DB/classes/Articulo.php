<?php
include_once __DIR__ . '/queryBuilders/SimpleQuery.php';
class Articulo
{
    public $articulo;

    function __construct($articulo = array())
    {
        $this->SimpleQuery = new SimpleQuery($articulo, "articulo");
    }

    function list()
    {
        return $this->SimpleQuery->list();
    }

    // function listWith()
    // {
    //     return $this->SimpleQuery->list();
    // }
    function insert()
    {
        return $this->SimpleQuery->insert();
    }
    function update()
    {
        return $this->SimpleQuery->update();
    }
    function delete()
    {
        return $this->SimpleQuery->delete();
    }
}
?>