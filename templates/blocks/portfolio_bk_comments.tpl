<{foreach item=work from=$block.works}>
    <div style="font-size: 10px; text-align: right;">
        <span style="font-style: italic;">"<{$work.texto}>"</span><br>
        <a href="<{$xoops_url}>/modules/portfolio/view.php?id=<{$work.id}>"><{$work.cliente}></a>
    </div>
    <br>
<{/foreach}>
