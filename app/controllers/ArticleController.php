<?php
class ArticleController extends Controller {

    public function __construct($conn) {
        $this->view = new View();
        $this->model = new ArticleModel($conn);
    }
    public function index() {
        $articles = $this->model->read();
        $this->view->generate("mainView.php", "templateView.php", $articles);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $title = htmlspecialchars($_POST["title"]);
            $content = htmlspecialchars($_POST["content"]);

            $this->model->create($title, $content);

            header('Location: /');
        }

        $this->view->generate("createView.php", "templateView.php");
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);

            $this->model->update($title, $content, $id);
            
            header('Location: /');
        }

        $article = $this->model->getArticle($id);        

        $this->view->generate("updateView.php", "templateView.php", $article);
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->model->delete($id);

            header('Location: /');
        }

        $article = $this->model->getArticle($id);

        $this->view->generate("deleteView.php", "templateView.php", $article);
    }
}
?>