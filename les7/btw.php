<?php

$data = [];
$errors = [];
$btw_percentage = 21;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate bedrag
    if (empty($_POST['bedrag'])) {
        $errors['bedrag'] = "Bedrag is verplicht";
    } elseif (!is_numeric($_POST['bedrag']) || $_POST['bedrag'] <= 0) {
        $errors['bedrag'] = "Vul een geldig bedrag in";
    } else {
        $data['bedrag'] = (float)$_POST['bedrag'];
    }


    if (!isset($_POST['btw'])) {
        $errors['btw'] = "Kies een BTW percentage";
    } else {
        $btw_percentage = (int)$_POST['btw'];
    }


    if (empty($errors)) {
        $btw_bedrag = ($data['bedrag'] * $btw_percentage) / 100;
        $totaal_incl_btw = $data['bedrag'] + $btw_bedrag;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTW Berekening</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>BTW Berekening</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="bedrag">Bedrag (exclusief BTW):</label>
            <input type="text" class="form-control" id="bedrag" name="bedrag" value="<?php echo $data['bedrag'] ?? ''; ?>">
            <small class="text-danger"><?php echo $errors['bedrag'] ?? ''; ?></small>
        </div>

        <div class="form-group">
            <label for="btw">BTW percentage:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="btw" id="btw21" value="21" <?php echo (isset($_POST['btw']) && $_POST['btw'] == 21) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="btw21">21%</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="btw" id="btw9" value="9" <?php echo (isset($_POST['btw']) && $_POST['btw'] == 9) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="btw9">9%</label>
            </div>
            <small class="text-danger d-block"><?php echo $errors['btw'] ?? ''; ?></small>
        </div>

        <button type="submit" class="btn btn-primary">Bereken</button>
    </form>

    <?php if (empty($errors) && $_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="mt-4">
            <h3>Resultaten:</h3>
            <p>Bedrag exclusief BTW: €<?php echo number_format($data['bedrag'], 2); ?></p>
            <p>BTW (<?php echo $btw_percentage; ?>%): €<?php echo number_format($btw_bedrag, 2); ?></p>
            <p>Totaal inclusief BTW: €<?php echo number_format($totaal_incl_btw, 2); ?></p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
