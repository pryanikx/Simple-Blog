<h1>Мой Блог!</h1>
<a href="/Article/create">Добавить статью</a>
<?php foreach($data as $article): ?>
    <p>Дата загрузки: <?= $article["UploadDate"]; ?></p>
    <p>Дата изменения: <?= $article["UpdateDate"]; ?></p>
    <h3><?= $article["Heading"]; ?></h3>
    <p><?= $article["Text"]; ?></p>
    <a href="/Article/update/<?= htmlspecialchars($article['id']); ?>">Редактировать</a>
    <a href="/Article/delete/<?= htmlspecialchars($article['id']); ?>">Удалить</a>
<?php endforeach ?>
