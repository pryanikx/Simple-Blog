<?php

Class ArticleModel extends Model {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function read() {
        $sql = "SELECT * FROM articles";
        $result = $this->conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticle($id) {
        $sql = "SELECT Heading, Text FROM articles WHERE id=$id";
        $result = $this->conn->query($sql);

        if ($result->num_rows === 0) {
            die("Данной записи не существует");
        }

        return $result->fetch_assoc();
    }

    public function create($title, $content) {
        $sql = "INSERT INTO articles (Heading, Text) VALUES ('$title', '$content')";

        if (!$this->conn->query($sql)) {
            die("Ошибка загрузки данных");
        }
    }

    public function update($title, $content, $id) {
        $sql = "UPDATE articles SET Heading='$title', Text='$content' WHERE id='$id'";

        if (!$this->conn->query($sql)) {
            die("Ошибка загрузки данных");
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM articles WHERE id=$id";

        if (!$this->conn->query($sql)) {
            die("Ошибка удаления данных");
        }
    }

} 