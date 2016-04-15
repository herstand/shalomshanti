<?php
    set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
    if (!isset($session)) {
      require_once "Controller/SessionController.php";
      $session = SessionController::getSession();
    }
    header("Content-type: text/css; charset: UTF-8");

    include "css/variables.php";

    include "css/fonts.css.php";
    include "css/custom-reset.css.php";
    include "css/typography.css.php";

    include "css/header.css.php";
    include "css/modal.css.php";
    include "css/ampersand.css.php";
?>

.details {
    height:200px;
    text-align:center;
    left:0px;
    top:50%;
    width:100%;
}
.details {
    position:relative;
}
.vidya, .micah {
    position:absolute;
}
.details {
    top:0px;
}
.details .typ-littleTitle {
    letter-spacing:2px;
}
.details img {
    height:162px;
    margin-bottom:25px;
}
.details .date {
    margin-bottom:5px;
}

.vidya, .micah {
    top:210px;
    height:80vw;
}
.vidya {
    left:-40vw;
}
.micah {
    right:-40vw;
}

@media  (max-aspect-ratio: 1/1) and (min-width:<?php echo $iphone6;?>px) {
    .details {
        top:10px;
    }
    .vidya, .micah {
        top:320px;
    }
}
@media  (max-aspect-ratio: 1/1) and (min-width:<?php echo $mobile3;?>px) {
    .details {
        top:30px;
    }
    .details .typ-littleTitle {
        font-size:30px;
        letter-spacing:3px;
    }
    .details img {
        margin-bottom:50px;
    }
    .details .date {
        margin-bottom:20px;
    }
    .details .place {
        font-size:24px;
    }
    .vidya, .micah {
        top:380px;
    }
}
@media (min-aspect-ratio: 1/1) and (max-height:500px) {
    .details {
        top:-20px;
    }
    .vidya, .micah {
        top:30%;
        height:66.67vh;
    }
    .vidya {
        left:-33.33vh;
    }
    .micah {
        right:-33.33vh;
    }
}
@media (min-aspect-ratio: 1/1) {
    .details {
        top:35%;
        position:absolute;
    }
    .details .typ-littleTitle {
        font-size:30px;
        letter-spacing:3px;
    }
    .details img {
        margin-bottom:50px;
    }
    .details .date {
        margin-bottom:20px;
    }
    .details .place {
        font-size:24px;
    }
    .vidya, .micah {
        top:20%;
        height:66.67vh;
    }
    .vidya {
        left:-33.33vh;
    }
    .micah {
        right:-33.33vh;
    }
}
