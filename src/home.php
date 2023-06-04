<?php
require 'php/functions.php';

$CONTENT="<!DOCTYPE html>
<html>
<h1>Hub</h1>
<ul>
</html>";
$ALL_LINK="https://api.github.com/repos/ProgramPack/hub/git/trees/main?recursive=1";
$LINK="https://api.github.com/repos/ProgramPack/hub/contents/apps";
$BASE_RAW_URL="https://raw.githubusercontent.com/ProgramPack/hub/main/apps/";
$CONTEXT = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
);
$DATA=json_decode(file_get_contents($LINK, false, $CONTEXT), true);
foreach ($DATA as &$ELEMENT){
    $COMBINED_URL = $BASE_RAW_URL . $ELEMENT['name']; # name, path, sha1, ...
    $JSON_DATA = json_decode(file_get_contents($COMBINED_URL, false, $CONTEXT), true);
    if (!empty($JSON_DATA)){
        $CONTENT .= '<li><br>'
        . 'Name: <b>' . $JSON_DATA['name'] . '</b>' . '<br>'
        . 'Description: <b>' . $JSON_DATA['description'] . '</b>' . '<br>'
        . 'Author: <b>' . $JSON_DATA['author'] . '</b>' . '<br>'
        . 'Link: <a href="' . $JSON_DATA['link'] . '">' . $JSON_DATA['link'] . '</a>' . '<br>'
        . 'Picture: <img width=50 height=50 src="' . $JSON_DATA['image'] . '" alt="Icon">' . '</a>' . '<br>'
        . '</li><br>';
    }
}
$CONTENT .= '</ul>';

echo template('php/base.php', ['BODY_CONTENT' => $CONTENT]);
?>