<?php

class FormField
{
    private $wrapperClassName = '';
    private $label = '';
    private $name = '';
    private $type = '';
    private $error = '';
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

    function setError($error)
    {
        $this->error = $error;
    }

    public function render()
    {
        echo "<div class=\"{$this->wrapperClassName}\">";
        echo "<label for=\"{$this->name}\" class=\"form-label\">{$this->label}</label>";
        echo "<input type=\"{$this->type}\" class=\"form-control " .
            (!$this->error ? '' : 'is-invalid') . "\" name=\"{$this->name}\" placeholder=\"{$this->placeholder}\" value=\"{$this->value}\">";
        echo '</div>';
    }
}
