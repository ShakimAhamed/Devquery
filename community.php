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
<?php

include 'dbconnect.php';
session_start();
if($_SESSION['loggedin'] != 1)
    header('Location: index.php');

$sql = "select * from community";
$result = $db->query($sql);
$res = $result->fetch_assoc();


?>
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
        <ul class="nav navbar-nav" style="margin-right: 40px">
            <li>
                <a href="profile.php" class="active" id="nav-a"><img src="img/user.ico" style="height: 35px;width: 35px;float: left; margin-right: 5px "/><?php echo $_SESSION['user_name'];?></a>
            </li>

            <li>
                <a href="#" id="nav-a"><img src="img/notify.png" style="height: 34px;width: 34px;float: left;margin-right: 5px"/> [10] </a>
            </li>

            <li>
                <a href="#" id="nav-a"><img src="img/chat.png" style="height: 34px;width: 34px;float: left;margin-right: 5px"/>[2] </a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-align-justify"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2" style="background-color:whitesmoke;height: 555px;position: fixed;margin-left: 10px;box-shadow:20px 20px 50px 10px lightblue inset ">



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
            <div style="margin-top: 180px ">
                <a href="about.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/about.svg" style="height: 35px;width: 35px;margin-right:10px;"/>About</a>
            </div>
            <div style="margin-top: 18px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none"><img src="img/contact.svg" style="height: 35px;width: 35px;margin-right:10px;"/>Contact</a>
            </div>


        </div>
    </div>
</div>



<div class="col-lg-8" style="margin-left: 295px">
    <div style="margin: 20px 0px 10px 0px;">
        <div class="col-lg-6" style="" >
            <img src="img/community-management-small.PNG" style="height: 400px;width: 950px;margin-right:5px;"/>
        </div>
    </div>
</div>

<div class="col-lg-8 "  style="margin-left: 325px ;margin-top: 3%; width: 72.5%;  border: 3px solid rgb(111, 209, 81) ">
    <h1 style="text-align: center">My Communities</h1>
</div>

<?php $community_id = $res['community_id']; ?>
<?php $community_title = $res['community_title']; ?>

<div class="col-lg-4">
    <div class="col-lg-4" style="margin-left: 310px ;margin-top: 5%; width: 250px;height: 300px;  border: 2px solid rgb(111, 209, 81) ">
        <h3 style="text-align: center" </h3><b><?php echo "<a href='community_home.php?community_id=$community_id' style='color: darkblue;text-decoration: none;'>$community_title</a>"?></b></h3>
        <img src="communityphoto/<?php echo $community_id;?>.jpg" style="height: 50px;width: 50px;margin-top: -60px">
        <p>
            <?php echo $res['community_description'];?>
        </p>

        <div style="margin-top: -18px;width: 150px; height: 169px;margin-left: 42px;">
            <?php
            $user_name = $_SESSION['user_name'];
            $community_id = $res['community_id'];
            $sql = "select * from community_follower where user_name='$user_name' and community_id='$community_id'";
            $rst = $db->query($sql);
            $rs = $rst->fetch_assoc();
            if($rs){?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: #197fdf;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Following</button>
            <?php } else {?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: green;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Follow</button>
            <?php } ?>

        </div>
    </div>
</div>

<?php $res = $result->fetch_assoc(); ?>
<?php $community_id = $res['community_id']; ?>
<?php $community_title = $res['community_title']; ?>

<div class="col-lg-4">
    <div class="col-lg-4" style="margin-left: 221px ;margin-top: 5%; width: 250px;height: 300px;  border: 2px solid rgb(111, 209, 81) ">
        <h3 style="text-align: center" </h3><b><?php echo "<a href='community_home.php?community_id=$community_id' style='color: darkblue;text-decoration: none;'>$community_title</a>"?></b></h3>
        <img src="communityphoto/<?php echo $community_id;?>.jpg" style="height: 50px;width: 50px;margin-top: -60px">
        <p>
            <?php echo $res['community_description'];?>
        </p>

        <div style="margin-top: -18px;width: 150px; height: 169px;margin-left: 42px;">
            <?php
            $user_name = $_SESSION['user_name'];
            $community_id = $res['community_id'];
            $sql = "select * from community_follower where user_name='$user_name' and community_id='$community_id'";
            $rst = $db->query($sql);
            $rs = $rst->fetch_assoc();
            if($rs){?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: #197fdf;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Following</button>
            <?php } else {?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: green;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Follow</button>
            <?php } ?>

        </div>
    </div>
</div>

<?php $res = $result->fetch_assoc(); ?>
<?php $community_id = $res['community_id']; ?>
<?php $community_title = $res['community_title']; ?>

<div class="col-lg-4">
    <div class="col-lg-4" style="margin-left: 135px ;margin-top: 5%; width: 250px;height: 300px; border: 2px solid rgb(111, 209, 81) ">
        <h3 style="text-align: center" </h3><b><?php echo "<a href='community_home.php?community_id=$community_id' style='color: darkblue;text-decoration: none;'>$community_title</a>"?></b></h3>
        <img src="communityphoto/<?php echo $community_id;?>.jpg" style="height: 50px;width: 50px;margin-top: -60px">
        <p>
            <?php echo $res['community_description'];?>
        </p>

        <div style="margin-top: -18px;width: 150px; height: 169px;margin-left: 42px;">
            <?php
            $user_name = $_SESSION['user_name'];
            $community_id = $res['community_id'];
            $sql = "select * from community_follower where user_name='$user_name' and community_id='$community_id'";
            $rst = $db->query($sql);
            $rs = $rst->fetch_assoc();
            if($rs){?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: #197fdf;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Following</button>
            <?php } else {?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: green;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Follow</button>
            <?php } ?>

        </div>
    </div>
