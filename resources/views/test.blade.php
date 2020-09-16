
 @extends("layouts.admin")
 @section("title",'后台商品列表')
         <!--  -->
 @section('content')


<!DOCTYPE html>
<html>

<head>


  <meta charset="UTF-8">

  <title>zbc</title>

  <style>
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}

</style>

    <style>
@charset "utf-8";
/* CSS Document */
body, html {
  height: 100%;
}

body {
    background: rgb(209,228,234);
background: -moz-radial-gradient(center, ellipse cover,  rgba(209,228,234,1) 0%, rgba(186,228,244,1) 100%);
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(209,228,234,1)), color-stop(100%,rgba(186,228,244,1)));
background: -webkit-radial-gradient(center, ellipse cover,  rgba(209,228,234,1) 0%,rgba(186,228,244,1) 100%);
background: -o-radial-gradient(center, ellipse cover,  rgba(209,228,234,1) 0%,rgba(186,228,244,1) 100%);
background: -ms-radial-gradient(center, ellipse cover,  rgba(209,228,234,1) 0%,rgba(186,228,244,1) 100%);
background: radial-gradient(ellipse at center,  rgba(209,228,234,1) 0%,rgba(186,228,244,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d1e4ea', endColorstr='#bae4f4',GradientType=1 );

    padding:0;
    margin:0;
}
.country-wrap {
    position:relative;
    width:100%;
    height:100%;
    overflow:hidden;
}
.push-bottom {
    position:absolute;
    bottom:0;
    height:100%;
}
.bottom-ground {
    background:#8d773e;
    width:102%;
    left:-1%;
    height:60px;
    bottom:0;
    position:absolute;
    box-shadow:0 2px 3px rgba(0,0,0,0.2) inset;
}
.street {
    background:#7a7a7a   url(data:image/png;base64,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);
    height:80px;
    width:102%;
    position:absolute;
    bottom:0;
    box-shadow:0 1px 16px rgba(111, 35, 51, 0.4) inset;
}
.street:after {
    content:'';
    display:block;
    position:absolute;
    width:100%;
    height:10px;
    background:#cdbcb4;
    bottom:0;
    border-bottom:3px solid #72625a;
    z-index:1;
}
.street:before {
    content:'';
    display:block;
    position:absolute;
    width:100%;
    height:7px;
    background:#c2a99d;
    bottom:-7px;
    z-index:1;
}

.street-stripe {
    background:#d4d4d4;
    height:8px;
    width:100px;
    position:absolute;
    bottom:44px;
    border-radius:2px;
    box-shadow:200px 0 0 #d4d4d4, 400px 0 0 #d4d4d4 , 600px 0 0 #d4d4d4 , 800px 0 0 #d4d4d4 , 1000px 0 0 #d4d4d4 , 1200px 0 0 #d4d4d4 , 1400px 0 0 #d4d4d4 , 1600px 0 0 #d4d4d4 , 1800px 0 0 #d4d4d4 , 2000px 0 0 #d4d4d4;
}
.grass {
    height: 40px;
    width: 100%;
    background-color: #dbcac2;
    position:absolute;
    bottom:60px;
}
.grass:before {
    position: absolute;
    content: '';
    top: 14px;
    left: 0;
    height: 8px;
    width: 100%;
    background-color: #b99f93;
}
.grass:after {
    position: absolute;
    content: '';
    top: -4px;
    left: 0;
    width: 100%;
    height: 8px;
    background-color: #0aa;
    background: linear-gradient(135deg, transparent 25%, #0aa 25%);
    background-size:10px 10px;
}
.sun {
    background:#ff9944;
    width:40px;
    height:40px;
    border-radius:50%;
    box-shadow:0 0 50px rgba(255,153,68,0.7);
    position:absolute;
    left:49%;
    bottom:350px;
}
.tree-1 {
    position:absolute;
    z-index:2;
    bottom:210px;
    right:10px;
    width:50px;
    height:100px;

}
.trunk {
    width:20%;
    height:30%;
    background:brown;
}
.branch {
    position:abslute;
    width:60%;
    height:30%;
    background:green;
    -moz-transform:rotate(45deg);
    border-radius:0 0 100% 0;
}
.branch-1 {
    border:50px solid;
    border-bottom:90px solid;
    border-color:transparent transparent #a5894a transparent;
    height: 0;
    width: 0;
    position:absolute;
    left:-50px;
    top:-70px;
}
.branch-2 {
    border-bottom: 40px solid #9d8346;
    border-left: 30px solid transparent;
    border-right: 30px solid transparent;
    height: 0;
    width: 100px;
    position:absolute;
    top:60px;
    left:-80px;
}
.branch-3 {
    border-bottom: 50px solid #90713b;
    border-left: 40px solid transparent;
    border-right: 40px solid transparent;
    height: 0;
    width: 100px;
    position:absolute;
    top:100px;
    left:-90px;
}
.mountain-1 {
    background:#cea392;
    width:500px;
    height:500px;
    position:absolute;
    -moz-transform:rotate(45deg);
    -webkit-transform:rotate(45deg);
    bottom:-150px;
    border-radius:40px;
}
.mountain-2 {
    background:#e4dbd2;
    width:800px;
    height:800px;
    position:absolute;
    -moz-transform:rotate(45deg);
    -webkit-transform:rotate(45deg);
    bottom:-350px;
    border-radius:40px;
    left:250px;
    z-index:-1;
    box-shadow: 0 0 25px #e4dbd2;
    opacity:0.6;
}
.la {
  position: absolute;
  bottom: 200px;
  width: 2px;
  height: 50px;
  background: $cd;
  margin-right: 20px;
}

.la:before {
  top: 5px;
  left: -10px;
  width: 22px;
  height: 2px;
  background: $cd;
}

.la:after {
  bottom: 0;
  left: -2px;
  width: 6px;
  height: 12px;
  background: $cd;
}

.l {
  position: absolute;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: #fff;
  box-shadow: 0 0 10px #fff, 0 0 25px #fff, 0 0 50px #fff;
}

.l:nth-child(1) { left: -10px; }
.l:nth-child(2) { right: -10px; }
/*styles for car*/
.car {
    position:absolute;

    top:-35%;
    z-index:10;
-moz-animation:myfirst 10s  linear infinite;
-webkit-animation:myfirst 10s  linear infinite;
}
@-moz-keyframes myfirst 
{
    0%   {left:-25%;}
    100% {left:100%;}
} 
@-webkit-keyframes myfirst
{
    0%   {left:-25%;}
    100% {left:100%;}
} 
.tyre {
    width:30px;
    height:30px;
    border-radius:50%;
    background:#3f3f40;
    position:absolute;
    z-index:2;
    left:9px;
    top:20px;
-moz-animation:tyre-rotate 1s infinite linear;
  -webkit-animation:tyre-rotate 1s infinite linear;
}
@-moz-keyframes tyre-rotate {
from{-moz-transform:rotate(-360deg);}
to{-moz-transform:rotate(0deg);}

}
@-webkit-keyframes tyre-rotate {
from{-webkit-transform:rotate(-360deg);}
to{-webkit-transform:rotate(0deg);}

}
.tyre:before {
    content:'';
    width:20px;
    height:20px;
    border-radius:50%;
    background:#bdc2bd;
    position:absolute;
    top:5px;
    left:5px;
}
.gap {
    background:#3f3f40;
    width:2px;
    height:4px;
    position:absolute;
    left:14px;
    top:8px;
    box-shadow:0 9px 0 #3f3f40;
}
.gap:before {
    content:'';
    display:block;
    width:2px;
    height:4px;
    position:absolute;
    background:#3f3f40;
    box-shadow:0 12px 0 #3f3f40;
    -webkit-transform:rotate(-90deg);
    -webkit-transform-origin:0 7px;
    -moz-transform:rotate(-90deg);
    -moz-transform-origin:0 7px;
    z-index:3;
}
.car-base {
    position:absolute;
    display:block;
    width: 125px;
    height: 30px;
    background:#000000;
    border-radius:  10% 10% 50% 50% / 60% 100% 20% 10%;
    -webkit-transform:rotate(-2deg);
    -moz-transform:rotate(-2deg);
    border:solid;
    border-color:#000000;
}
.back-bonet {
    background:  #4c4b4b;
    border-radius: 54% 25% 0 0;
    height: 22px;
    left: 11px;
    position: absolute;
    top: 8px;
    width: 40px;
}
.tyre.front {
    left:94px;
}
.car-body {
    /*width:125px;
    height:24px;
    background:#d1352b;
    border-top:1px solid #a82e27;*/
    border-bottom: 24px solid #d1352b;
    height: 0;
    top:10px;
    width: 120px;
    position:relative;
}
.car-body:before {
    content:'';
    display:inline-block;
    width:30px;
    height:24px;
    position:absolute;
    right:-5px;
    background:#d1352b;
    border-top-right-radius:4px;
    z-index:1;
}
.car-body:after {
    content:'';
    display:inline-block;
    width:121px;
    border-bottom: 1px solid #942b25;
    border-right: 2px solid transparent;
    height: 0;
    z-index:2;
    position:absolute;
}
.car-gate {
    width:32px;
    height:20px;
    background:#d1352b;
    border-radius:0 0 2px 8px / 0 0 2px 8px;
    box-shadow:0 0 0 1px #892924;
    position:absolute;
    left:48px;

}
.car-gate:before {
    content:'';
    width:8px;
    height:2px;
    background:#4c4b4b;
    position:absolute;
    top:2px;
    left:4px;
    box-shadow:1px 1px 1px rgba(0,0,0,0.1);
}
.car-top-back {
    background: none repeat scroll 0 0 #4C4B4B;
    border-radius: 5px 0 0 0;
    height: 20px;
    left: 4px;
    position: absolute;
    top: -20px;
    width: 58px;
}
.car-top-back:before {
    width:30px;
    height:15px;
    background:#736f6f;
    content:'';
    position:absolute;
    top:3px;
    left:8px;
    border-radius:2px;
}
.car-top-back:after {
    content:'';
    background:#4c4b4b;
    border-radius:  30%;
    height: 5px;
    left: 3px;
    position: absolute;
    top: -1px;
    width: 62px;
}
.car-top-front {
    top:-19px;
    position:absolute;
    left:47px;
    width:20px;
    height:20px;
    background:#dc4630;
    border-left: 1px solid #892924;
    border-radius: 2px 0 0 0;

}
.car-top-front:after {
    width:26px;
    height:20px;
    -webkit-transform:skew(37deg);
    -moz-transform:skew(37deg);
    background:#dc4630;
    content:'';
    position:absolute;
    top:0;
    left:6px;
    border-radius:4px 0 4px 4px;
}
.car-top-front:before {
    width:12px;
    height:5px;
    background:#dc4630;
    content:'';
    position:absolute;
    top:14px;
    left:28px;
    z-index:1;
    border:solid #a82e27;
    border-width:0 1px 1px 0;
}
.wind-sheild {
    top:3px;
    left:3px;
    position:absolute;
    z-index:3;
    width:18px;
    height:12px;
    background:#f5e7e7;
    border-radius:0 3px 0 0;
}
.wind-sheild:after {
    width:12px;
    height:12px;
    -webkit-transform:skew(25deg);
    -moz-transform:skew(25deg);
    background:#f5e7e7;
    content:'';
    position:absolute;
    top:0;
    left:10px;
    border-radius:3px;
}
.boundary-tyre-cover {
    position:absolute;
    top:14px; left:10px;
    border-bottom: 20px solid #4c4b4b;
    border-right: 10px solid transparent;
    height:0;
    width:20px;
}
.boundary-tyre-cover:before {
    content:'';
    position:absolute;
    display:inline-block;
    background:#4c4b4b;
    height:20px;
    width:15px;
    -webkit-transform:skewX(-20deg);
    -moz-transform:skewX(-20deg);
    border-radius:3px;
    left:-6px;
    top:0;
}
.boundary-tyre-cover:after {
    content:'';
    position:absolute;
    display:inline-block;
    background:#4c4b4b;
    height:20px;
    width:20px;
    -webkit-transform:skewx(40deg);
    -moz-transform:skewX(40deg);
    border-radius:3px;
    right:-14px;
    top:0;
}
.boundary-tyre-cover-inner {
    position:absolute;
    top:4px; left:4px;
    border-bottom: 16px solid black;
    border-right: 10px solid transparent;
    height:0;
    width:15px;
    z-index:2;
}
.boundary-tyre-cover-inner:before {
    content:'';
    position:absolute;
    display:inline-block;
    background:black;
    height:16px;
    width:15px;
    -webkit-transform:skewX(-20deg);
    -moz-transform:skewX(-20deg);
    border-radius:3px 3px 0 0;
    left:-6px;
    top:0;
}
.boundary-tyre-cover-inner:after {
    content:'';
    position:absolute;
    display:inline-block;
    background:black;
    height:16px;
    width:20px;
    -webkit-transform:skewx(40deg);
    -moz-transform:skewX(40deg);
    border-radius:3px 3px 0 0;
    right:-11px;
    top:0;
}
.boundary-tyre-cover-back-bottom {
    position: absolute;
    width: 14px;
    height: 8px;
    background: #4c4b4b;
    top: 12px;
    left: -19px;
}
.bonet-front {
    background: #d1352b;
    border-radius: 5px 258px 0 38px / 36px 50px 0 0;
    height: 4px;
    position: absolute;
    right: 0;
    top: -4px;
    width: 40px;
    z-index: 0;
}
.back-curve {
    background: none repeat scroll 0 0 #4C4B4B;
    border-radius: 960% 100% 0 0;
    height: 20px;
    left: -3px;
    position: absolute;
    top: 1px;
    transform: rotate(6deg);
    width: 5px;
}
.stepney {
    height: 6px;
    left: -4px;
    position: absolute;
    top: 6px;
    width: 8px;
    z-index: -1;
    background:#3f3f40;
}
.stepney:before {
    width:8px;
    height:12px;
    background:#3f3f40;
    content:'';
    position:absolute;
    top:-10px;
    left:-7px;
    border-radius:3px 3px 0 0;
}
.stepney:after {
    width:8px;
    height:12px;
    background:#0d0c0d;
    content:'';
    position:absolute;
    top:0px;
    left:-7px;
    border-radius:0 0 3px 3px;
}
.tyre-cover-front {
    background:#4c4b4b;
    height: 4px;
    left: 97px;
    position: absolute;
    top: 13px;
    width: 22px;
    z-index: 1;
}
.tyre-cover-front:before {
    background: none repeat scroll 0 0 #4c4b4b;
    content: "";
    display: inline-block;
    height: 21px;
    left: -10px;
    position: absolute;
    top: 0;
    transform: skewX(-30deg);
    width: 10px;
    z-index: 6;
    border-radius:4px 0 0 0;
}
.tyre-cover-front:after {
    background: none repeat scroll 0 0 #4c4b4b;
    content: "";
    display: inline-block;
    height: 6px;
    left: 14px;
    position: absolute;
    top: 0;
    transform: skewX(30deg);
    width: 17px;
    z-index: 6;
    border-radius:0 4px 2px 0;
}
.boundary-tyre-cover-inner-front {
    position:absolute;
    top:4px; left:4px;
    border-bottom: 16px solid black;
    border-right: 10px solid transparent;
    height:0;
    width:15px;
    z-index:7;
}
.boundary-tyre-cover-inner-front:before {
    background: none repeat scroll 0 0 #000000;
    border-radius: 3px 3px 0 0;
    content: "";
    display: inline-block;
    height: 17px;
    left: -10px;
    position: absolute;
    top: 0;
    transform: skewX(-30deg);
    width: 15px;
}
.boundary-tyre-cover-inner-front:after {
    content:'';
    position:absolute;
    display:inline-block;
    background:black;
    height:16px;
    width:20px;
    -webkit-transform:skewx(25deg);
    -moz-transform:skewX(25deg);
    border-radius:3px 3px 0 0;
    right:-12px;
    top:0;
}
.base-axcel {
    background: none repeat scroll 0 0 black;
    bottom: -15px;
    height: 10px;
    left: 30px;
    position: absolute;
    transform: rotate(-2deg);
    width: 70px;
    z-index:-1;
}
.base-axcel:before {
    background: none repeat scroll 0 0 black;
    border-radius: 0 0 0 10px / 0 0 0 5px;
    content: "";
    height: 10px;
    left: -35px;
    position: absolute;
    top: -2px;
    transform: rotate(6deg);
    width: 30px;    
}
.base-axcel:after {
    background: none repeat scroll 0 0 black;
    border-radius: 0 0 0 10px / 0 0 0 5px;
    content: "";
    height: 10px;
    right: -33px;
    position: absolute;
    top: -1px;
    transform: rotate(-4deg);
    width: 40px;
    border-radius:0 10px 5px 0; 
}
.front-bumper {
    background: none repeat scroll 0 0 #4c4b4b;
    border-radius: 0 2px 2px 0;
    height: 8px;
    position: absolute;
    right: -15px;
    width: 11px;
    z-index: 1;
    -moz-transform:rotate(-5deg);
    -webkit-transform:rotate(-5deg);
}
.front-bumper:before {
    background: none repeat scroll 0 0 #000000;
    content: "";
    height: 10px;
    left: -7px;
    position: absolute;
    transform: rotate(-22deg);
    width: 9px;
    z-index: 1;
}
.car-shadow {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    bottom: -15px;
    box-shadow: -5px 10px 15px 3px #000000;
    left: -7px;
    position: absolute;
    width: 136px;
}
/*noise css*/

.noise {
    position: relative;
    z-index: 1;
    }

.noise:before, .body-noise:before {
    content: "";
    position: absolute;
    z-index: -1;
    top:0;
    bottom:0;
    left:0;
    right:0;
    background-image: url(data:image/png;base64,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);

    }
.hill {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 250px;
  border-top-right-radius: 160%;
  border-top-left-radius: 100%;
  background-color: #adde60;
  z-index:-1;
}
.hill:after {
  content: '';
    position: absolute;
  bottom: -100px;
  right: -400px; 
    width: 120%;
  height: 110%;
  border-top-right-radius: 100%;
  border-top-left-radius: 0%;
  background-color: #94c943;
  -moz-transform:rotate(-12deg);
  -webkit-transform:rotate(-12deg);
  box-shadow:0 0 25px #cbf191 inset;
}
.hill:before {
  background-color: #93cc3a;
    border-top-left-radius: 0;
    border-top-right-radius: 100%;
    bottom: -70px;
    content: "";
    height: 110%;
    left: -54px;
    position: absolute;
    transform: rotate(4deg);
    width: 120%;
}
.cloud {
    background:#fff;
    width:150px;
    height:50px;
    border-radius:50px;
    position:absolute;
    left:450px;
    top:150px;
}
.cloud:before {
    width:100px;
    height:100px;
    content:'';
    position:absolute;
    bottom:0;
    left:-15px;
    border-radius:50px;
    box-shadow:100px 0 0 #fff;
    background:#fff;
}
</style>

=======
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>纯CSS3炫酷3D星空动画特效</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
    <style type="text/css">
        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            background: #000;
            perspective: 340px;
        }
        h1{
            color: white;
            text-align: center;
        }
        span{
            display: block;
            text-align: center;
        }
        .stars {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 2px;
            height: 2px;
            box-shadow: -447px 387px #c4c4c4, -401px 118px #fafafa, -109px 217px #d9d9d9, -680px -436px #e3e3e3, 514px 360px #cccccc, -708px 298px #e8e8e8, -696px -270px #ededed, 116px -128px #f7f7f7, 179px 35px white, -404px -90px whitesmoke, -331px -309px #c4c4c4, -363px -24px #d1d1d1, 277px 416px #fafafa, -145px -244px whitesmoke, 123px 62px #d4d4d4, -407px 418px #d9d9d9, 535px 237px #d9d9d9, -466px -78px #f7f7f7, 257px 287px #dedede, 327px -398px #e0e0e0, -602px -38px #c2c2c2, 128px 398px #e6e6e6, 274px -446px #d1d1d1, -602px -298px #c7c7c7, 526px -5px #c4c4c4, -90px -158px #fcfcfc, 5px 294px whitesmoke, -633px 229px #c4c4c4, -475px 427px #dedede, 586px -453px #f2f2f2, 180px -432px #c7c7c7, -637px -88px #cfcfcf, -453px 308px #d6d6d6, -111px 1px #d9d9d9, 573px -450px #ededed, 198px 300px #d6d6d6, -355px 166px #dedede, -715px 13px #e3e3e3, 262px -104px #d1d1d1, 147px 325px #dbdbdb, 1px 399px #dbdbdb, 286px -100px white, 43px -329px #e8e8e8, 617px 55px #d9d9d9, -168px -392px #cccccc, 84px 219px #c9c9c9, 507px -226px #d9d9d9, -327px -70px #e6e6e6, 386px -212px #c4c4c4, -717px 4px #cfcfcf, 502px -231px #e3e3e3, 302px 56px #ededed, 649px 341px #c7c7c7, 569px 350px #c9c9c9, 516px -31px #e6e6e6, 689px 447px #c2c2c2, 591px -206px #fafafa, 422px -137px #e6e6e6, -510px -324px #cccccc, -649px 287px #c2c2c2, -194px -48px #f7f7f7, -279px -329px #d1d1d1, -406px 478px #dbdbdb, -735px -87px #c9c9c9, 30px -197px #dedede, -564px 233px #e6e6e6, -486px -324px #ededed, -54px -7px #ededed, -441px -194px #e3e3e3, -133px -95px #e0e0e0, -722px -73px #d6d6d6, 595px 423px #ededed, 568px -39px #ededed, 370px 377px #d1d1d1, -419px -102px #fcfcfc, -450px 109px #c4c4c4, -57px -119px #d1d1d1, -582px 150px #e6e6e6, 206px -263px #cfcfcf, 582px -461px #c9c9c9, -268px -141px #d9d9d9, -148px 291px #c7c7c7, 254px -179px #c9c9c9, 725px 424px #f0f0f0, 391px -150px #ebebeb, 89px -299px #d4d4d4, 170px 1px #c9c9c9, 243px 209px #c7c7c7, 27px 460px #c9c9c9, -465px -380px #d4d4d4, 530px -360px whitesmoke, -626px 53px #e0e0e0, 706px 218px #d9d9d9, 40px -82px #cccccc, -5px -212px #e6e6e6, -742px 33px #ebebeb, -714px 478px #e0e0e0, -585px -125px #cccccc, -216px 348px #cfcfcf, 601px 332px #ededed, 344px -88px #c4c4c4, 659px -22px #d1d1d1, -411px 188px #d6d6d6, -423px -206px #fcfcfc, -359px -136px #cfcfcf, 612px 406px whitesmoke, 725px 96px whitesmoke, 363px -446px white, -204px 325px #c9c9c9, 740px 176px #fafafa, -489px -352px white, -638px 64px #dbdbdb, 537px -65px #dbdbdb, 151px -32px #ebebeb, 681px 212px #fcfcfc, 604px -149px #e6e6e6, -542px -398px #c4c4c4, -707px 66px whitesmoke, -381px 258px #cfcfcf, -30px 332px #d6d6d6, 512px -381px #c9c9c9, 195px 288px #cccccc, -278px 479px #c7c7c7, 27px -208px #d6d6d6, -288px 15px white, -680px 248px #dedede, 433px 31px #c9c9c9, 150px -206px #d4d4d4, -79px 247px white, -594px 115px #e0e0e0, 99px 292px #e0e0e0, 673px -269px #dedede, -257px -64px #d1d1d1, 449px 81px #f2f2f2, 18px -99px #d1d1d1, -694px 415px #f7f7f7, 240px 264px #e0e0e0, 450px -172px white, 383px 7px #e8e8e8, 338px -73px #c9c9c9, 291px -19px #ebebeb, 659px 137px #d1d1d1, 602px -6px #fcfcfc, 554px 249px #ebebeb, 625px 356px #d9d9d9, 579px -183px #d6d6d6, -20px 250px white, -401px 431px #c4c4c4, -645px -232px #cccccc, -265px -148px white, 553px 258px #d1d1d1, 166px -360px #ebebeb, 719px 51px #ededed, 612px -129px #ebebeb, -465px -104px #f2f2f2, -154px -121px #d9d9d9, -1px 330px #f2f2f2, -666px 248px #f7f7f7, -720px 264px #ededed, 148px -365px #e6e6e6, -388px -349px #c4c4c4, 128px -88px #e3e3e3, -683px -274px #fafafa, -341px 41px #c9c9c9, -59px -471px #f0f0f0, -3px -427px #c2c2c2, 418px 167px #d6d6d6, 343px 247px #c7c7c7, 623px -347px #d1d1d1, 716px -217px white, 243px -409px whitesmoke, -75px -126px #d6d6d6, -730px -91px #c9c9c9, -210px -397px #cfcfcf, -349px 180px #c9c9c9, -567px -281px #e0e0e0, -460px 381px #fcfcfc, -310px -22px #ededed, 450px -1px #dbdbdb, -405px -328px #e3e3e3, 5px 332px #d6d6d6, -294px 302px #fcfcfc, -398px 97px whitesmoke, -696px 325px #cfcfcf, -589px 110px #d6d6d6, 353px -411px #dbdbdb, -697px -318px #ebebeb, -114px -72px #f0f0f0, 259px -193px #fcfcfc, 60px 26px #e6e6e6, -63px -232px white, 205px -372px #f7f7f7, -464px -333px #f2f2f2, -374px 123px white, -377px -386px #c7c7c7, -80px 337px #cccccc, 478px -178px #dbdbdb, 222px 420px #ebebeb, -707px 99px #c4c4c4, 716px -132px #fafafa, -253px -286px #e3e3e3, 646px 178px #f0f0f0, 201px 24px #d1d1d1, 178px -58px #c7c7c7, -557px 368px #ededed, 0px 219px #d9d9d9, -266px -269px #cccccc, 242px -197px #c9c9c9, -419px 193px #c2c2c2, -47px 91px #c7c7c7, -109px 75px #c2c2c2, -146px -453px #d6d6d6, 671px -350px #f2f2f2, 421px -91px #d9d9d9, 738px 19px #ededed, -316px -155px #dedede, 419px 244px #fcfcfc, -278px -418px #d6d6d6, -581px -181px #fcfcfc, 139px 264px #d9d9d9, 691px -11px #ebebeb, -622px 402px #c2c2c2, 219px 396px #f0f0f0, -149px -423px white, -716px -78px #d9d9d9, -590px 341px #e6e6e6, -208px 79px #d6d6d6, -227px -24px #f7f7f7, 239px 262px #d1d1d1, 740px 443px #f7f7f7, 509px 134px #d6d6d6, -555px 232px #e8e8e8, -67px -427px #cfcfcf, -368px 250px #f7f7f7, 715px -415px #fafafa, 411px -301px #f0f0f0, -322px 287px #d9d9d9, -429px -90px #f2f2f2, -327px -387px #f0f0f0, -491px 183px #c2c2c2, -133px 250px #d4d4d4, 538px 139px #e3e3e3, -417px -125px #f0f0f0, 653px -351px #e6e6e6, -549px 38px #d4d4d4, 602px 110px whitesmoke, 415px 105px #e0e0e0, -733px -371px #cfcfcf, 286px 403px #d4d4d4, 11px 320px #c4c4c4, -597px 158px whitesmoke, 716px -350px whitesmoke, 321px 67px #fafafa, -237px -300px #cfcfcf, 74px 152px #c9c9c9, 587px -123px #fcfcfc, 699px -332px whitesmoke, 399px 355px #f7f7f7, -323px 314px #dbdbdb, 89px 416px #c7c7c7, 445px 38px #e3e3e3, 572px 122px #c4c4c4, -258px 372px white, 49px 306px #d9d9d9, 437px -35px #dedede, 566px 174px #f2f2f2, 732px -299px whitesmoke, -410px 394px #ededed, 131px -415px white, 19px -326px #e8e8e8, -700px -188px #d1d1d1, 96px -1px #e0e0e0, -328px -396px #f0f0f0, -117px -214px #fcfcfc, -53px 261px #ebebeb, 80px 134px #d6d6d6, -364px -216px white, -636px -125px #dbdbdb, -639px -265px #e3e3e3, 208px 98px #c7c7c7, 172px 467px #e0e0e0, 435px 309px #e3e3e3, 194px -259px #f0f0f0, 209px -186px #c9c9c9, -312px 418px #fafafa, 229px 407px #c9c9c9, -449px -357px #fafafa, 674px 121px #e8e8e8, 608px -429px #ebebeb, -431px -428px #cfcfcf, 105px 462px #e3e3e3, -179px -372px #e3e3e3, 143px -317px #d6d6d6, -449px -149px #fafafa, -544px 250px #dedede, -220px -323px whitesmoke, 658px 8px whitesmoke, -656px -244px #e8e8e8, 347px 11px whitesmoke, 694px -230px #f7f7f7, -317px 1px #c4c4c4, 28px 23px #fcfcfc, -382px 321px #dbdbdb, 632px -74px #c4c4c4, 154px -245px #c2c2c2, -553px 337px #d6d6d6, -48px -243px #d1d1d1, 92px -391px #cccccc, -71px -256px #cfcfcf, -372px 57px #d9d9d9, 369px -140px #fcfcfc, 675px 81px #c2c2c2, -663px 254px #cccccc, 703px -203px #ededed, 74px -363px #c2c2c2, 643px -458px #d1d1d1, 198px 359px #cccccc, 265px 309px #d4d4d4, -353px -368px #e8e8e8, -465px 439px whitesmoke, 693px 360px #c9c9c9, 634px -397px #d1d1d1, 467px 25px whitesmoke, -558px -272px #e6e6e6, 671px 69px #dbdbdb, 407px 357px #cfcfcf, 379px 80px white, 10px -203px #c9c9c9, 104px -292px #f0f0f0, -667px -29px #d1d1d1, 557px -155px #e6e6e6, -505px 115px #cfcfcf, -605px 164px #f2f2f2, -108px -223px #e0e0e0, 523px -156px #ebebeb, 691px 230px white, -507px -13px #d1d1d1, -349px 332px #dedede, 520px 266px whitesmoke, -66px -250px #e6e6e6, -496px -449px #ebebeb, 414px -170px #dedede, -649px 230px #ebebeb, 598px -92px #c7c7c7, -638px 113px #c2c2c2, 151px 363px #f7f7f7, -445px -241px #f0f0f0, 527px -14px #dedede, 203px -61px #cfcfcf, -716px -284px #ebebeb, -525px 134px #c2c2c2;
            animation: fly 3s linear infinite;
            transform-style: preserve-3d;
        }
        .stars:before, .stars:after {
            content: "";
            position: absolute;
            width: inherit;
            height: inherit;
            box-shadow: inherit;
        }
        .stars:before {
            transform: translateZ(-300px);
            opacity: .6;
        }
        .stars:after {
            transform: translateZ(-600px);
            opacity: .4;
        }

        @keyframes fly {
            from {
                transform: translateZ(0px);
                opacity: .6;
            }
            to {
                transform: translateZ(300px);
                opacity: 1;
            }
        }
    </style>
>>>>>>> c4c751b4843a1d9e3ba99a4534b2128d4f40ff8a
    <script src="js/prefixfree.min.js"></script>

</head>

<body>
<<<<<<< HEAD

  <div class="country-wrap">

    <!--<div class="mountain-1"></div>
    <div class="mountain-2"></div>-->
<div style="text-align:center;clear:both">
<script src="/follow.js" type="text/javascript"></script>
</div>
    <div class="sun"></div>
    <div class="grass"></div>
    <div class="street">
        <div class="car">
        <!--<div class="car-base"></div>-->
        <div class="car-body">
            <div class="car-top-back">
                <div class="back-curve"></div>
            </div>
            <div class="car-gate"></div>
            <div class="car-top-front">
                <div class="wind-sheild"></div>
            </div>
            <div class="bonet-front"></div>
            <div class="stepney"></div>
        </div>
        <div class="boundary-tyre-cover">
            <div class="boundary-tyre-cover-back-bottom"></div>
            <div class="boundary-tyre-cover-inner"></div>   
        </div>
        <div class="tyre-cover-front">
            <div class="boundary-tyre-cover-inner-front"></div>
        </div>
        <div class="base-axcel">

        </div>
        <div class="front-bumper"></div>
        <div class="tyre">      
            <div class="gap"></div> 
        </div>
        <div class="tyre front">
            <div class="gap"></div> 
        </div>
        <div class="car-shadow"></div>
    </div>
    </div>
    <div class="street-stripe"></div>
    <div class="hill">
        <!--<div class="tree-1">
            <div class="branch-1"></div>
            <div class="branch-2"></div>
            <div class="branch-3"></div>
        </div>
        <div class="tree-1">
        <div class="branch"></div>
        <div class="trunk"></div>
    </div>-->
    </div>

</div>

  <script src='js/jquery.js'></script>

=======
<header class="htmleaf-header">
   <!--  <h1 >纯CSS3炫酷3D星空动画特效
        <span>A pure css 3d starfield</span>
    </h1>
  -->
</header>
<div class="stars">

</div>

>>>>>>> c4c751b4843a1d9e3ba99a4534b2128d4f40ff8a
</body>

</html> 