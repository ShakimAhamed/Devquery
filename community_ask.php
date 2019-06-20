<?php
include 'dbconnect.php';
session_start();
if($_SESSION['loggedin'] != 1)
    header('Location: index.php');
$user_name = $_SESSION['user_name'];

$community_id = $_GET['community_id'];





function uploadPhoto($p_id){

    $src = $_FILES["photo"]["tmp_name"];
    if (getimagesize($src) === false)
        return false;

    $target = "postimg/$p_id.jpg";
    move_uploaded_file($src, $target);
}



?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DevQuery</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
    <link rel="stylesheet" href="assets/mobirise/css/style.css">
    <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
    <link rel="stylesheet" href="assets/mobirise-slider/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        #nav-a
        {
            color: white;
        }
        #nav-a:hover
        {
            color: darkred;
        }

    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar" style="z-index: 9999">
    <div class="container" id="mainnav">

        <img src="img/logo.png" style="height: 50px;width: 54px;float: left; padding: 2px 2px "/>

        <div class="navbar-header">
            <a class="navbar-brand logo" href="home.php">DevQuery</a>
        </div>


        <form style="width:330px;float: left" action="search.php" method="get">
            <input id="search" type="text" name="key" placeholder="Search.." style="width: 150px;height: 34px;border-radius:5px ">
        </form>


        <ul class="nav navbar-nav">
            <li>
                <a href="profile.php" class="active" id="nav-a"><img src="img/user.ico" style="height: 35px;width: 35px;float: left; margin-right: 5px "/><?php echo $user_name;?></a>
            </li>

            <li>
                <a href="#" id="nav-a"><img src="img/notify.png" style="height: 34px;width: 34px;float: left;margin-right: 5px"/> [10] </a>
            </li>

            <li>
                <a href="#" id="nav-a"><img src="img/chat.png" style="height: 34px;width: 34px;float: left;margin-right: 5px"/>[2] </a>
            </li>

            <li>
                <a href="#" style="display: inline-block" id="nav-a"><img src="img/menu.png" style="height: 32px;width: 30px;float: left;margin-right: 5px"/> </a>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2" style="background-color:whitesmoke;height: 563px;position: fixed;margin-left: 10px;box-shadow:20px 20px 50px 10px lightblue inset ">



            <div style="margin-top: 28px ">
                <a href="ask.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/post.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Post</a>
            </div>


            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/msg.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Message</a>
            </div>

            <div style="margin-top: 18px ">
                <a href="community.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/comminity.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Communities</a>
            </div>

            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/saved.png" style="height: 35px;width: 35px;margin-right:10px;"/>Saved</a>
            </div>


            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/settings.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Settings</a>
            </div>
            <div style="margin-top: 185px ">
                <a href="about.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/about.svg" style="height: 35px;width: 35px;margin-right:10px;"/>About</a>
            </div>
            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/contact.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Contact</a>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-8" style="    margin-left: 295px;width: 72%;border: 2px solid;border-radious:5px;padding:10px;">
    <form action="community_ask2.php" enctype="multipart/form-data" method="post">
        <div style="
                        margin-top: 12px;
                        padding: 8px">
            <h3 style="margin-top: 11px;
                        width: 73px;
                        hight: 24px;
                        background-color: lightgray;
                        float: left;
                        font-size: 24px;
                        color: darkblue;
                        border: 1px solid;">Title</h3>
            <textarea style="margin-left: 3%;
                                border: 2px solid black;
                                border-radius: 5px;" name="title" id="" cols="100" rows="2"></textarea>
        </div>

        <div style="
                        padding: 8px;
                        margin-top: 12px;">

                <textarea placeholder="Write your post here...."style="border: 2px solid black;
                                        font-size: 20px;
                                        margin-left: 11%;
                                        border-radius: 5px;"  name="description" cols="70" rows="5"></textarea>
            <input type="hidden" value = <?php echo $community_id;?> name="community_id">

            <button type="submit"  name="ask" style="color: white;border-radius: 6px;background-color: #72bb53;color: white;padding: 9px 20px; margin: 8px 0; border: none; cursor: pointer; width: 16%; height: 37px;margin-left: 680px;">Post</button>
            <input style="margin-top: -41px;margin-left: 98px;border-radius: 6px;width: 186px;float:left" type="file" name="photo" accept="image/*">

        </div>
    </form>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
