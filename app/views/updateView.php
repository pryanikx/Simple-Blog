<h1>Обновление статьи</h1>
<form action="" method="post">
    <input type="text" name="title" value="<?= $data['Heading']; ?>" required><br>
    <textarea id="content" name="content" rows="10" cols="30" required><?= $data['Text']; ?></textarea>
    <input type="submit" name="update" value="Обновить статью">
</form>