</div>

<?php $res = $result->fetch_assoc(); ?>
<?php $community_id = $res['community_id']; ?>
<?php $community_title = $res['community_title']; ?>

<div class="col-lg-4">
    <div class="col-lg-4" style="margin-left: 310px ;margin-top: 5%; width: 250px;height: 300px; border: 2px solid rgb(111, 209, 81) ">
        <h3 style="text-align: center" </h3><b><?php echo "<a href='community_home.php?community_id=$community_id' style='color: darkblue;text-decoration: none;'>$community_title</a>"?></b></h3>
        <img src="communityphoto/<?php echo $community_id;?>.jpg" style="height: 50px;width: 50px;margin-top: -60px">
        <p>
            <?php echo $res['community_description'];?>
        </p>

        <div style="margin-top: -18px;width: 150px; height: 169px;margin-left: 42px;">
            <?php
            $user_name = $_SESSION['user_name'];
            $community_id = $res['community_id'];
            $sql = "select * from community_follower where user_name='$user_name' and community_id='$community_id'";
            $rst = $db->query($sql);
            $rs = $rst->fetch_assoc();
            if($rs){?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: #197fdf;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Following</button>
            <?php } else {?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: green;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Follow</button>
            <?php } ?>

        </div>
    </div>
</div>

<?php $res = $result->fetch_assoc(); ?>
<?php $community_id = $res['community_id']; ?>
<?php $community_title = $res['community_title']; ?>

<div class="col-lg-4">
    <div class="col-lg-4" style="margin-left: 221px ;margin-top: 5%; width: 250px;height: 300px;  border: 2px solid rgb(111, 209, 81) ">
        <h3 style="text-align: center" </h3><b><?php echo "<a href='community_home.php?community_id=$community_id' style='color: darkblue;text-decoration: none;'>$community_title</a>"?></b></h3>
        <img src="communityphoto/<?php echo $community_id;?>.jpg" style="height: 50px;width: 50px;margin-top: -60px">
        <p>
            <?php echo $res['community_description'];?>
        </p>

        <div style="margin-top: -18px;width: 150px; height: 169px;margin-left: 42px;">
            <?php
            $user_name = $_SESSION['user_name'];
            $community_id = $res['community_id'];
            $sql = "select * from community_follower where user_name='$user_name' and community_id='$community_id'";
            $rst = $db->query($sql);
            $rs = $rst->fetch_assoc();
            if($rs){?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: #197fdf;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Following</button>
            <?php } else {?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: green;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Follow</button>
            <?php } ?>

        </div>
    </div>
</div>

<?php $res = $result->fetch_assoc(); ?>
<?php $community_id = $res['community_id']; ?>
<?php $community_title = $res['community_title']; ?>


<div class="col-lg-4">
    <div class="col-lg-4" style="margin-left: 135px ;margin-top: 5%; width: 250px;height: 300px; border: 2px solid rgb(111, 209, 81) ">
        <h3 style="text-align: center" </h3><b><?php echo "<a href='community_home.php?community_id=$community_id' style='color: darkblue;text-decoration: none;'>$community_title</a>"?></b></h3>
        <img src="communityphoto/<?php echo $community_id;?>.jpg" style="height: 50px;width: 50px;margin-top: -60px">
        <p>
            <?php echo $res['community_description'];?>
        </p>

        <div style="margin-top: -18px;width: 150px; height: 169px;margin-left: 42px;">
            <?php
            $user_name = $_SESSION['user_name'];
            $community_id = $res['community_id'];
            $sql = "select * from community_follower where user_name='$user_name' and community_id='$community_id'";
            $rst = $db->query($sql);
            $rs = $rst->fetch_assoc();
            if($rs){?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: #197fdf;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Following</button>
            <?php } else {?>
                <button type="button"  id="<?php echo $res['community_id']; ?>" onclick="func(<?php echo $res['community_id']; ?>)" style="color: white;border-radius: 6px;background-color: green;color: white;padding: 9px 20px;margin: 8px 0;border: none;cursor: pointer;width: 86%; height: 37px;">Follow</button>
            <?php } ?>

        </div>
    </div>
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script>
    function func(id) {
        var btn = document.getElementById(id);

        var user_name = "<?php echo $_SESSION['user_name'] ?>";


        $.ajax({
            type: "POST",
            url: "validation.php",
            data: {
                id:id,
                user_name:user_name,
                action:"communityfollow"
            },
            success: function(data) {

                if(data == 1) {
                    btn.style.backgroundColor = 'green';
                    btn.innerText = "Follow";

                }
                else{
                    btn.style.backgroundColor = '#197fdf';
                    btn.innerText = "following";

                }

            }
        });
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
