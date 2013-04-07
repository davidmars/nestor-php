<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    /**
     * The references to dom objects.
     * @type {{bo: (*|jQuery|HTMLElement)}}
     */
    var Dom={
        bo:$("body"),
        bpIn:$(".bp .in"),
        bp:$(".bp"),
        expandReduceAll:$(".js-expand-reduce-all")
    }
    /**
     * refresh the display of the "expand / reduce toggler".
     */
    var refreshExpandReduceAll=function(){
        if($(Dom.bp[0]).hasClass("open")){
            Dom.expandReduceAll.text("Reduce all");
        }else{
            Dom.expandReduceAll.text("Expand all");
        }
    }

    Dom.bpIn.on("click",function(e){
        var bp=$(this).parent();
        bp.toggleClass("open");
        refreshExpandReduceAll();
    })
    Dom.expandReduceAll.on("click",function(e){
        e.preventDefault;
        if($(Dom.bp[0]).hasClass("open")){
            Dom.bp.removeClass("open");
            refreshExpandReduceAll();
        }else{
            Dom.bp.addClass("open");
            refreshExpandReduceAll();
        }

    })


    //init
    $(document).ready(function() {
        refreshExpandReduceAll();
    });

</script>
<?php //---- format code ?>
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=php&"></script>