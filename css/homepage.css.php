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

body.homepage h1.typ-pageTitle {
    font-size:40px;
    line-height:50px;
    margin:0px;
}
.details {
    height:200px;
    text-align:center;
    left:0px;
    top:50%;
    width:100%;
}
.details, .vidya, .micah {
    position:fixed;
}
.details {
    top:20%;
}
.vidya, .micah {
    top:50%;
    height:250px;
}
.vidya {
    left:-92px;
}
.micah {
    right:-92px;
}
@media (min-width:600px) and (min-height:600px) {
    body.homepage h1.typ-pageTitle {
        font-size:60px;
        line-height:80px;
    }
    h2.typ-littleTitle {
        font-size:30px;
    }
    .vidya, .micah {
        height:300px;
    }
    .vidya {
        left:-111px;
    }
    .micah {
        right:-111px;
    }
}
@media (min-aspect-ratio: 1/1) {
    .details, .vidya, .micah {
        position:absolute;
        top:50%;
    }
    .vidya, .micah {
        height:150px;
    }
    .vidya {
        left:-55px;
    }
    .micah {
        right:-55px;
    }
}

/* Square and landscape */
@media (min-aspect-ratio: 1/1) and (min-height:400px) {
    .details, .vidya, .micah {
        position:fixed;
    }
    .details {
        margin-top:-80px;
    }
    .vidya, .micah {
        top:50%;
        margin-top:-75px;
        height:200px;
    }
    .vidya {
        left:-75px;
    }
    .micah {
        right:-75px;
    }
}


@media screen and (min-aspect-ratio: 1/1) and (min-height:450px) and (min-width:768px) {
    body.homepage h1.typ-pageTitle {
     margin-bottom:20px;
    }
    .vidya, .micah {
        margin-top:-150px;
        height:300px;
    }
    .vidya {
        left:-111px;
    }
    .micah {
        right:-111px;
    }
}
