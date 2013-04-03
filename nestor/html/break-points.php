<?php
/* @var $this View */
/* @var $vv VV_nestor */
/** @noinspection PhpUndefinedVariableInspection */
$vv = $_vars;
?>
<div class="title" xmlns="http://www.w3.org/1999/html">Break points</div>
<div class="timeline">

    <?//--------the main steps first--------------?>

    <?foreach($vv->mainSteps as $bp):?>
        <div class="main-step">
            <div class="line" style="left:<?=$bp->timePercent()?>%;">
                <div class="text"><?=$bp->label?> (<?=$bp->duration()?> sec )</div>
            </div>
        </div>
    <?endforeach?>

    <?//--------all break points-------------?>

    <?foreach($vv->breakPoints() as $bp):?>

    <div class="bp <?=$bp->cssDisplayLeftOrRight()?> <?if($bp->isMainStep):?> is-main-step <?endif?>"  style="">
        <div class="in"
                style="background-color:#<?=$bp->color();?>;
                width:<?=$bp->durationPercent()?>%;
                left:<?=$bp->timePercent()?>%;">

                    <div class="text-content">
                        <?=$bp->type?> <b><?=$bp->label?></b><br/>
                        <?=$bp->details?><br/>
                        At <?=$bp->time?> seconds (<?=round($bp->timePercent())?>%)<br/>
                        Duration <?=number_format($bp->duration(),6)?> seconds (<?=round($bp->durationPercent())?>%)<br/>
                        <?=$bp->file?> @line: <?=$bp->fileLine?><br/>
                    </div>

        </div>

        <div class="text" style="left:<?=$bp->timePercent()?>%;">
            <div class="left-or-right">
                <?=$bp->label?>
            </div>
        </div>
    </div>
    <?endforeach?>
</div>
