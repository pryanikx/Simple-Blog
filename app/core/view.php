<?php

class View {
    //public $template_view; // общий вид

    function generate($contentView, $templateView, $data = null) {
        require 'app/views/' . $templateView;
    }
}
?>