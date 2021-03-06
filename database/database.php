<?php

    class database 
    {
        var $host = 'localhost';
        var $userdb = 'root';
        var $passworddb = '';
        var $database = 'hrm_web';
        var $conn = "";
        var $_sql = "";

        function __construct()
        {
            $this->conn = mysqli_connect($this->host,$this->userdb,$this->passworddb,$this->database) or die ('Cannot connect to server');
            mysqli_query($this->conn,"SET NAME 'UTF8'");
            mysqli_set_charset($this->conn,"utf8");
        }

        public function setQuery($sql)
        {
            $this->_sql = $sql;
        }

        public function runQuery() 
        {
            mysqli_query($this->conn,$this->_sql);
        }
        
        public function countRows() 
        {
            $query = mysqli_query($this->conn,$this->_sql);
            $result = mysqli_num_rows($query);
            return $result;
        }

        public function loadRowArray() 
        {
            $query = mysqli_query($this->conn,$this->_sql);
            return $row = mysqli_fetch_all($query);
        }

        public function loadOneRowArry()
        {
            $query = mysqli_query($this->conn,$this->_sql);
            return mysqli_fetch_row($query);
        }

    }
    
?>