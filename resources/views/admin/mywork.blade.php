<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <script type="text/javascript" src="/homes/theme/js/jquery.js"></script>

</head>
<body>
    <div id="mywork" align="center"><img src="/images/mywork/mywork.png" alt=""></div>
    <div align="center">您已被禁止登陆,请联系管理员解决！</div>
    <script>
    	$("#mywork").click(function(){
            $(window).attr('location',"/admin/login");
        });
    </script>
</body>
</html>