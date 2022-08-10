
<?php
include ('./config.php');
$first_time= 'Not Set';
$rating= 'Not Set';
$fcategory= 'Not Set';
$comment= 'Not Set';
$customer_service= 'Not Set'; //$_POST['rating1'] customer service
$service_as_discribed = 'Not Set'; //$_POST['rating2'] service as discribed
$satisfaction_rating = 'Not Set'; //$_POST['rating3']  How about your satisfaction
$service_quality_rating = 'Not Set'; //$_POST['rating4']  service quality
$recommend_rating = 'Not Set'; //$_POST['rating5']  Buy again or Recommend


if(isset($_POST['ck'])){
    $first_time =  $_POST['ck'];
}
if(isset($_POST['rating'])){
    $rating =  $_POST['rating'];
}
if(isset($_POST['fcategory'])){
    $fcategory =  $_POST['fcategory'];
}
if(isset($_POST['comment'])){
    $comment =  $_POST['comment'];
}
if(isset($_POST['rating1'])){
    $customer_service =  $_POST['rating1'];
}
if(isset($_POST['rating2'])){
    $service_as_discribed =  $_POST['rating2'];
}
if(isset($_POST['rating3'])){
    $satisfaction_rating =  $_POST['rating3'];
}
if(isset($_POST['rating4'])){
    $service_quality_rating =  $_POST['rating4'];
}
if(isset($_POST['rating5'])){
    $recommend_rating =  $_POST['rating5'];
}


$sql = "INSERT INTO `site_feedback` (
`first_time`
,`rating`
,`feedback_category`
,`comment`
,`cs_rating`
,`sad_rating`
,`sat_rating`
,`sq_rating`
,`rec_rating`
)
VALUES (
'$first_time'
,'$rating'
,'$fcategory'
,'$comment'
,'$customer_service'
,'$service_as_discribed'
,'$satisfaction_rating'
,'$service_quality_rating'
,'$recommend_rating'
)";



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../Dinushka/Styles/style.css">
    <title>Feedback</title>
</head>
<body style="text-align: center; ">


<?php
if ($conn->query($sql) === TRUE) {
    echo "<h1 style='text-align: center; margin-top: 20%; color: green;'>Thank You For Your Feedback !</h1>";
} else {

    echo "<h1 style='text-align: center; margin-top: 20%; color: red;'>Not Saved !</h1><br>";
//    echo "<h1 style='text-align: center; margin-top: 20%; color: red;'>" . $sql . "<br>" . $conn->error."</h1>";
}


?>

<br>
<br>
<div class="loadingio-spinner-ellipsis-zw0jpszrxf"><div class="ldio-u8rg5idk82f">
        <div></div><div></div><div></div><div></div><div></div>
    </div></div>
<style type="text/css">
    @keyframes ldio-u8rg5idk82f {
        0% { transform: translate(12px,80px) scale(0); }
        25% { transform: translate(12px,80px) scale(0); }
        50% { transform: translate(12px,80px) scale(1); }
        75% { transform: translate(80px,80px) scale(1); }
        100% { transform: translate(148px,80px) scale(1); }
    }
    @keyframes ldio-u8rg5idk82f-r {
        0% { transform: translate(148px,80px) scale(1): }
        100% { transform: translate(148px,80px) scale(0); }
    }
    @keyframes ldio-u8rg5idk82f-c {
        0% { background: #85a2b6 }
        25% { background: #fdfdfd }
        50% { background: #dce4eb }
        75% { background: #bbcedd }
        100% { background: #85a2b6 }
    }
    .ldio-u8rg5idk82f div {
        position: absolute;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        transform: translate(80px,80px) scale(1);
        background: #85a2b6;
        animation: ldio-u8rg5idk82f 1s infinite cubic-bezier(0,0.5,0.5,1);
    }
    .ldio-u8rg5idk82f div:nth-child(1) {
        background: #bbcedd;
        transform: translate(148px,80px) scale(1);
        animation: ldio-u8rg5idk82f-r 0.25s infinite cubic-bezier(0,0.5,0.5,1), ldio-u8rg5idk82f-c 1s infinite step-start;
    }.ldio-u8rg5idk82f div:nth-child(2) {
         animation-delay: -0.25s;
         background: #85a2b6;
     }.ldio-u8rg5idk82f div:nth-child(3) {
          animation-delay: -0.5s;
          background: #bbcedd;
      }.ldio-u8rg5idk82f div:nth-child(4) {
           animation-delay: -0.75s;
           background: #dce4eb;
       }.ldio-u8rg5idk82f div:nth-child(5) {
            animation-delay: -1s;
            background: #fdfdfd;
        }
    .loadingio-spinner-ellipsis-zw0jpszrxf {
        width: 200px;
        height: 200px;
        display: inline-block;
        overflow: hidden;
        background: none;
    }
    .ldio-u8rg5idk82f {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0;
    }
    .ldio-u8rg5idk82f div { box-sizing: content-box; }

</style>
<script>
    window.setTimeout(function(){

        window.location.href = "../Dinushka/home.php";

    }, 3000);
</script>
</body>
</html>
