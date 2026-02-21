<?php
try {
    // PDO connection
    $db = new PDO("mysql:host=localhost;dbname=gcpm1108_iiardPub;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Error display included by EPHRAIM
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}
?>

<?php
$id = 1;
$stmt = $db->prepare("SELECT * FROM publications WHERE id = :id LIMIT 1");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php if ($row): ?>
    <a href="<?php echo htmlspecialchars($row['path']); ?>">Link Text</a>
<?php else: ?>
    <p>No record found.</p>
<?php endif; ?>
