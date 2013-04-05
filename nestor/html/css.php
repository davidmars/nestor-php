<style>




body{
padding-bottom: 400px;;
}
#logs{
font-family: Arial, sans-serif;
font-size: 10px;
color: #808080;
}
#logs a{
color: #5c5454;
}
#logs a:hover{
color: #666;
}




#logs .title-bar{
position: relative;
font-weight: bold;
}
#logs .title-bar .time{
    position: relative;
    margin: 10px 30px 30px;
}
#logs .title-bar .time-point{
    position: absolute;
}

#logs .toggler{
    cursor: pointer;
    -webkit-border-radius: 8px;
    border-radius: 8px;

    position: absolute;
    top: 0;
    right:0;

    background-color: #0f0;
    width: 16px;
    height: 16px;
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
left:0;
right: 0;
top:60px;
bottom: 0;
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

float: left;
}
#logs .dark{
    background-color: #111111;
    padding:20px;
}
#logs .timeline-container{
    position: relative;
    padding-bottom: 400px;
}
#logs .timeline{
    /*width: 100%;*/
    position: relative;
}

/*----main steps----------*/

#logs .main-step{
    height: 22px;
}

#logs .line{
    position: absolute;
    border-left: 1px dashed #333;
    top:0;
    bottom:0;
    padding-left: 5px;
}
#logs .main-step .text{
color: #666;
font-size: 10px;
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
border-radius: 10px;
background-color: #888;
height: 100%;
cursor: pointer;
}

#logs .timeline .bp .text-content{
position: absolute;
z-index: 50020;
margin-left: 20px;
padding: 4px;
border-radius: 4px;
width: 500px;
border: 1px solid #888;
background-color: #eeeeee;
color: #222;
display:none;
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
width:0;
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