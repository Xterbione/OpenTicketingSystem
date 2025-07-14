<?php

class db
{
    private static $_instance = null; // _ is used as an indicator that its a private var. nothing specific
    private $_pdo;
    private $_query;
    private $_error = false;
    private $_errorMessage = '';
    private $_results;
    private $_count = 0;



    private function __construct()
    {
        try { //try pdo conn
            $this->_pdo = new PDO('mysql:host='. config::get('mysql/host') .';dbname='. config::get('mysql/db'), config::get('mysql/username'), config::get('mysql/password'));
        } catch (PDOException $e) {
            //catching pdo errors
            $this->_error = true;
            $this->_errorMessage = $e->getMessage();
            throw $e; // still throw to preserve current behavior
        }
    }

    public static function getInstance()
    {
        try {
            if (!isset(self::$_instance)) {
                self::$_instance = new db();
            }
            return self::$_instance;
        } catch (Exception $e) {
            // Handle the exception, for example log it or rethrow
            error_log("Failed to create DB instance: " . $e->getMessage());
            throw new Exception("Failed to create DB instance", 0, $e);
        }
    }

    public function query($sql, $params = array())
    {
        $this->_error = false;
        $this->_errorMessage = '';
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
                $errorInfo = $this->_query->errorInfo();
                $this->_errorMessage = isset($errorInfo[2]) ? $errorInfo[2] : 'Unknown SQL error';
            }
        }
        else
        {
            $this->_error = true;
            $this->_errorMessage = 'Failed to prepare SQL statement.';
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
    $keys   = array_keys($fields);
    $values = rtrim(str_repeat('?, ', count($fields)), ', ');

    $sql = "INSERT INTO `$table` (`" . implode('`, `', $keys) . "`) VALUES ($values)";

    $query = $this->query($sql, array_values($fields));

    // Check for error
    if (method_exists($query, 'error') && $query->error()) {
        // Check if error message exists
        if (property_exists($query, 'errorMessage')) {
            echo "Database Insert Error: " . $query->errorMessage;
        } else {
            echo "Database Insert Error occurred, but no detailed message was available.";
            print_r($query);
        }
        return false;
    }

    return true;
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
    public function updatesetting($table, $id, $fields)
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


        $sql = "UPDATE {$table} SET {$set} WHERE SettingName = '$id'";
        echo $sql;

        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;

    }

    public function updatekoppeling($table, $id, $fields)
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


        $sql = "UPDATE {$table} SET {$set} WHERE koppel_ID = '$id'";
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
      $results = $this->results();
      return $results[0];
      //  echo $user->first()->UserName; without foreach loop
    }
    public function error()
    {
        return $this->_error;
    }

    public function errorMessage()
    {
        return $this->_errorMessage;
    }
    public function count()
    {
        return $this->_count;
    }
}
