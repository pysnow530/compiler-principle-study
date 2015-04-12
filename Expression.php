<?php
/**
 * expression class
 *
 * @author pysnow530@163.com
 * @version $Id$
 * @copyright pysnow530@163.com, 12 April, 2015
 * @package default
 **/

/**
 * expression class
 **/
class Expression
{
    protected $_expression;

    protected $_next_index = 0;

    public function __construct($expression)
    {
        $this->_expression = $expression;
    }

    /**
     * @return string the next terminal, '' for epsilon
     */
    public function get_next_terminal()
    {
        if (isset($this->_expression[$this->_next_index])) {
            return $this->_expression[$this->_next_index++];
        } else {
            return 'ε';
        }
    }

}

// $expression = new Expression('+aa');
// var_dump($expression->get_next_terminal());
// var_dump($expression->get_next_terminal());
// var_dump($expression->get_next_terminal());
// var_dump($expression->get_next_terminal());
// var_dump($expression->get_next_terminal());
// var_dump($expression->get_next_terminal());

?>
