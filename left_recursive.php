<?php
/**
 * left recursive expression
 * +--------------------+
 * | S →  S ( S ) S | ε |
 * +--------------------+ endless expression
 * translate to
 * S →  ( S ) S S | ε
 * @author pysnow530@163.com
 * @version $Id$
 * @copyright pysnow530@163.com, 12 四月, 2015
 * @package default
 **/
require 'Expression.php';

define('DEBUG', true);

$expression = new Expression('(()2())');      // wrong
$expression = new Expression('(()())');      // right
$lookahead = $expression->get_next_terminal();

// S();
corrected_S();

/**
 * @return string '' is epsilon
 */
function get_next_terminal()
{
    global $expression;

    return $expression->get_next_terminal();
}

function report($err_str)
{
    fprintf(STDERR, $err_str . PHP_EOL);
    exit(-1);
}

function match($terminal)
{
    global $lookahead;

    if ($lookahead == $terminal) {
        fprintf(STDERR, 'matched ' . $lookahead . PHP_EOL);
        $lookahead = get_next_terminal();
    } else {
        report('Syntax error! Unexpected ' . $lookahead);
    }
}

function S()
{
    global $lookahead;

    if ($lookahead != 'ε') {
        S(); match('('); S(); match(')'); S();
    }

    return 0;
}

function corrected_S()
{
    global $lookahead;

    if ($lookahead == '(') {
        match('('); corrected_S(); match(')'); corrected_S(); corrected_S();
    }

    return;
}

?>
