<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Blog</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <!-- Contenu -->
  <header>
    <nav class="menu">
      <ul>
        <li><a href="#"><h1>Super Blog</h1></a></li>
        <li><a href="#">Articles</a></li>
        <li><a href="#">Catégories</a></li>
      </ul>
    </nav>
  </header>
  <div class="content">
    <section class="articles">
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=projet_blog;charset=utf8;port=3306", "root", "root");
    $req = $pdo->query("SELECT * FROM article JOIN categorie ON article.id_categorie = categorie.id_categorie");
    $articles = $req->fetchAll(PDO::FETCH_OBJ);
    //var_dump($articles);

      foreach($articles as $article) :
    ?>
      <article class="article">
        <a href="article.php?id=<?= $article->id_article ?>">
        <h2><?= $article->titre_article ?></h2><hr>
        <p><?= substr($article->texte_article,0,200) ?>...
        <br /><br />
          <div class="date"><?= $article->date_article ?></div>
          <div class="categorie"><?= $article->nom_categorie ?></div>
        </p>
        </a>
      </article>
    <?php
      endforeach;
    ?>
    </section>
  </div>
  <!-- Scripts -->
</body>
</html>
