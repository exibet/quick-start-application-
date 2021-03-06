<?php

class Application_Model_User {

    protected $_dbTable;
    protected $_row;

    public function __construct($id = null) {
        $this->_dbTable = new Application_Model_DbTable_Users();
        if ($id) {
            $this->_row = $this->_dbTable->find($id)->current();
        } else {
            $this->_row = $this->_dbTable->createRow();
        }
    }

    public function getAllUsers() {
        return $this->_dbTable->fetchAll();
    }

    public function fill($data) {
        foreach ($data as $key => $value) {
            if (isset($this->_row->$key)) {
                $this->_row->$key = $value;
            }
        }
    }

    public function populateForm() {
        return $this->_row->toArray();
    }

    public function save() {
        $this->_row->save();
    }
    
    public function delete() {
        $this->_row->delete();
    }

    public function __set($name, $val) {
        if (isset($this->_row->$name)) {
            $this->_row->$name = $val;
        }
    }

    public function __get($name) {
        if (isset($this->_row->$name)) {
            return $this->_row->$name;
        }
    }

}
?>

