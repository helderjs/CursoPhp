<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Helder
 */
abstract class Model {

    protected $pdo;
    protected $tableName = '';
    protected $columns = array();
    protected $primaryKey = '';

    public function __construct() {
        $database = new Database();
        $dsn = "mysql:host={$database->default['host']};dbname={$database->default['database']}";

        try {
            $this->pdo = new PDO($dsn, $database->default['user'], $database->default['password']);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function __set($name, $value) {
        if (array_key_exists($name, $this->columns)) {
            $this->columns[$name] = $value;
        }
    }

    public function __get($name) {

        return $this->columns[$name];
    }

    public function insert() {
        $col = implode(',', array_keys($this->columns));
        $val = implode("','", $this->columns);
        $sql = "INSERT INTO {$this->tableName} ({$col}) VALUES ('{$val}')";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function update() {
        $set = '';
        foreach ($this->columns as $key => $value) {
            if ($key != $this->primaryKey) {
                $set .= "{$key}='$value', ";
            }
        }
        $set = substr($set, 0, -2);
        $sql = "UPDATE {$this->tableName} SET {$set} WHERE {$this->primaryKey}='{$this->columns[$this->primaryKey]}'";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function delete() {
        $sql = "DELETE FROM {$this->tableName} WHERE {$this->primaryKey}='{$this->columns[$this->primaryKey]}'";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function select($conditions = array()) {
        $where = "1";
        
        if (empty($conditions) && !empty($this->columns[$this->primaryKey])) {
            $conditions[$this->primaryKey] = $this->columns[$this->primaryKey];
        } elseif (empty($conditions) && empty($this->columns[$this->primaryKey])) {
            return array();
        }
        
        foreach ($conditions as $key => $value) {
            if (array_key_exists($key, $this->columns)) {
                $where .= " AND {$key}='{$value}'";
            }
        }

        $sql = "SELECT * FROM {$this->tableName} WHERE $where LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->columns = $row;
        }

        return $this->columns;
    }

    public function selectAll($conditions = array(), $limit = null) {
        $sql = "SELECT * FROM {$this->tableName} WHERE 1";
        
        foreach ($conditions as $key => $value) {
            if (array_key_exists($key, $this->columns)) {
                $sql .= " AND {$key}='{$value}'";
            }
        }
        
        if (!is_null($limit)) {
            $sql.= " LIMIT $limit";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

}

?>