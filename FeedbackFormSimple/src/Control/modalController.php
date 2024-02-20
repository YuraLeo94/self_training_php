<?php

class ModalController {
    private $view;

    public function __construct() {
        $this->view = new ModalView();
    }

    public function showModal() {
        $isShowModal = isset($_SESSION[SessionEntryNames::SHOW_MODAL]) ? $_SESSION[SessionEntryNames::SHOW_MODAL] : false;
        if ($isShowModal) {
            $message = isset($_SESSION[SessionEntryNames::MODAL_MESSAGE]) ? $_SESSION[SessionEntryNames::MODAL_MESSAGE] : 'Error';
            $this->view->render($message);
        }
    }
}