<style>
    @font-face {
        font-family: 'THSarabunNew';
        src: url('../../../../css/font/Sarabun/Sarabun-Medium.ttf');
        font-weight: normal;
        font-style: normal;
    }


    html {
        font-family: 'THSarabunNew', sans-serif;
        font-size: 0.95em;
        line-height: 1.7em;
        /* background: #e1e1e1; */
    }

    .row {
        /*margin-right: -15px;*/
        /*margin-left: -15px;*/
    }

    .row:before,
    .row:after {
        display: table;
        content: " ";
    }

    .row:after {
        clear: both;
    }

    .row:before,
    .row:after {
        display: table;
        content: " ";
    }

    .row:after {
        clear: both;
    }

    .column_name {
        font-weight: bolder;
    }

    .form-row {
        float: left;
        margin-bottom: 5px;
        width: 100%;
    }

    .column-1,
    .column-2,
    .column-3,
    .column-4,
    .column-5,
    .column-6,
    .column-7,
    .column-8,
    .column-9,
    .column-10,
    .column-11,
    .column-12 {
        float: left;
        padding: 0 15px 0 15px;
    }

    .column-1 {
        width: 8.333333333333332%;
    }

    .column-2 {
        width: 16.666666666666664%;
    }

    .column-3 {
        width: 25%;
    }

    .column-4 {
        width: 33.33333333333333%;
    }

    .column-5 {
        width: 41.66666666666667%;
    }

    .column-6 {
        width: 50%;
    }

    .column-7 {
        width: 58.333333333333336%;
    }

    .column-8 {
        width: 66.66666666666666%;
    }

    .column-9 {
        width: 75%;
    }

    .column-10 {
        width: 83.33333333333334%;
    }

    .column-11 {
        width: 91.66666666666666%;
    }

    .column-12 {
        width: 100%;
    }

    .body_container {
        width: 750px;
        margin-right: auto;
        margin-left: auto;
        /*margin-top: 60px;*/
        position: relative;
    }

    .loadingDiv {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: #FFFFFF url('../images/ajax-loader.gif') 50% 50% no-repeat;
        opacity: 0.8;
        filter: alpha(opacity=80);
    }

    .loadingLabel {
        text-align: center;
        color: #21627E;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: 20px;
        margin-left: -50px;
        width: 100px;
        height: 100px;
    }

    /* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
    body.loading {
        overflow: hidden;
    }

    /* Anytime the body has the loading class, our
   modal element will be visible */
    body.loading .loadingDiv {
        display: block;
    }

    .clear {
        clear: both;
        display: block;
        height: 0;
        overflow: hidden;
        width: 0;
    }

    body {
        font-family: thsarabun !important;
    }


    .popover {
        max-width: 940px !important;
    }

    .redStar {
        color: #FF0000;
        font-size: 1.5em;
        line-height: 0.8;
    }

    .footer_form {
        width: 100%;
        float: left;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .note_text {
        color: #D2D2D2;
    }

    .empty-text {
        font-size: 1.8em;
        text-align: center;
    }

    .text_header {
        font-size: 1.2em;
        margin: 5px 0 5px 0;
    }

    /************************************************/
    /******************* LIST Table *****************/
    /************************************************/
    .font_black {
        color: #404041 !important;
    }

    .font_gray {
        color: #666666 !important;
    }

    .font_pink {
        color: #21627E !important;
    }

    .list_odd {
        background-color: #F9F9F9;
    }

    .box_hover {
        border-bottom: 1px solid #ccc;
    }

    .box_hover:hover {
        /*background: #f6f6f6 url("../images/icon/list_bar.png") top repeat-x;*/
    }

    .box_hover:first-child {
        border-top: 1px solid #ccc;
    }

    /*####################################################*/
    /*#################### Pagination ####################*/
    /*####################################################*/
    .light-theme .current {
        background: none repeat scroll 0 0 #C03385 !important;
        border-color: #21627E !important;
        color: #FFF !important;
    }

    .show_pagination_head {
        width: 100%;
        height: 40px;
        position: relative;
        margin: 0;
        padding: 0;
    }

    .show_pagination_head .menu {
        position: absolute;
        left: 0;
        width: 28%;
    }

    .show_pagination_head .menu .btn .glyphicon {
        top: -2px !important;
    }

    .show_pagination_head .result {
        position: absolute;
        left: 35%;
        width: 33%;
        text-align: center;
    }

    .show_pagination_head .page {
        position: absolute;
        right: 0;
        width: 39%;
        text-align: right;
    }

    /*####################################################*/
    /*#################### Progress ####################*/
    /*####################################################*/
    .progress {
        width: 150px !important;
        margin-bottom: 0 !important;
    }

    .arrow_up {
        width: 16px;
        height: 16px;
        background: url("../images/icon/arrow.png") -32px -16px;
        cursor: pointer;
        float: left;
        margin-left: 3px;
        margin-right: 3px;
    }

    .arrow_down {
        width: 16px;
        height: 16px;
        background: url("../images/icon/arrow.png") -16px 0px;
        cursor: pointer;
        float: left;
        margin-left: 3px;
        margin-right: 3px;
    }

    .arrow_equal {
        width: 16px;
        height: 16px;
        background: url("../images/icon/arrow.png") -32px 0px;
        cursor: pointer;
        float: left;
        margin-left: 3px;
        margin-right: 3px;
    }

    .arrow_none {
        width: 16px;
        height: 16px;
    }

    .menu_popover_header {
        margin-top: 10px;
        left: 10px !important;
        color: #000 !important;
        font-size: .8em;
    }

    .menu_popover_header.bottom .arrow {
        left: 5% !important;
    }

    .menu_popover_user {
        margin-top: 17px !important;
        right: 15px !important;
        color: #000 !important;
        font-size: .8em;
        width: 200px;
    }

    .menu_popover_user.bottom .arrow {
        left: 80% !important;
    }

    /*####################################################*/
    /*################### Status Stay ####################*/
    /*####################################################*/
    .icon_status_dwell {
        background: url("../images/icon/arrow.png") no-repeat;
        width: 16px;
        height: 16px;
        margin: 8px 5px 0 0;
        float: left;
    }

    .status_dwell_stay {
        background-position: 0 -16px;

    }

    .status_dwell_resign {
        background-position: -48px 0;
    }

    .status_dwell_empty {
        background-position: -32px 0;
    }

    /*####################################################*/
    /*################### Person Info ####################*/
    /*####################################################*/
    .body_person_info {
        width: 100%;
    }

    .body_person_info .person_img {
        float: left;
        width: 220px;
        padding: 10px;
        position: relative;
    }

    .body_person_info .person_info {
        float: left;
        width: 420px;
        padding: 5px;
    }


    /*####################################################*/
    /*################### Tabs ####################*/
    /*####################################################*/

    #tabs {
        overflow: hidden;
        width: 100%;
        margin: 0;
        padding-right: 5px;
        list-style: none;
        padding-left: 10px !important;
    }

    #tabs li {
        float: left;
        margin: 0 1em 0 0;

    }

    #tabs a {
        position: relative;
        background: #EEEEEE;
        background: -moz-linear-gradient(top, #EEEEEE 0%, #AAAAAA 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #EEEEEE), color-stop(100%, #AAAAAA));
        background: -webkit-linear-gradient(top, #EEEEEE 0%, #AAAAAA 100%);
        background: -o-linear-gradient(top, #EEEEEE 0%, #AAAAAA 100%);
        background: -ms-linear-gradient(top, #EEEEEE 0%, #AAAAAA 100%);
        background: linear-gradient(to bottom, #EEEEEE 0%, #AAAAAA 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EEEEEE', endColorstr='#AAAAAA', GradientType=0);
        padding: .2em 1.1em;
        float: left;
        text-decoration: none;
        color: #444;
        /*text-shadow: 0 1px 0 rgba(255,255,255,.8);*/
        border-radius: 5px 0 0 0;
        box-shadow: 0 2px 2px rgba(0, 0, 0, .4);
    }

    #tabs a:hover,
    #tabs a:hover::after,
    #tabs a:hover::before,
    #tabs a:focus,
    #tabs a:focus::after,
    #tabs a:focus::before {
        color: #FFFFFF;
        background: #21627E;
        background: -moz-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #207193), color-stop(100%, #21627E));
        background: -webkit-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -o-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -ms-linear-gradient(top, #207193 0%, #21627E 100%);
        background: linear-gradient(to bottom, #207193 0%, #21627E 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#207193', endColorstr='#21627E', GradientType=0);

    }


    #tabs a:focus {
        outline: 0;

    }

    #tabs a::after {
        content: '';
        position: absolute;
        z-index: 1;
        top: 0;
        right: -1.4em;
        bottom: 0;
        width: 2.3em;
        background: #EEEEEE;
        background: -moz-linear-gradient(top, #EEEEEE 0%, #AAAAAA 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #EEEEEE), color-stop(100%, #AAAAAA));
        background: -webkit-linear-gradient(top, #EEEEEE 0%, #AAAAAA 100%);
        background: -o-linear-gradient(top, #EEEEEE 0%, #AAAAAA 100%);
        background: -ms-linear-gradient(top, #EEEEEE 0%, #AAAAAA 100%);
        background: linear-gradient(to bottom, #EEEEEE 0%, #AAAAAA 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EEEEEE', endColorstr='#AAAAAA', GradientType=0);
        box-shadow: 3px 2px 2px rgba(0, 0, 0, .4);

        transform: skew(45deg);
        -ms-transform: skew(45deg);
        -webkit-transform: skew(45deg);
        -o-transform: skew(45deg);
        -moz-transform: skew(45deg);
        /**/
        border-radius: 0 5px 0 0;
    }

    #tabs a::before {
        /*content:'';*/
        /*position:absolute;*/
        /*z-index: 1;*/
        /*top: 0;*/
        /*left: -.9em;*/
        /*bottom: 0;*/
        /*width: 1.8em;*/
        /*background: #EEEEEE;*/
        /*background: -moz-linear-gradient(top,  #EEEEEE 0%, #AAAAAA 100%);*/
        /*background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#EEEEEE), color-stop(100%,#AAAAAA));*/
        /*background: -webkit-linear-gradient(top,  #EEEEEE 0%,#AAAAAA 100%);*/
        /*background: -o-linear-gradient(top,  #EEEEEE 0%,#AAAAAA 100%);*/
        /*background: -ms-linear-gradient(top,  #EEEEEE 0%,#AAAAAA 100%);*/
        /*background: linear-gradient(to bottom,  #EEEEEE 0%,#AAAAAA 100%);*/
        /*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#EEEEEE', endColorstr='#AAAAAA',GradientType=0 );*/
        /*box-shadow: -2px 2px 1px rgba(0,0,0,.4);*/

        /*transform: skew(45deg);*/
        /*-ms-transform: skew(45deg);*/
        /*-webkit-transform: skew(45deg);*/
        /*-o-transform: skew(45deg);*/
        /*-moz-transform: skew(45deg);*/

        /*border-radius: 5px 0 0 0;*/

    }

    #tabs #current a,
    #tabs #current a::after {
        color: #FFFFFF;
        background: #21627E;
        z-index: 3;
        background: -moz-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #207193), color-stop(100%, #21627E));
        background: -webkit-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -o-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -ms-linear-gradient(top, #207193 0%, #21627E 100%);
        background: linear-gradient(to bottom, #207193 0%, #21627E 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#207193', endColorstr='#21627E', GradientType=0);
    }

    #tabs #current a::before {
        color: #FFFFFF;
        background: #21627E;
        z-index: 3;
        background: -moz-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #207193), color-stop(100%, #21627E));
        background: -webkit-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -o-linear-gradient(top, #207193 0%, #21627E 100%);
        background: -ms-linear-gradient(top, #207193 0%, #21627E 100%);
        background: linear-gradient(to bottom, #207193 0%, #21627E 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#207193', endColorstr='#21627E', GradientType=0);
    }

    .content {
        width: 100%;
        min-height: 300px;
        border: #dddddd 1px solid;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 10px;
    }

    /*################################*/
    .name_person {
        font-size: 1.4em;
        padding-left: 5px;
    }

    .nickname {
        float: left;
        width: 50%;
        padding-left: 5px;
    }

    .member_id {
        float: left;
        width: 50%;
        padding-right: 5px;
        text-align: right;
    }

    .info4-1 {
        float: left;
        width: 24%;
    }

    .info4-2 {
        float: left;
        width: 48%;
    }

    .dwell_left {
        float: left;
        width: 80%;
        padding: 5px;
    }

    .dwell_right {
        float: right;
        width: 20%;
        padding: 5px;
    }

    .dead_title {
        /*font-size: 1.2em;*/
        /*text-align: center;*/
        /*color: #ffffff;*/
        /*background: #000;*/
        /*opacity: 0.8;*/

        background: rgba(0, 0, 0, 0.8);
        height: 30px;
        width: 250px;
        bottom: 0;
        position: absolute;
        color: #FFF;
        font-size: 1.2em;
        text-align: center;
    }

    .panel {
        margin-top: 10px;
    }

    .font_green {
        color: #5cb85c;
    }

    .font_yellow {
        color: #f0ad4e;
    }

    .font_red {
        color: #d9534f;
    }

    /************************************/
    .boxlist_behavior {
        width: 100%;
        min-height: 140px;
        border-bottom: 1px solid #ccc;
    }

    .boxlist_behavior .box_img {
        width: 130px;
        float: left;
        padding: 5px;
    }

    .boxlist_behavior .box_detail {
        width: 555px;
        float: left;
        padding: 5px;
        padding-left: 15px;
    }

    .boxlist_behavior .box_detail .box_detail_half {
        float: left;
        width: 50%;
    }
</style>