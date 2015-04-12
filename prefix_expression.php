<?php
/**
 * S = + S S | - S S | a
 *
 * @author pysnow530@163.com
 * @version $Id$
 * @copyright pysnow530@163.com, 12 四月, 2015
 * @package default
 **/
define('DEBUG', true);

$expression = '+a-a;';      // wrong
// $expression = '+a-aa;';  // right
$current = 0;
$lookahead = $expression[$current];

S();

function get_next_terminal()
{
    global $expression, $current;

    return $expression[++$current];
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

    switch ($lookahead) {
        case '+':
            match('+'); S(); S();
            break;

        case '-':
            match('-'); S(); S();
            break;

        case 'a':
            match('a');
            break;
        
        default:
            report('Syntax error! Unexpected ' . $lookahead);
            break;
    }
}
?>
