<?php

$posts = [];

if (file_exists("posts.json")) {
    $posts = json_decode(file_get_contents("posts.json"), true);
}
$activeCategory = $_GET["cat"] ?? "all";

// Kategorien sammeln
$categories = ["all"];
foreach ($posts as $p) {
    if (!in_array($p["category"], $categories)) {
        $categories[] = $p["category"];
    }
  }
  $defaultCategories = ["Hilfe!!", "Pflanzen erkennen", "Tipps und Tricks", "Einfach so"];
?>

<!DOCTYPE html>
<html lang="">
<head>
  <?php require_once "includes/head.php"; ?>
  <title>Home</title>
</head>
<body>

  <?php require_once "includes/nav.php"; ?>


  <div class="container">
    <div class="row">
      <h1>Home</h1>
    </div>
    
    <div class="row mb-4">

        <?php foreach ($defaultCategories as $cat): ?>
            <div class="col-3">
                <a href="?cat=<?= urlencode($cat) ?>" style="text-decoration:none;">
                    <div class="card <?= ($activeCategory == $cat ? 'border-success' : '') ?>">
                        <div class="card-body text-center">
                            <strong><?= htmlspecialchars($cat) ?></strong>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

    </div>
    


    <h2 class="mt-4">Beiträge</h2>
    <div class="row mt-3">

        <?php
        // Beiträge filtern
        $filteredPosts = ($activeCategory == "all")
            ? $posts
            : array_filter($posts, fn($p) => $p["category"] == $activeCategory);

        if (empty($filteredPosts)):
        ?>
            <p>Hier werden bald Beiträge zu sehen sein!</p>
        <?php else: ?>

            <?php foreach (array_reverse($filteredPosts) as $post): ?>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">

                            <h5><?= htmlspecialchars($post["user"] ?? "Unbekannt") ?></h5>

                            <p><?= nl2br(htmlspecialchars($post["text"])) ?></p>

                            <?php if (!empty($post["image"])): ?>
                                <img src="<?= htmlspecialchars($post["image"]) ?>" class="img-fluid mb-3 rounded">
                            <?php endif; ?>

                            <small class="text-muted d-block mb-2">
                                <?= htmlspecialchars($post["date"]) ?> •
                                Kategorie: <strong><?= htmlspecialchars($post["category"]) ?></strong>
                            </small>

                            <!-- LIKE BUTTON -->
                            <form action="logic/formhandler/like_post.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $post["id"] ?>">
                                <button class="btn btn-sm btn-outline-success">❤️ <?= $post["likes"] ?></button>
                            </form>

                            <!-- KOMMENTAR BUTTON -->
                            <a href="post.php?id=<?= $post["id"] ?>" class="btn btn-sm btn-outline-primary">
                                💬 Kommentare (<?= count($post["comments"]) ?>)
                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>



</body>
</html>
