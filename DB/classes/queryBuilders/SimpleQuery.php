<?php


// OBJECT MODEL:
class SimpleQuery {
    public $object;
    public $tableName;
    public $dbh;

    function __construct($object, $tableName) {
        $this->object = $object;
        $this->tableName = $tableName;
        include("conexion.php");
        $this->dbh = $dbh;
    }
    function list($orderby) {
        $count = 0;
        $where = "";
        $query = "SELECT * FROM ".$this->tableName;
        foreach($this->object as $key => $value) {
            if($count > 0){
                $where .= " AND ";
            }
            $where .= $key." = '".$value."'";
            $count++;
        }
        if($count>0){
            $query .= " WHERE ";
            $query .= $where;
        }
        $query .= " ORDER BY ";
        $query .= $orderby;
        $query .= " DESC";
        $query .= ";";
        $result = $this->dbh->query($query);
        $rows = [];
        if (isset($result->num_rows)) {
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }
    function listLast10() {
        $count = 0;
        $where = "";
        $query = "SELECT * FROM ".$this->tableName;
        foreach($this->object as $key => $value) {
            if($count > 0){
                $where .= " AND ";
            }
            $where .= $key." = '".$value."'";
            $count++;
        }
        if($count>0){
            $query .= " WHERE ";
            $query .= $where;
        }
        $query .= " ORDER BY ";
        $query .= "fechaCreacion";
        $query .= " DESC";
        $query .= " LIMIT 10";
        $query .= ";";
        $result = $this->dbh->query($query);
        $rows = [];
        if (isset($result->num_rows)) {
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }
    function listWith($filter) {
        // $count = 0;
        $where = $filter;
        $query = "SELECT * FROM ".$this->tableName;
        foreach($this->object as $key => $value) {
            if($count > 0){
                $where .= " AND ";
            }
            $where .= $key." = '".$value."'";
            $count++;
        }
        $query .= " WHERE ";
        $query .= $where;
        $query .= ";";
        // echo $query;
        $result = $this->dbh->query($query);
        $rows = [];
        if (isset($result->num_rows)) {
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }
    function insert() {
        $keys = "INSERT INTO ".$this->tableName."(`";
        $values = "VALUES ('";
        $count = 0;
        foreach($this->object as $key => $value) {
            if($count > 0){
                $keys .= "`, `";
                $values .= "','";
            }
            $keys .= $key;
            $values .= $value;
            $count++;
        }
        $keys .= "`) ";
        $values .= "');";
        $query = $keys . $values;
        // echo $query;
        $insert = $this->dbh->query($query);
        $this->object["id"] = $this->dbh->insert_id;
        return $this->object;
    }

    function update() {
        $query = "UPDATE ".$this->tableName." SET ";
        $count = 0;
        foreach($this->object as $key => $value) {
            if($count > 0){
                $query .= "' , ";
            }
            $query .= $key." = '".$value;
            $count++;
        }
        $query .= "' WHERE id = ".$this->object['id'].";"; 
        $update = $this->dbh->query($query);
    }

    function delete($filter) {
        $query = "DELETE FROM ".$this->tableName." WHERE ".$filter.";";
        // echo $query;
        $delete = $this->dbh->query($query);
    }
    function search($tag){
        $where = $tag;
        $query = "SELECT * FROM ".$this->tableName;
        foreach($this->object as $key => $value) {
            if($count > 0){
                $where .= " AND ";
            }
            $where .= $key." = '".$value."'";
            $count++;
        }
        $query .= " WHERE MATCH(titulo,autor,texto,descripcion,tags) AGAINST(";
        $query .= "'".$tag."'";
        $query .= ")";
        $query .= ";";
        // echo $query;
        $result = $this->dbh->query($query);
        $rows = [];
        if (isset($result->num_rows)) {
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }

    function searchDpto($idDepartamento){
        $query = "SELECT * FROM ".$this->tableName;
        $query .= " WHERE idDepartamento = ".$idDepartamento;
        $query .= ";";
        // echo $query;
        $result = $this->dbh->query($query);
        $rows = [];
        if (isset($result->num_rows)) {
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }
}
?>