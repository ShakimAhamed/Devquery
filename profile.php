<?php
include 'dbconnect.php';
session_start();
if($_SESSION['loggedin'] != 1)
    header('Location: index.php');
$user_name = $_SESSION['user_name'];

$sql1 ="select * from user where user_name='$user_name'";
$rst = $db->query($sql1);
$rs = $rst->fetch_assoc();
$profile_tag = $rs['profile_tag'];
$joined = $rs['date_of_join'];

$sql1 ="select COUNT(user_name) as cnt from following where following_user_name='$user_name'";
$rst = $db->query($sql1);
$rs = $rst->fetch_assoc();
$follower = $rs['cnt'];

$sql1 ="select COUNT(following_user_name) as cnt from following where user_name='$user_name'";
$rst = $db->query($sql1);
$rs = $rst->fetch_assoc();
$following = $rs['cnt'];




function get_vote($post_id,$vote_direction,$db){
    $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='$vote_direction'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    return $res['cnt'];
}


function check_vote($post_id,$vote_direction,$user_name,$db){
    $sql = "select COUNT(user_name) as cnt from vote where post_id='$post_id' and vote_direction='$vote_direction' and user_name = '$user_name'";
    $result = $db->query($sql);
    $res = $result->fetch_assoc();
    $temp = $res['cnt'];

    if($temp == 1) return true;
    else return false;
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
                <a href="#" class="active" id="nav-a"><img src="img/user.ico" style="height: 35px;width: 35px;float: left; margin-right: 5px "/><?php echo $_SESSION['user_name']; ?></a>
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
        <div class="col-lg-3" style="background-color:whitesmoke;height: 555px;position: fixed;margin-left: 10px;box-shadow:20px 20px 50px 10px lightblue inset ">



            <div style="margin-top: 18px ">
                <img src="img/post.svg" style="height: 35px;width: 35px;margin-left:125px;"/><br>
                <a href="ask.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none;margin-left:105px;">Interests</a>
            </div>


            <div style="margin-top: 0px ">
                <button type="button" class="btn" style="width:32%">#Pyhon</button>
				<button type="button" class="btn btn-danger btn-md" style="width:32%">#Java</button>
				<button type="button" class="btn btn-primary btn-md" style="width:32%">#Angular JS</button>
            </div>

            <div style="margin-top: 0px ">
                <button type="button" class="btn btn-info" style="width:49%">#Rasberrypie</button>
				<button type="button" class="btn btn-warning" style="width:49%">#Laravel</button>
            </div>

            <div style="margin-top: 18px ">
                <a href="ask.php" class="active" Style="font-family: sofia;font-size: 18px;text-decoration: none"><img src="img/contact.svg" style="height: 25px;width: 25px;margin-right:10px;"/>Phone: 01770833855</a>
            </div>


            <div style="margin-top: 10px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 18px;text-decoration: none"><img src="img/256px-Email_Shiny_Icon.svg.png" style="height: 30px;width: 30px;margin-right:10px;"/>Email: sakib@yahoo.com</a>
            </div>
            <div style="margin-top: 10px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 16px;text-decoration: none"><img src="img/github.png" style="height: 30px;width: 30px;margin-right:10px;"/>Github: https://github.com/mk006</a>
            </div>
            <div style="margin-top: 10px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 16px;text-decoration: none"><img src="img/in.png" style="height: 30px;width: 30px;margin-right:10px;"/>Linkedin:</a>
            </div>
			<div style="margin-top: 10px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 16px;text-decoration: none"><img src="img/twitter.png" style="height: 30px;width: 30px;margin-right:10px;"/>Twitter:</a>
            </div>
            <div style="margin-top: 10px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 16px;text-decoration: none"><img src="img/facebook.png" style="height: 30px;width: 30px;margin-right:10px;"/>Facebook:</a>
            </div>
            <div style="margin-top: 60px ">
                <a href="about.php" class="active" Style="font-family: sofia;font-size: 16px;text-decoration: none"><img src="img/about.svg" style="height: 30px;width: 30px;margin-right:10px;"/>About</a>
            </div>
            <div style="margin-top: 10px ">
                <a href="#" class="active" Style="font-family: sofia;font-size: 16px;text-decoration: none"><img src="img/contact.svg" style="height: 30px;width: 30px;margin-right:10px;"/>Contact</a>
            </div>



        </div>
        <div class="col-lg-9" style="background-color:white;margin-left: 385px;width:70%">








            <!----------------------------post 1--------------------->
        <div class="col-lg-12" style="border: 1px solid black">
            <div class="col-lg-7" style="margin-top:10px;padding-bottom: 10px ">
                <div style="margin: 20px 0px 10px 10px;">
                    <a  class="active" Style="font-family: sofia;font-size: 40px;text-decoration: none; "><img src="img/user.ico" style="height: 150px;width: 150px;margin-right:10px;"/><?php echo $_SESSION['user_name']; ?></a>
                </div>
                <div style="margin: 0px 10px 10px 10px;">
                    <h4 style="font-family: sofia;color:#337ab7;font-weight: bolder;font-size: 30px;"><?php echo $profile_tag;?></h4>
                    <p style="font-family: sofia;color:black;font-weight: bolder;font-size: 15px;">Joined</p>
                    <h4 style="font-family: sofia;color:#337ab7;font-weight: bolder;font-size: 20px;"><?php echo $joined;?></h4>
                </div>

                <div style="margin: 30px 10px 0px 10px;">
                    <button type="button" class="btn" style="width:22%">Edit Profile</button>
                </div>

          	</div>
          	<div class="col-lg-4" style="margin-top:10px;padding-bottom: 10px ">
                <div style="margin: 50px 0px 10px 50px;">
                    <a  class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none; "><img src="img/follower.png" style="height: 50px;width: 50px;margin-right:10px;"/><?php echo $follower;?> Follower</a>
                </div>
                <div style="margin: 50px 0px 10px 50px;">
                    <a  class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none; "><img src="img/following.png" style="height: 50px;width: 50px;margin-right:10px;"/><?php echo $following;?> Following</a>
                </div>

          	</div>
            <!----------------------------post 2--------------------->
		</div>


            <?php
            $sql ="select * from my_post where user_name='$user_name'";
            $result = $db->query($sql);
            $res = $result->fetch_assoc();
            $posts = array();
            while($res){
                array_push($posts,$res['post_id']);
                $res = $result->fetch_assoc();
            }
            $posts =array_reverse($posts);
            for($i = 0; $i < count($posts); $i++) {
                $sql = "select * from post natural join my_post where post_id='$posts[$i]'";
                $result = $db->query($sql);
                $res = $result->fetch_assoc();
                $post_title = $res['post_title'];
                $post_description = $res['post_description'];
                $posts_owner = $res['user_name'];
                $img = $res['img'];
                $post_id = $res['post_id'];

            ?>

            <div class="col-lg-12" style="border: 1px solid black;margin-top: 15px">
                <div style="margin: 30px 0px 10px 10px;">
                    <a href="profile.php" class="active" Style="font-family: sofia;font-size: 20px;text-decoration: none; "><img src="img/user.ico" style="height: 35px;width: 35px;margin-right:10px;"/><?php echo $posts_owner?></a>
                </div>
                <div style="margin: 0px 10px 10px 10px;">
                    <h2><b><?php echo "<a href='post.php?post_id=$post_id' style='color: darkblue;text-decoration: none;'>$post_title</a>"?></b></h2>
                </div>

                <div class="col-lg-7" style="height: 200px;" >

                    <p>
                       <?php echo $post_description;?>
                    </p>
                </div>

                <div class="col-lg-3" style="" >
                    <img src="postimg/<?php echo $post_id;?>.jpg" style="height: 200px;width: 342px;margin-right:5px;"/>
                </div>


                <?php

                $sql = "select COUNT(comment_id) as cnt from comment where post_id='$posts[$i]'";
                $result = $db->query($sql);
                $res = $result->fetch_assoc();
                $comment_count = $res['cnt'];


                $plusvote_count = get_vote($posts[$i],"plus",$db);
                $minusvote_count = get_vote($posts[$i],"minus",$db);


                ?>

                <div class="col-lg-12" style="border-top: 2px solid black; margin: 3px 0px 5px 0px">
                    <ul class="nav navbar-nav" style="float: left">
                        <li>

                            <?php if(check_vote($post_id,'plus',$_SESSION['user_name'],$db)) {?>
                                <button type="button"  onclick="plusvote(<?php echo $post_id;?>)" class="btn btn-link" style="text-decoration: none;border: none;"><img src="img/plus.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px;"/><span id="<?php echo $post_id;?>" style="color:darkblue;font-weight: bolder"><?php echo "+".$plusvote_count;?></span></button>
                            <?php } else { ?>
                                <button type="button"  onclick="plusvote(<?php echo $post_id;?>)" class="btn btn-link" style="text-decoration: none;border: none;"><img src="img/plus.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px;"/><span id="<?php echo $post_id;?>" style="color:#407fe5;font-weight: normal"><?php echo "+".$plusvote_count;?></span></button>
                            <?php }?>
                        </li>
                        <li>
                            <?php $minusid = $post_id + 200000;?>

                            <?php if(check_vote($post_id,'minus',$_SESSION['user_name'],$db)) {?>
                                <button type="button"  onclick="minusvote(<?php echo $minusid;?>)" class="btn btn-link" style="text-decoration: none;"><img src="img/minus.svg" style="height: 33px;width: 34px;float: left;margin-right: 5px;cursor: pointer;"/><span id="<?php echo $minusid;?>" style="color:darkblue;font-weight: bolder"><?php echo "-".$minusvote_count;?></span></button>
                            <?php } else { ?>
                                <button type="button"  onclick="minusvote(<?php echo $minusid;?>)" class="btn btn-link" style="text-decoration: none;"><img src="img/minus.svg" style="height: 33px;width: 34px;float: left;margin-right: 5px;cursor: pointer;"/><span id="<?php echo $minusid;?>" style="color:#407fe5;font-weight: normal"><?php echo "-".$minusvote_count;?></span></button>
                            <?php } ?>

                        </li>

                        <li>
                            <button type="button"   onclick="location.href='post.php?post_id=<?php echo $post_id; ?>';" class="btn btn-link" style="text-decoration: none;"><img src="img/msg12.svg" style="height: 34px;width: 34px;float: left;margin-right: 5px;cursor: pointer;"/><?php echo "Comments(".$comment_count.")";?></button>

                        </li>
                        <li>
                            <button type="button" class="btn btn-link" style="text-decoration: none;margin-left: 210px;"><img src="img/saved.svg" style="height: 34px;width: 34px;float: left;margin-left: 179px;cursor: pointer;"/></button>

                        </li>

                        <li>
                            <button type="button" class="btn btn-link" style="text-decoration: none;" ><img src="img/1053181.svg" style="height: 33px;width: 34px;float: left;margin-left: 2px;cursor: pointer;"/></button>

                        </li>
                        </ul>
                </div>


            </div>
            <?php }?>


        </div>

        
    </div>
</div>
<script>
    function plusvote(id) {

        var postid = id;
        $.ajax({
            type: "POST",
            url: "validation.php",
            data: {
                postid:postid,
                action:"plusvote",

            },
            dataType: "json",
            success: function(data) {

                if(data[0] == 1) {
                    pluscount = data[1];
                    pluscount = "+"+pluscount;
                    document.getElementById(id).innerText = pluscount;
                    document.getElementById(id).style.fontWeight = 'bolder';
                    document.getElementById(id).style.color = 'darkblue';

                }
                else if(data[0] == 2){
                    pluscount = data[1];
                    pluscount = "+"+pluscount;
                    document.getElementById(id).innerText = pluscount;
                    document.getElementById(id).style.fontWeight = 'normal';
                    document.getElementById(id).style.color = '#407fe5';

                }
                else if(data[0] == 3){
                    var otherid  = parseInt(id) + 200000;
                    otherid = otherid.toString();
                    pluscount = data[1];
                    pluscount = "+"+pluscount;
                    minuscount = data[2];
                    minuscount = "-"+minuscount;
                    document.getElementById(id).style.fontWeight = 'bolder';
                    document.getElementById(id).style.color = 'darkblue';
                    document.getElementById(id).innerText = pluscount;
                    document.getElementById(otherid).style.fontWeight = 'normal';
                    document.getElementById(otherid).style.color = '#407fe5';
                    document.getElementById(otherid).innerText = minuscount;

                }

            }
        });

    }

    function minusvote(id) {


        var postid = parseInt(id);
        var postid = postid - 200000;
        $.ajax({
            type: "POST",
            url: "validation.php",
            data: {
                postid:postid,
                action:"minusvote",

            },
            dataType: "json",
            success: function(data) {

                if(data[0] == 1) {
                    minuscount = data[1];
                    minuscount = "-"+minuscount;
                    document.getElementById(id).innerText = minuscount;
                    document.getElementById(id).style.fontWeight = 'bolder';
                    document.getElementById(id).style.color = 'darkblue';

                }
                else if(data[0] == 2){
                    minuscount = data[1];
                    minuscount = "-"+minuscount;
                    document.getElementById(id).innerText = minuscount;
                    document.getElementById(id).style.fontWeight = 'normal';
                    document.getElementById(id).style.color = '#407fe5';

                }
                else if(data[0] == 3){
                    var otherid  = postid;
                    otherid = otherid.toString();
                    minuscount = data[1];
                    minuscount = "-"+minuscount;
                    pluscount = data[2];
                    pluscount = "+"+pluscount;
                    document.getElementById(id).style.fontWeight = 'bolder';
                    document.getElementById(id).style.color = 'darkblue';
                    document.getElementById(id).innerText = minuscount;
                    document.getElementById(otherid).style.fontWeight = 'normal';
                    document.getElementById(otherid).style.color = '#407fe5';
                    document.getElementById(otherid).innerText = pluscount;

                }

            }
        });


    }
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>