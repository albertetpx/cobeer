<?php
include_once __DIR__ . '/queryBuilders/SimpleQuery.php';
class Articulo
{
    public $articulo;
    public $SimpleQuery;

    function __construct($articulo = array())
    {
        $this->SimpleQuery = new SimpleQuery($articulo, "articulo");
    }
    function list()
    {
        return $this->SimpleQuery->list("fechaCreacion");
    }
    function listLast10()
    {
        return $this->SimpleQuery->listLast10();
    }
    function listPinned(){
        return $this->SimpleQuery->listWith("indBaja=1");
    }
    function listLast10Unpinned(){
        return $this->SimpleQuery->listLast10With("indBaja=0"); 
    }
    function listNext10Unpinned($offset){
        return $this->SimpleQuery->listNext10With("indBaja=0",$offset); 
    }
    function listWith($id)
    {
        return $this->SimpleQuery->listWith("id=".$id);
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
        return $this->SimpleQuery->delete("id= ".$id);
    }
    function search($tag)
    {
        return $this->SimpleQuery->search($tag);
    }
    function listDepto($idDepartamento){
        return $this->SimpleQuery->searchDpto($idDepartamento);
    }
}
?>