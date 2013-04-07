<style>




body{
    margin: 0px;
    font-family: "Lucida Grande", sans-serif;
    font-size: 11.67px;
    font-style: normal;
    font-weight: normal;
    text-transform: normal;
    letter-spacing: normal;
    line-height: 1.4em;
    color: #808080;
}
a{
    color: #5c5454;
    text-decoration: none;
}
a:hover{
    color: #666;
    text-decoration: underline;
}
hr{
    border: none;
    border-bottom: 1px solid rgb(200, 200, 200);
}
.color-gray-200{
    color: rgb(200, 200, 200);
}
.font-small{
    font-size:9px;
}
.label-value{
    display: inline-block;
    clear: both;
    width: 100%;
}

.label-value label{
    display: inline-block;
    width: 150px;
    color:#666;
    float: left;
}
.label-value .right{
    float: left;
}

.marged{
    margin-left: 10px;
    margin-right: 10px;
}






.title-bar{
    height:55px;
    padding-top: 5px;
    position: fixed;
    width: 100%;
    z-index: 100;
    overflow: hidden;

    background: #f9fcf7; /* Old browsers */
    background: -moz-linear-gradient(top,  #f9fcf7 0%, #f5f9f0 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f9fcf7), color-stop(100%,#f5f9f0)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #f9fcf7 0%,#f5f9f0 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #f9fcf7 0%,#f5f9f0 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #f9fcf7 0%,#f5f9f0 100%); /* IE10+ */
    background: linear-gradient(to bottom,  #f9fcf7 0%,#f5f9f0 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9fcf7', endColorstr='#f5f9f0',GradientType=0 ); /* IE6-9 */


}
.title-bar>.marged{
    position: relative;
}
.time{
    position: relative;
    margin: 5px 30px 30px;
}
.title-bar .time-point{
    position: absolute;
}
.title-bar .time-point .line{
    border-left: 1px dashed rgb(200, 200, 200);
    position: absolute;
    height: 100px;
    top: 8px;
}
.title-bar .time-point .text{
    margin-left: 5px;
}

/* global score */

.global-score{
    -webkit-border-radius: 8px;
    border-radius: 8px;

    position: absolute;
    top: 0;
    right:0;

    background-color: #0f0;
    width: 16px;
    height: 16px;
}
.global-score > span{
    position: absolute;
    right: 20px;
    width: 80px;
    text-align: right;
}
.global-score.warn{
background-color: orange;
}
.global-score.danger{
background-color: red;
}
.global-score.success{
background-color: green;
}

.content{
    padding: 10px;
    position: absolute;
    left: 0;
    right: 0;
    top: 60px;
    background-color: rgb(15, 15, 13);
}

.break-point{
    clear: both;
    width: 100%;
    border-bottom: 1px solid #666;
    margin-bottom: 10px;
    padding-bottom: 10px;
}

#logs .dark{
    padding:20px;
}
#logs .timeline-container{
    position: relative;
}
#logs .timeline{
    position: relative;
}

/*----main steps----------*/

.content .line{
    position: absolute;
    border-left: 1px dashed #333;
    top:0;
    bottom:0;
    padding-left: 5px;
}
/*----bp-----------*/

#logs .timeline .bp{
position: relative;
margin-bottom: 10px;
font-size: 10px;
line-height: 12px;
}
.timeline .bp.is-main-step{
    background-color: rgba(0, 0, 0, 0.2);
}

.timeline .bp .in{
    z-index: 90;
    position: absolute;
    min-width: 12px;
    border-radius: 12px;
    background-color: #888;
    height: 12px;
    cursor: pointer;
}


.timeline .bp:hover .in{

    -webkit-box-shadow:  0px 0px 5px 1px rgba(255, 255, 255, 0.5);
    box-shadow:  0px 0px 5px 1px rgba(255, 255, 255, 0.5);
}


.timeline .bp .text{
    z-index: 90;
    position: absolute;
    color: #eee;
    margin-left: 15px;
}

.timeline .bp .text-content{
    display: inline-block;
    overflow: hidden;
    width: auto;
    max-width:20%;

    height: 0px;
    position: relative;
    z-index: 89;

    top: 25px;
    right: auto;
    left: auto;


    margin-bottom: 0px;
    margin-left: 0px;
    margin-right: 0px;

    line-height: 15px;

    opacity: 0;

    background-color: rgb(252, 252, 252);
    color: rgb(187, 187, 187);

    transition: all 0.25s;
   /* -webkit-transition: height 2.5s;*/

}


.timeline .bp.open .text-content
{
    opacity: 1;
    height: auto;

    margin-bottom: 40px;
    margin-left: -20px;
    margin-right: -30px;

    border-radius: 20px;
    padding: 10px 30px 10px 20px;
    -webkit-box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.5);
    box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.5);


}
.timeline .bp.open .in:after {
    display: inline-block;
    width: 0;
    height: 0;
    vertical-align: top;
    border-bottom: 10px solid rgb(255, 255, 255);
    border-right: 6px solid transparent;
    border-left: 5px solid transparent;
    content: "";
    position: absolute;
    left: 0px;
    top: 15px;
}

.timeline .bp .text-content h4{
    font-family: georgia;
    font-size: 16px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 10px;
}
.timeline .bp .text-content code,
.timeline .bp .text-content pre
{
    font-family: Monaco, Menlo, Consolas, "Courier New", monospace;
    font-size: 13px;
    line-height: 20px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 10px;
    color:rgb(79, 80, 59);
    white-space: pre-line;
}




</style>