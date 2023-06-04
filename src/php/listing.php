<?php
echo '<!DOCTYPE html>
<html>
<h1>Directory listing</h1>
<a href="' . $PATH . '/..">Go to parent directory</a>
<ul>';
foreach (scandir('.') as &$value){
    if (!str_starts_with($value, '.')){
        echo '<li>' . '<a href="' . $value . '">' . $value . '</a>' . '</li>';
    }
}
echo '</ul>
</html>'
?>