<?php

class HeaderView
{
    public function renderHeader($title, $buttons)
    {
        $isAuthenticated = isset($_SESSION[SessionEntryNames::UID]) ? !!$_SESSION[SessionEntryNames::UID] : false;
        
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
        if ($isAuthenticated) {
            echo '<li class="nav-item">';
            echo "<form method='POST' action=" . htmlspecialchars(parse_url($_SERVER['REQUEST_URI'])['path']) . ">";
            echo "<input type='hidden' name='action' value='logout'>";
            echo "<button class='btn nav-link' type='submit'> Log out </button>";
            echo "</form>";
            echo '</li>';
        } else {
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="' . RoutingPaths::SIGN_IN . '">Sign in</a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</nav>';
        echo '</header>';
    }
}
