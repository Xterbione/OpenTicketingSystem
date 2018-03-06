<?php

class db
{
    private static $_instance = null; // _ is used as an indicator that its a private var. nothing specific
    private $_pdo;
    private $_query;
    private $_error = false;
    private $_results;
    private $_count = 0;



    private function __construct()
    {
        try {//try pdo conn
      $this->_pdo = new PDO('mysql:host='. config::get('mysql/host') .';dbname='. config::get('mysql/db'), config::get('mysql/username'), config::get('mysql/password')); //new PDO('mysql:host=x;dbname=y', 'username', 'password');
        } catch (PDOException $e) {
            //catching pdo errors
            die($e->getMessage());
        }
    }

    public static function getInstance() //singelton checks if instance of self::(this class) isset
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new db();
        }
        return self::$_instance;
    }

    public function query($sql, $params = array())
    {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql))
        {
          $x = 1;
        if (count($params))
          {
          foreach ($params as $param)
            {
              $this->_query->bindValue($x, $param);
              $x++;
            }
          }
        if ($this->_query->execute())
          {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
          }
        else
          {
            $this->_error = true;
          }
        }
      return $this;
    }

    public function action($action, $table, $where = array())
    {
        if (count($where) === 3) {
            $operators = array('=','>','<','>=', '<=');

            $field     = $where[0];
            $operator  = $where[1];
            $value     = $where[2];

            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if (!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }

    public function insert($table, $fields = array())
    {
        $keys     = array_keys($fields); //extracting keys from array
        $values   = '';
        $x        = 1;

        foreach ($fields as $field) {
            $values .= '?';
            if ($x < count($fields)) {
                $values .= ', ';
            }
            $x++;
        }


        //implode takes the array of keys and turn them into a string
        // echo $sql; INSERT INTO Users (`UserName`, `password`, `salt`);
        $sql = "INSERT INTO $table (`" . implode('`, `', $keys) . "`) VALUES ({$values})";


        if (!$this->query($sql, $fields)->error()) {
            return true;
        }

        return false;
    }

    public function update($table, $id, $fields)
    {
        $set = '';
        $x   = 1;

        foreach($fields as $name => $value) {
          $set .= "{$name} = ?";
          if ($x < count($fields)){
            $set .= ',';

          }
          $x++;
        }


        $sql = "UPDATE {$table} SET {$set} WHERE User_ID = {$id}";

        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;

    }


    public function updateticket($table, $id, $fields)
    {
        $set = '';
        $x   = 1;

        foreach($fields as $name => $value) {
          $set .= "{$name} = ?";
          if ($x < count($fields)){
            $set .= ',';

          }
          $x++;
        }


        $sql = "UPDATE {$table} SET {$set} WHERE Ticket_ID = '$id'";
        echo $sql;

        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;

    }



    public function get($table, $where)
    {
      return $this->action('SELECT *', $table, $where);
    }

    public function delete($table, $where)
    {
      return $this->action('DELETE', $table, $where);
    }
    public function results()
    {
      return $this->_results;
    }
    public function first()
    {
      return $this->results()[0];
      //  echo $user->first()->UserName; without foreach loop
    }
    public function error()
    {
        return $this->_error;
    }
    public function count()
    {
        return $this->_count;
    }
}
