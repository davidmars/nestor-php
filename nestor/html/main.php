<?php
/**
 * Here the concept is to get a standalone html page.
 */
/* @var $this NestorView */
/* @var $vv VV_nestor */
/** @noinspection PhpUndefinedVariableInspection */
$vv = $_vars;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nestor result <?=number_format($vv->totalTime(),3)?> seconds</title>
    </head>
    <body>
    <?=$this->render("html/css")?>

    <div id="logs">

        <div class="title-bar">

            <div class="marged">
                <a href="<?=Nestor____stuff::currentUrl()?>"><?=Nestor____stuff::currentUrl()?></a>
                <span class="color-gray-200"><?=date("Y/m/d h:i:s",time())?></span>
                |
                <a class="js-expand-reduce-all" href="#">Expand / Reduce all</a>

                <div class="global-score <?=$vv->globalStatus()?>">
                    <span class="font-small color-gray-200"><?=number_format($vv->totalTime(),3)?> sec</span>
                </div>
            </div>

            <div class="time">
                <?php $mt="0";?>
                <?foreach($vv->mainSteps as $bp):?>
                    <?php
                    $mt=$mt=="0"?"15px":"0";
                    ?>
                    <div class="time-point font-small color-gray-200" style="margin-top:<?=$mt?>; left:<?=$bp->info->timePercent()?>%;">
                        <div class="line"></div>
                        <div class="text"><a title="<?=$bp->label?>" href="#<?=$bp->info->uid?>"><?=$bp->info->timeStart?></a></div>
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

    </body>
    <?=$this->render("html/js")?>

</html>


