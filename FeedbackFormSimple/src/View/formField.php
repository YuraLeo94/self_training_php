<?php

class FormField
{
    private $wrapperClassName = '';
    private $label = '';
    private $name = '';
    private $type = '';
    private $error = '';
    private $errorMessage = '';
    private $placeholder = '';
    private $value = '';

    public function __construct($wrapperClassName, $label, $name, $type, $placeholder = '', $value = '', $errorMessage = 'Field is reqired')
    {
        $this->wrapperClassName = $wrapperClassName;
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->errorMessage = $errorMessage;
    }

    function setError($error)
    {
        $this->error = $error;
    }

    public function render($isTextArea = false)
    {
        $this->errorHandler($this->name);
        echo "<div class='{$this->wrapperClassName}'>";
        echo "<label for='{$this->name}' class=\"form-label\">{$this->label}</label>";
        echo !$isTextArea ? "<input type=\"{$this->type}\" class=\"form-control " .
        (!$this->error ?: 'is-invalid') . "\" name=\"{$this->name}\" placeholder=\"{$this->placeholder}\" value=\"{$this->value}\">" :
            "<textarea  type=\"{$this->type}\" class=\"form-control " .
            (!$this->error ?: 'is-invalid') . "\" name=\"{$this->name}\" placeholder=\"{$this->placeholder}\" value=\"{$this->value}\">".$this->value."</textarea>";
            
        echo "<div class='invalid-feedback'>".$this->error."</div>";
        echo '</div>';
    }

    private function errorHandler($name) {
        $error = '';
        if (isset($_POST['submit'])) {
            if (empty($_POST[$name])) {
                $error = $this->errorMessage;
            }
        }
        $this->error = $error;
    }
}
