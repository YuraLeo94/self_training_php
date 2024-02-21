<?php

class FormField
{
    private $wrapperClassName = '';
    private $label = '';
    private $name = '';
    private $type = '';
    private $placeholder = '';
    private $value = '';

    public function __construct($wrapperClassName, $label, $name, $type, $placeholder = '', $value = '')
    {
        $this->wrapperClassName = $wrapperClassName;
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    public function render($isTextArea, $error)
    {
        echo "<div class='{$this->wrapperClassName}'>";
        echo "<label for='{$this->name}' class=\"form-label\">{$this->label}</label>";
        
        if (!$isTextArea) {
            echo "<input type=\"{$this->type}\" class=\"form-control" . ($error ? ' is-invalid' : '') . "\" name=\"{$this->name}\" placeholder=\"{$this->placeholder}\" value=\"{$this->value}\">";
        } else {
            echo "<textarea type=\"{$this->type}\" class=\"form-control" . ($error ? ' is-invalid' : '') . "\" name=\"{$this->name}\" placeholder=\"{$this->placeholder}\">{$this->value}</textarea>";
        }

        echo "<div class='invalid-feedback'>" . $error . "</div>";
        echo '</div>';
    }
}

