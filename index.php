
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inter-Pacific Study and Migration Consultancy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
    <style>
     /* Style the video: 100% width and height to cover the entire window */

        /* Add some content at the bottom of the video/page */
        .content {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            height: 100%;
            right: 0;
        }

                /* Style the button used to pause/play the video */
        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            color: black;
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .login-page h3 {
            text-align: center; 
            width: 80%; 
            margin: -60px auto 20px;
            font-family: 'Playfair Display', serif; 
            text-transform: uppercase; 
            font-size: 20px;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form button:hover,.form button:active,.form button:focus {
            background: #43A047;
        }
            
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }

        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }

        .container .info {
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }

        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #EF3B3A;
        }

        .login-form  .img-wrapper img {
            max-width: 50%;
        }

        .login-form .title {
            color: black;
            font-family: "Roboto", sans-serif;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0 auto 10px;
        }

        body {
            background: url("assets/images/login-bg.jpg") no-repeat;
            font-family: "Roboto", sans-serif;
            background-position-x: -150px;
            background-position-y: -100px;
        }
    </style>
</head>
<body>
    <!-- Optional: some overlay text to describe the video -->
    <div class="content">
        <div class="login-page">
            <h3>Inter-Pacific Study and Migration Consultancy</h3>
            <div class="form">
                <form class="login-form" action="login-action.php" method="POST">
                    <div class="img-wrapper">
                        <img src="assets/images/visa4.png">
                    </div>
                    <p class="title">Login</p>
                    <input type="text" placeholder="username" name="username"/>
                    <input type="password" placeholder="password" name="password"/>
                    <button name="submit" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>
