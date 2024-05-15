<?php
if (!isset($abs_path)) {
    require_once "../../../path.php";
}
require_once $abs_path . "/PHP_Bausteine/model/RezeptModel/Rezeptbuch.php";
require_once $abs_path . "/PHP_Bausteine/model/RezeptModel/Rezept.php";

$title_recipe = isset($_POST[htmlspecialchars("title_recipe")]) ? $_POST[htmlspecialchars("title_recipe")] : "";
$text_recipe = isset($_POST[htmlspecialchars("text_recipe")]) ? $_POST[htmlspecialchars("text_recipe")] : "";
$picture_recipe = isset($_POST[htmlspecialchars("picture_recipe")]) ? $_POST[htmlspecialchars("picture_recipe")] : "";


if(!isset($_POST[$text_recipe]) || !isset($_POST[$title_recipe]) || !isset($_POST[$title_recipe])){
    $_SESSION["message"] = "missing_data";
    header("Location: /Rezepte.php");
    exit;
}
try{
    Rezeptbuch::getInstance() ->  neuesRezept($title_recipe,$text_recipe,$picture_recipe);
    //var_dump(Rezeptbuch::getInstance());
    exit;
} catch (InternerFehlerInRezeptDatenbankException $exc){
    $_SESSION["message"] = "internal_error";
    header(index.php);
    exit;
}

unset($_POST["title_recipe"]);
unset($_POST["text_recipe"]);
unset($_POST["picture_recipe"]);
header("Location: /Rezepte.php");
?>
