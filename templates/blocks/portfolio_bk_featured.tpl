<{foreach item=work from=$block.works}>
    <div style="text-align: center; padding: 3px;">
        <a href="<{$xoops_url}>/modules/portfolio/view.php?id=<{$work.id}>"><img style="border: 1px solid #CCCCCC;"
                                                                                 src='<{$work.img}>' border='0'></a>
    </div>
    <div style="font-size: 10px; text-align: left;">
        <{$work.desc}>
    </div>
<{/foreach}>
