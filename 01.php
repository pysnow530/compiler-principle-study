<?php
/**
 * left recursive expression
 * +------------------+
 * | S → 0 S 1 | 0 1 |
 * +------------------+ endless expression
 * translate to
 * S → 0 R
 * R → S 1 | 1
 * @author pysnow530@163.com
 * @version $Id$
 * @copyright pysnow530@163.com, 12 四月, 2015
 * @package default
 **/
require 'Expression.php';

define('DEBUG', true);

$expression = new Expression('00101');      // wrong
//$expression = new Expression('0011');       // right
$lookahead = $expression->get_next_terminal();

S();

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

    match('0');
    switch($lookahead) {
        case '0':
            S(); match('1');
            break;
        case '1':
            match('1');
            break;
        default:
            report('Syntax error! Unexpected ' . $lookahead);
            break;
    }
}
?>
