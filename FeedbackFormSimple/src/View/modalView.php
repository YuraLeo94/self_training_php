<?php

class ModalView
{
    public function render($message)
    {
        echo "
            <div class='modal-backdrop fade show'></div>
            <div class='modal d-block'>
               <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='modal-body d-flex flex-column align-items-center'>
                            <p>{$message}</p>
                            <div>
                                <a class='btn btn-dark' href='?action=close_modal'>Ok</a>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        ";
    }
}
