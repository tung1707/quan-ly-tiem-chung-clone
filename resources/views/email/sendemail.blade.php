<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail Form</title>
    
</head>

<body style=" background: #780206;
/* fallback for old browsers */
background: -webkit-linear-gradient(to right, #061161, #780206);
/* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #061161, #780206);
/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
    <div style="  position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);">
        <!-- <h1 style="  text-align: center;
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
   ">Trung tâm tiêm chủng vaccine Covid-19</h1> -->
        <div style="margin: 0 auto;
        width: auto;
        height: auto;
        text-align: center;
        background: rgba(red, green, blue, 0.3);
        
   
        font-family: Geneva, Verdana, sans-serif;
        padding: 30px;">
            <h3 style="font-family: Tahoma, sans-serif;
            color: rgb(0, 204, 102);
            font-size: 1.25em;">Bạn đã đăng ký tài khoản thành công!!!</h3>
            <div style="  padding: 10px;
            font-size: 1.5em;">
                <span style="color: #fff">Email: </span> {{$emails}}
            </div>
            <div style=" padding: 10px;
            font-size: 1.5em;">
                <span style="color: #fff">Mật khẩu: </span><span style="color: #fff">{{$password}}</span>
            </div>
            <p style="font-size: larger; color: #fff">Xin chân thành cảm ơn bạn!!</p>
        </div>
    </div>
</body>

</html>