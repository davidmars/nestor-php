<?php
/* @var $this NestorView */
/* @var $vv VV_nestor */
/** @noinspection PhpUndefinedVariableInspection */
$vv = $_vars;
?>
<div class="title">Break points</div>

<div class="dark">
<div class="timeline-container">
    <div class="timeline">

        <?//--------the main steps first--------------?>

        <?foreach($vv->mainSteps as $bp):?>
            <?php
            $mt+=20;
            ?>

            <div class="main-step" style="margin-left:<?=$bp->timePercent()?>%;">
                <div class="line"> <?=$bp->time?> sec
                    <div class="text" style="padding-top:<?=$mt?>px;"><a href="#<?=$bp->uid?>"><?=$bp->label?></a></div>
                </div>
            </div>
        <?endforeach?>

        <?//--------all break points-------------?>

        <?foreach($vv->breakPoints() as $bp):?>

        <div class="bp <?=$bp->cssDisplayLeftOrRight()?> <?if($bp->isMainStep):?> is-main-step <?endif?>" >
            <?if($bp->isMainStep):?>
            <a name="<?=$bp->uid?>"></a>
            <?endif?>
            <div class="in"
                    style="background-color:<?=$bp->color;?>;
                    width:<?=$bp->durationPercent()?>%;
                    left:<?=$bp->timePercent()?>%;">

                        <div class="text-content">
                            <?=$bp->group?> <b><?=$bp->label?></b><br/>
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
</div>
</div>
