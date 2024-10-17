<?php
// Database connection
$db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");

// Initialize errors and inputs arrays
$errors = [];
$inputs = [];

// Check if the form was submitted
if (isset($_POST['send'])) {
    // Sanitize and validate name
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = trim($name);
    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    } else {
        $inputs['name'] = $name;
    }

    // Sanitize and validate review
    $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_SPECIAL_CHARS);
    $review = trim($review);
    if (empty($review)) {
        $errors['review'] = 'Review is required.';
    } else {
        $inputs['review'] = $review;
    }

    // Check if terms are accepted
    $agree = filter_input(INPUT_POST, 'agree', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($agree === null) {
        $errors['agree'] = 'You must accept the terms.';
    } else {
        $inputs['agree'] = $agree;
    }

    // If no errors, proceed with database insertion
    if (count($errors) === 0) {
        $sth = $db->prepare("INSERT INTO review (name, content) VALUES (:name, :review)");
        $sth->bindParam(':name', $inputs['name']);
        $sth->bindParam(':review', $inputs['review']);
        $result = $sth->execute();

        if ($result) {
            header("Location: ../SmartPhone4u/Homepagina.php");
            exit;
        } else {
            $errors['database'] = 'Failed to save review. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Invoeren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Review Invoeren</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="n" class="form-label">Naam</label>
            <input type="text" class="form-control" id="n" name="name"
                   value="<?php echo htmlspecialchars($inputs['name'] ?? '', ENT_QUOTES); ?>">
            <div class="form-text text-danger">
                <?php echo $errors['name'] ?? ''; ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="b" class="form-label">Review</label>
            <textarea name="review" id="b" class="form-control"><?php echo htmlspecialchars($inputs['review'] ?? '', ENT_QUOTES); ?></textarea>
            <div class="form-text text-danger">
                <?php echo $errors['review'] ?? ''; ?>
            </div>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="a" name="agree" value="agree"
                <?php echo (isset($inputs['agree']) && $inputs['agree']) ? 'checked="checked"' : ''; ?>>
            <label class="form-check-label" for="a">Accepteer voorwaarden</label>
            <div class="form-text text-danger">
                <?php echo $errors['agree'] ?? ''; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3" name="send">Verzenden</button>
    </form>
</div>
<script
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
