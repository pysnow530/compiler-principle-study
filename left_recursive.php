<?php
/**
 * left recursive expression
 * +--------------------+
 * | S →  S ( S ) S | ε |
 * +--------------------+ endless expression
 * @author pysnow530@163.com
 * @version $Id$
 * @copyright pysnow530@163.com, 12 四月, 2015
 * @package default
 **/
define('DEBUG', true);

$expression = '(()2())';      // wrong
// $expression = '+a-aa;';  // right
$current = 0;
$lookahead = $expression[$current];

S();

/**
 * @return string '' is epsilon
 */
function get_next_terminal()
{
    global $expression, $current;

    $current++;
    return isset($expression[$current]) ? $expression[$current] : '';
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

    if ($lookahead == '') {
        return 0;
    } else {
        S(); match('('); S(); match(')'); S();
    }
}
?>
