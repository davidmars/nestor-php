<?php
/* @var $this NestorView */
/* @var $vv VV_nestor */
/** @noinspection PhpUndefinedVariableInspection */
$vv = $_vars;
?>

<?=$this->render("html/css")?>

<div id="logs">

    <div class="title-bar"><?=$_SERVER["HTTP_HOST"]?><?=$_SERVER["REQUEST_URI"]?> ( server time : <?=date("Y/m/d h:i:s",time())?> )

        <div class="toggler <?=$vv->globalStatus()?>"></div>
    </div>

    <div class="content">
        <div class="label-value">
            <label>Total time</label>
            <span><?=$vv->totalTime()?> seconds</span>
        </div>
        <?/*
        <div class="label-value">
            <label>Mysql queries</label>
            <span><?=count($vv->queries)?> queries that took <?=$vv->queriesDuration()?> seconds</span>
        </div>
        <div class="label-value">
            <label>Number of models</label>
            <span><?=$vv->totalModels()?></span>
        </div>
        <div class="label-value">
            <label>Number of fields</label>
            <span><?=$vv->totalFields()?></span>
        </div>
        */?>
        <?=$this->render("html/break-points",$vv)?>

    </div>
</div>

