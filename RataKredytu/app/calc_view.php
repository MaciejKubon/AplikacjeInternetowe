<?php require_once dirname(__FILE__) . '/../config.php'; ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/app/css/style.css">
    <title>Kalkulator raty kredytu</title>
</head>
<body>
<header>
    <h1>Kalkulator kredytu metodą Annuitetową</h1>
</header>
<section id="credit_form">
    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
        <label for="id_amount">Kwota kredytu: </label>
        <input id="id_amount" type="number" name="amount" value="<?php print($amount); ?>" /> zł <br />
        <label for="id_loan_period">Okres kredytu (w miesiącach): </label>
        <input id="id_loan_period" type="number" name="loan_period" value="<?php print($loan_period); ?>" /><br />
        <label for="id_interest">Oprocentowanie: </label>
        <select id="id_interest" name="interest">
            <option value="2" <?php if (isset($interest) && $interest == 2) echo 'selected'; ?>>2%</option>
            <option value="4" <?php if (isset($interest) && $interest == 4) echo 'selected'; ?>>4%</option>
            <option value="6" <?php if (isset($interest) && $interest == 6) echo 'selected'; ?>>6%</option>
            <option value="8" <?php if (isset($interest) && $interest == 8) echo 'selected'; ?>>8%</option>
            <option value="10" <?php if (isset($interest) && $interest == 10) echo 'selected'; ?>>10%</option>
            <option value="12" <?php if (isset($interest) && $interest == 12) echo 'selected'; ?>>12%</option>
        </select><br />

        <input type="submit" value="Oblicz" />
    </form>

    <?php
    if (isset($messages)) {
        if (count ( $messages ) > 0) {
            echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
            foreach ( $messages as $key => $msg ) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
    }
    ?>

    <?php if (isset($monthly_installment) && isset($total_cost_of_credit)){ ?>
        <div style="margin: 20px; padding: 10px; border-radius: 5px; width:80%;">
            <?php echo 'Miesięczna rata: '.$monthly_installment; ?> zł</br>
            <?php echo 'Całkowita kwota do spłaty: '.$total_cost_of_credit; ?> zł
        </div>
    <?php } ?>
</section>




</body>
</html>
