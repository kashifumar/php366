<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>My Store Demo</title>
<link href="css/bootstrap.css" media="all" type="text/css" rel="stylesheet" >
<link href="css/metallic.css" media="all" type="text/css" rel="stylesheet" >
<link href="css/styles.css" media="all" type="text/css" rel="stylesheet" />
<!--[if IE]>
<style type="text/css"> 
#header-banner-text-heading, .footer-menu { zoom: 1;}
</style>
<![endif]-->

<!--

When anonymous line boxes (boxes that contain inline content) are adjacent to a float, a 3px gap appears between the line box and the edge of the float. This gap disappears when the content clears the float, causing the content to "jog" three pixels in the direction of the float. Note that the gap may be difficult to see when left-aligned text is adjacent to a right float, but it does exist and it can lead to "float drop" in tight layouts.

Affects: Internet Explorer 5.0, 5.5, 6.0
Likelihood: Likely
-->
<script src="js/jquery.js"></script>
<script src="js/zebra_datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".dateZ").Zebra_DatePicker({
        format:'d-m-Y'
    });
});
</script>

</head>

<body>
    <div id="header-bg-container"></div>

    <div id="full-page">

        <header>
            <div id="header">
                <div id="logo" class="full-height"><a href=""></a></div>
                <div id="user-data" class="full-height">
                    <div>Welcome </div>
                    <div>You have 0 items in your cart. Total $0</div>
                </div>
                <div id="top-header-right" class="full-height">
                    <div id="top-header-right-top">
<a href="">Login</a> | <a href="signup.php">Signup</a>
                    
                    </div>
                    <div id="search-box">
                        <form action="#" method="get">
                            <input id="keyword" class="txt_field" type="text" onblur="clearText(this)" onfocus="clearText(this)" title="keyword" name="keyword" value="Search" />
                            <input id="searchbutton" class="sub-btn" type="submit" title="Search" value="" name="Search" />
                        </form>
                    </div>
                </div>
            </div>
            <div id="header-menu-container">
                <ul class="header-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href='#'>Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Shopping Cart</a></li>
                    <li><a href="#">Check Out</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">My Account</a></li>
                </ul>
            </div>
        </header>
