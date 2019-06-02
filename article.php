<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Blog</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header>
    <nav class="menu">
      <ul>
        <li><a href="index.php"><h1>Super Blog</h1></a></li>
        <li><a href="#">Articles</a></li>
        <li><a href="#">Catégories</a></li>
      </ul>
    </nav>
  </header>
  <div class="content">
    <section class="articles2">
      <?php
      $pdo = new PDO("mysql:host=localhost;dbname=projet_blog;charset=utf8;port=3306", "root", "root");
      $req = $pdo->query("SELECT * FROM article JOIN categorie ON article.id_categorie = categorie.id_categorie WHERE id_article = $_GET[id]");
      $articles = $req->fetchAll(PDO::FETCH_OBJ);
      $req2 = $pdo->query("SELECT * FROM article JOIN categorie ON article.id_categorie = categorie.id_categorie ORDER BY article.id_article LIMIT $_GET[id], 2");
      $autres = $req2->fetchAll(PDO::FETCH_OBJ);
      //var_dump($articles);

        foreach($articles as $article) :
      ?>
        <article class="article-entier">
          <h2><?= $article->titre_article ?></h2><hr>
          <p><?= $article->texte_article ?>
            <br /><br />
            <div class="date"><?= $article->date_article ?></div>
            <div class="categorie"><?= $article->nom_categorie ?></div>
          </p>
        </article>
      <?php
        endforeach;
      ?>
      <aside>
        <?php foreach ($autres as $autre): ?>
          <div><a href="article.php?id=<?= $autre->id_article ?>">
            <h2><?= $autre->titre_article ?></h2><hr>
            <p><?= substr($autre->texte_article,0,200) ?>...
              <br /><br />
              <div class="date"><?= $autre->date_article ?></div>
              <div class="categorie"><?= $autre->nom_categorie ?></div></p></a>
          </div>

        <?php
          endforeach;
        ?>
      </aside>
    </section>
  </div>
</body>
</html>
