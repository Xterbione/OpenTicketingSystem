<?php
class validate
{
    private $_passed = false;
    private $_errors = array();
    private $_db = null;

    public function __construct()
    {
        $this->_db = db::getInstance();
    }
    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value)
              {
                $value = trim($source[$item]);
                $item = escape($item);

                // echo $value;
                // echo "{$item} {$rule} must be {$rule_value} <br>";

              if ($rule === 'required' && empty($value))
                {
                    $this->addError("veld voor {$item} is verplicht");
                }
              elseif (!empty($value))
                {
                  switch ($rule)
                    {
                      case 'min':
                    if (strlen($value) < $rule_value)
                        {
                          $this->addError("veld voor {$item} moet minimaal bestaan uit {$rule_value} karakters");
                        }
                        break;
                        case 'max':
                      if (strlen($value) > $rule_value)
                        {
                          $this->addError("{$item} mag maximaal bestaan uit {$rule_value} karakters");
                        }
                        break;
                        case 'matches':
                          if ($value != $source[$rule_value])
                          {
                            $this->addError("{$rule_value} moet het zelfde zijn als {$item}");
                          }
                        break;
                        case 'unique':
                          $check = $this->_db->get($rule_value, array($item, '=', $value));
                          if ($check->count())
                          {
                        $this->addError("{$item} already exists");
                          }
                        break;
                    }
                }
            }
        }
        if (empty($this->_errors))
        {
            $this->_passed = true;
        }
        return $this;
    }




    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}
