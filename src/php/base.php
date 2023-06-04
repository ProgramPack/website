<!DOCTYPE html>
<html>
    <head>
        <div id="styling">
            <title>Base Page</title>
            <?php echo ($HEAD_CONTENT || "") . "\n";?>
        </div>
        <div id="meta-tags">
            <meta charset="UTF-8">
            <meta name="description" content="Website for ProgramPack">
            <meta name="keywords" content="programpack, appimage, pack program">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Google Search -->
            <!-- Search the world's information. http://google.com/ -->
            <meta name="Googlebot" content="all|none, index|noindex, follow|nofollow, notranslate, noydir, noodp, noarchive, snippet|nosnippet, noimageindex, nocache">
        </div>
    </head>
    <body>
        <?php
            echo $BODY_CONTENT . "\n";
        ?>
    </body>
</html>