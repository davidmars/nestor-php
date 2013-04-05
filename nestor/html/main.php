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
        <div class="time">
        <?php $mt=0;?>
        <?foreach($vv->mainSteps as $bp):?>
            <?php
            $mt+=20;
            ?>

                <div class="time-point" style="left:<?=$bp->info->timePercent()?>%;">
                    <div class=""> <?=$bp->info->timeStart?> sec</div>
                </div>

        <?endforeach?>
        </div>

    </div>

    <div class="content">
        <div class="label-value">
            <label>Total time</label>
            <span><?=$vv->totalTime()?> seconds</span>
        </div>
        <?foreach($vv->groups as $gr):?>
            <div class="label-value">
                <label><?=$gr->name?></label>
                <span><?=$gr->count?> that took <?=$gr->duration?> seconds</span>
            </div>
        <?endforeach?>
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

