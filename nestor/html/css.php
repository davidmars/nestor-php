<style>




body{
padding-bottom: 400px;;
}
#logs{
font-family: Arial, sans-serif;
font-size: 12px;
/*z-index: 50000;
position: fixed;
top:0px;
left: 0px;
width: 16px;
height: 16px;
margin: 10px;
overflow: hidden;*/

color: #111;



}
#logs a{
color: #111;
}
#logs a:hover{
color: #666;
}

#logs.open{
width: 95%;
height: 95%;
-webkit-border-radius: 6px;
border-radius: 6px;
}


#logs .title-bar{
position: relative;
font-weight: bold;

}
#logs.open .title-bar{

color: #fff;
background-color: #000;
padding-left: 10px;
height: 26px;
padding-top: 4px;

-webkit-border-top-left-radius: 6px;
-webkit-border-top-right-radius: 6px;
-moz-border-radius-topleft: 6px;
-moz-border-radius-topright: 6px;
border-top-left-radius: 6px;
border-top-right-radius: 6px;
}
#logs .toggler{

cursor: pointer;
-webkit-border-radius: 8px;
border-radius: 8px;

position: absolute;
top: 0px;
right:0px;

background-color: #0f0;
width: 16px;
height: 16px;
}
#logs.open .title-bar .toggler{

right: 4px;
left:auto;
top:4px;

}

#logs .toggler.warn{
background-color: orange;
}
#logs .toggler.danger{
background-color: red;
}
#logs .toggler.success{
background-color: green;
}

#logs .content{
background-color: #eee;
padding: 10px;
position: absolute;
left:0px;
right: 0px;
top:30px;
bottom: 0px;
overflow-y: scroll;
overflow-x: hidden;
}
#logs .title{
font-weight: bold;
margin-top: 10px;
margin-bottom: 10px;
}
#logs .break-point{
clear: both;
width: 100%;
border-bottom: 1px solid #666;
margin-bottom: 10px;
padding-bottom: 10px;
}
#logs .label-value{
display: inline-block;
clear: both;
width: 100%;
}

#logs .label-value label{
display: inline-block;
width: 150px;
color:#666;
float: left;
}
#logs .label-value .right{
/*width: 200px;*/
float: left;
}
#logs .timeline{
width: 100%;
background-color: #111111;
padding:10px;
position: relative;
overflow: hidden;
}

/*----main steps----------*/

#logs .main-step{
height: 20px;
position: relative;
}

#logs .line{
position: absolute;
border-left: 1px dashed #333;
height: 100000px;
margin-top: -500px;
}
#logs .main-step .line .text{
color: #666;
padding-left: 4px;
font-size: 10px;
margin-top: 500px;
}

#logs .timeline .bp{
position: relative;
height: 10px;
margin-bottom: 10px;
font-size: 10px;
line-height: 19px;

}
#logs .timeline .bp.is-main-step{
background-color: rgba(0, 0, 0, 0.2);
}

#logs .timeline .bp .in{
position: absolute;
margin-left: -5px;
min-width: 10px;
height:10px;
border-radius: 10px;
background-color: #888;


height: 100%;
cursor: pointer;
}

#logs .timeline .bp .text-content{
position: absolute;
z-index: 50020;
display:none;
margin-left: 20px;
background-color: #eeeeee;
color: #222;
padding: 4px;
border-radius: 4px;
width: 500px;
border: 1px solid #888;

}

#logs .timeline .bp.left .text-content{
left: 10px;
}
#logs .timeline .bp.right .text-content{
right: 30px;
}

#logs .timeline .bp:hover .in{
border: 1px solid #fff;
}
#logs .timeline .bp:hover .in .text-content{
display:block;
}




#logs .timeline .bp .text{
position: absolute;
color: #eee;
width:0px;
top:-4px;
margin-left: 5px;
}

#logs .timeline .bp .text .left-or-right{
position: absolute;
width: 500px;
}
#logs .timeline .bp.left .text .left-or-right{
left: 5px;
}
#logs .timeline .bp.right .text .left-or-right{
right: 15px;
text-align: right;
}
</style>