<?php
$pdo = new PDO("mysql:host=mariadb;dbname=mydatabase", "myuser", "mypassword");
$stmt = $pdo->query("SELECT * FROM projects");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LivingShapes Portfolio</title>
<link rel="stylesheet" href="assets/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
</head>
<body>
<div class="container">
    <header>
        <img src="assets/images/logo.png" alt="LivingShapes Logo" class="logo">
    </header>

    <main id="projects" class="grid-container">
        <?php foreach($projects as $project): ?>
        <div class="project-card" draggable="true">
            <div class="image-container">
                <img class="main" src="assets/images/<?php echo htmlspecialchars($project['image_main']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                <img class="secondary" src="assets/images/<?php echo htmlspecialchars($project['image_second']); ?>" alt="Secondary image">
            </div>
            <div class="project-info">
                <h2><?php echo htmlspecialchars($project['title']); ?></h2>
                <p><?php echo htmlspecialchars($project['city_location']); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </main>

    <footer>
        <p>Contact: newbusiness@livingshapes.eu</p>
    </footer>
</div>

<script>
new Sortable(projects, {
    animation: 200
});
</script>
</body>
</html>
