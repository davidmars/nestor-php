<?php
/* @var $this NestorView */
/* @var $vv VV_nestor */
/** @noinspection PhpUndefinedVariableInspection */
$vv = $_vars;
?>

<div class="dark">
    <div class="timeline-container">
        <div class="timeline">

            <?//--------the main steps lines first--------------?>
            <?foreach($vv->mainSteps as $bp):?>
                <div class="main-step" style="margin-left:<?=$bp->info->timePercent()?>%;">
                    <div class="line"></div>
                </div>
            <?endforeach?>

            <?//--------all break points-------------?>

            <?foreach($vv->breakPoints() as $bp):?>

            <div class="bp <?=Nestor____stuff::cssDisplayLeftOrRight($bp)?> <?if($bp->isMainStep):?> is-main-step <?endif?>" >
                <?if($bp->isMainStep):?>
                    <a name="<?=$bp->info->uid?>"></a>
                <?endif?>
                <div class="in"
                        style="background-color:<?=$bp->color;?>;
                        width:<?=$bp->info->durationPercent()?>%;
                        left:<?=$bp->info->timePercent()?>%;">
                </div>



                <div class="text" style="left:<?=$bp->info->timePercent()?>%;">
                    <div class="left-or-right">
                        <?=$bp->label?>
                    </div>
                </div>

                <div class="text-content"
                     style="right:<?=-$bp->info->timePercent()+(10*($bp->info->timePercent()/100))?>%;"
                    >
                    <h4 style="color:<?=$bp->color?>;">
                    <?=$bp->group?> <b><?=$bp->label?></b>
                    </h4>
                    <code class="prettyprint lang-js">
<?=VV_nestor::code($bp->details)?>
                    </code>
                    <hr>
                    At <?=$bp->info->timeStart?> seconds (<?=round($bp->info->timePercent())?>%)<br/>
                    Duration <?=number_format($bp->info->getDuration(),6)?> seconds (<?=round($bp->info->durationPercent())?>%)<br/>
                    <?=$bp->info->file?> @line: <?=$bp->info->fileLine?><br/>
                </div>


            </div>

            <?endforeach?>
        </div>
    </div>
</div>
