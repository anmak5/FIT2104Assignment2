<?php
$file = $_GET["filename"];
echo "<h1>Source Code for: ".$file."</h1>";
//get entire contents of file at once rather than line by line
$line = file_get_contents($file);
$trans = get_html_translation_table(HTML_ENTITIES);
$line = strtr($line,$trans);
$line = str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$line);
$line = str_replace("\n","<br />",$line);
echo $line."<br />";
?>