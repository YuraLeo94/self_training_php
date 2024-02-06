<?php

class HeaderView
{
    public function renderHeader($title, $buttons)
    {
        echo '<header>';
        echo '<nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">';
        echo '<div class="container">';
        echo '<div class="navbar-brand">' . $title . '</div>';
        echo '<div class="collapse navbar-collapse">';
        echo '<ul class="navbar-nav ms-auto">';

        foreach ($buttons as $button) {
            $name = $button['name'];
            $href = $button['href'];
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="' . $href . '">' . $name . '</a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</nav>';
        echo '</header>';
    }
}
