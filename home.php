<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="style.css">
    <title>Home Page </title>
</head>



<body>
    <div class="container-fluid " id="header">
        <div class="row" id="row_info">
            <div class="col-2 text-center py-1">
                <img src="./image/liion.jpg" width="100" height="100" style="border-radius:50%;height: 67px;width: 92px;">
        </div>
        <div class=" col-8 my-2 offset-2">
                <h1><i class="heading">"Act Before It Vanishes Forever"</i></h1>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 text-center py-5" id="left_sidebar">
                <!-- <i><h3 class="title">"Act Before It Vanishes Forever"<h3></i> -->
            </div>
            <div class="col-lg-10" id="content">

            </div>
            <div class="col-lg-1 text-center py-5" id="right_sidebar">
                <!-- <i><h3 class="title">" Save the Animals, They Will Save You"<h3></i> -->
            </div>
        </div>
    </div>

    <marquee behavior="slide" loop="200"  scrollamount="10" direction="left">
        <img src="./image/cat.jpg " width="100" height="100"> <img src="./image/elephants.jpg" width="100" height="100" alt="smile">
        <img src="./image/ice.jpg" width="100" height="100" alt="smile"> <img src="./image/liion.jpg" width="100" height="100" alt="smile">
        <img src="./image/pexels-casey-allen-16040.jpg" width="100" height="100" alt="smile"> <img src="./image/twotiger.jpg" width="100" height="100" alt="smile">
        <img src="./image/rino.jpg" width="100" height="100" alt="smile"> <img src="./image/pexels-anand-dandekar-3550969.jpg" width="100" height="100" alt="smile">
        <img src="./image/pexels-anthony-133408.jpg" width="100" height="100" alt="smile"> <img src="./image/pexels-jeremy-bishop-2422915.jpg" width="100" height="100" alt="smile">
        <img src="./image/pexels-jonas-von-werne-3354346.jpg" width="100" height="100" alt="smile"> <img src="./image/pexels-julissa-helmuth-3777200.jpg" width="100" height="100" alt="smile">
        <img src="./image/lion.jpg" width="100" height="100" alt="smile"> <img src="./image/sqi.jpg" width="100" height="100" alt="smile"> <img src="./image/pexels-marri-shyam-7437228.jpg" width="100" height="100" alt="smile">
    </marquee>
    <div class="container-fluid " id="footer">
        <div class="row">
            <div class="col-sm-3 text-center" id="Home">
            </div>
            <div class="col-sm-6 text-center my-2" id="connection">
                <p class="footer_detail">animalenquiry.co.in</p>
                <p class="footer_detail">120-140,5th floor,Noida,
                    Uttar Pradesh,India </p>
                <p class="footer_detail">?? copyrights 2022 All rights reserved.</p>
            </div>

            <div class="col-sm-3" id="Address">
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "dbconnect.php",
                data: {
                    'check_detail_content': 1,
                },
                dataType: "json",
                success: function(response) {
                    $('#content').html(response.content)
                    console.log(response)
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>