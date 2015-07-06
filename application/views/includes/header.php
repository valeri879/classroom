<!doctype html>
<html lang="ka">
<head>
    <meta charset="utf-8">

    <title>Geo Classroom</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
    <!--    <link rel="stylesheet" href="--><?php //echo base_url('assets/css/key-frames.css')?><!--">-->
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fonts.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icons.css')?>">

</head>

<body>


<div class="mn-wrapper">
    <header>
        <nav>
            <a href="#"><span class="icon-logo"></span></a>
            <input class="search" type="text" placeholder="ძიება">

            <ul class="nav-ul">
                <li class="nav-li"><a href="#">პოპულარული სკოლები</a></li>
                <li class="nav-li"><a href="#">საინტერესო კლასები</a></li>
                <li class="nav-li"><a href="#">ტოპ ათეული</a></li>
            </ul>

            <ul class="sgn-ul">


<!--                $this->session->user->Name-->
                <?php
                if ($this->session->user) {
                echo '
                    <li class="in-prof hd-inbox">
                        <span class="lnr lnr-inbox"></span>
                    </li>
                    <li class="in-prof hd-calendar">
                        <span class="lnr lnr-calendar-full"></span>
                    </li>
                    <li class="in-prof hd-inbox">
                        <span class="lnr lnr-file-add"></span>
                    </li>
                    <li class="in-prof hd-prof">
                        <img src="'.base_url('assets/img/img/default.png').'" alt=""/>

                <span class="lnr lnr-chevron-down"></span>
                <ul class="prof-det">

                    <li class="prof-li"><h2>'.$this->session->user->Name.' '.$this->session->user->LastName.'</h2></li>
                    <li class="prof-li"><a href="#">ჩემი პროფილი</a></li>
                    <li class="prof-li"><a href="myclasses">ჩემი კლასები</a></li>
                    <li class="prof-li"><a href="#">დახმარება</a></li>
                    <li class="prof-li"><a href="#">პარამეტრები</a></li>
                    <li class="prof-li"><a class="log-out" href="logout">გასვლა</a></li>

                </ul>

                </li>

                ';}
                else {
                    echo '
                    <li class="sgn-li"><a class="reg-a" href="#">რეგისტრაცია</a></li>
                    ';
                    echo '
                    <li class="sgn-li"><a class="reg-in" href="#">შესვლა</a></li>
                    ';
                }
                ?>


            </ul>
        </nav>
    </header>