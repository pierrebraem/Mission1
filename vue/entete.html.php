<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title><?php echo $titre ?></title>
        <style type="text/css">
            @import url("css/base.css");
            @import url("css/form.css");
            @import url("css/cgu.css");
            @import url("css/corps.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">   
        <ul id="navbar-nav">
            <li class="nav-item active"><a class="nav-link" href="./?action=default">Accueil</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Prospects</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="./?action=liste">liste Prospects</a>
                    <a class="dropdown-item" href="./?action=ajout">Ajouter Prospect</a>
                    <a class="dropdown-item" href="./?action=supprime">Supprimer Prospect</a>
                    <a class="dropdown-item" href="./?action=modifie">Modifier Prospect</a>
                </div>
            </li>
            <li id="logo"><a href="./?action=default"><img src="images/logoBarre.png" alt="logo" /></a></li>
        </ul>
    </nav>
    <div id="bouton">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul id="menuContextuel">
        <li><img src="images/logoBarre.png" alt="logo" /></li>
    </ul>

    <div id="corps">