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
$amount= intval($amount);
$loan_period = intval($loan_period);
$interest = intval($interest);
if($amount<=0){
    $messages [] = 'Kwota kredytu jest mniejsza bądź równa zero';
}
if($loan_period<=0){
    $messages [] = 'Liczba rat jest mniejsza bądź równa zero';
}
if($interest<=0){
    $messages [] = 'Oprocentowanie jest mniejsze bądź równe zero';
}
if (empty ( $messages )) {
    $interest = $interest/100;
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
