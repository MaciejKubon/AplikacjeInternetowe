<?php

require_once dirname(__FILE__).'/../config.php';


$amount = $_REQUEST ['amount'];
$loan_period= $_REQUEST ['loan_period'];
$interest = $_REQUEST ['interest'];


if ( ! (isset($amount) && isset($loan_period) && isset($interest))) {
    $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $amount == "") {
    $messages [] = 'Nie podano kwoty kredytu';
}
if ( $loan_period == "") {
    $messages [] = 'Nie podano okresu kredytu';
}

if (empty( $messages )) {
    if (! is_numeric( $amount )) {
        $messages [] = 'Kwoty kredytu nie jest liczbą całkowitą';
    }
    if (! is_numeric( $loan_period )) {
        $messages [] = 'Okresu kredytu nie jest liczbą całkowitą';
    }
    if( ! is_numeric( $interest )) {
        $messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
    }

}

if (empty ( $messages )) {
    $amount= intval($amount);
    $loan_period = intval($loan_period);
    $interest = intval($interest)/100;
    $monthly_interest_rate = $interest/12;
    $raw_installment =
        $amount * (
            $monthly_interest_rate * pow((1 + $monthly_interest_rate), $loan_period)
        ) / (
            pow((1 + $monthly_interest_rate), $loan_period) - 1
        );
    $monthly_installment = round($raw_installment, 2);
    $total_cost_of_credit = $monthly_installment * $loan_period;





}
include 'calc_view.php';
