<div style="font-weight: bold; padding: 6px; border-bottom: 1px solid #CCCCCC; font-size: 18px;"><{$module_title}></div>
<div style="font-size: 10px; font-weight: bold; padding: 3px; border-bottom: 1px solid #CCCCCC; background-color: #f5f5f5;"><{$localize_bar}></div>
<br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td style="vertical-align: top; text-align: left;">
            <div class="item" style="padding:1px;">
                <div class="itemHead" style="font-size: 16px; font-weight: bold; text-align: left;">
                    <{$work.titulo}>
                </div>
                <{if $work.cliente!=''}>
                    <div class="itemBody"><br>
                        <img src="assets/images/client.png" border="0" align="absmiddle">
                        <strong><{$lang_for}></strong> <{$work.cliente}><br><br>
                    </div>
                <{/if}>
                <div class="itemBody">
                    <strong><{$lang_desc}></strong><br><br>
                    <{$work.desc}>
                </div>
                <br>
                <{if $work.url!=''}>
                    <div class="itemBody">
                        <img src="assets/images/web.png" border="0" align="absmiddle"> <strong><{$lang_url}></strong>
                        <a href="<{$work.url}>" target="_blank"><{$work.url}></a>
                    </div>
                    <br>
                <{/if}>
                <div class="itemBody">
                    <{if $work.comentario!=''}>
                        <strong><{$lang_comment}></strong>
                        <br>
                        <br>
                        <em>"<{$work.comentario}>"</em>
                    <{/if}>
                </div>

            </div>
        </td>
        <td class="odd" style="border: 1px solid #CCCCCC;">
            <div style="text-align: left; font-size: 11px; font-weight: bold;">
                <{$lang_moreimgs}></div>
            <div>
                <a rel="lightbox[roadtrip]" href="<{$storedir}><{$work.imagen}>" style="border:none;">
                    <img src="<{$storedir}>ths/<{$work.imagen}>" style="padding: 4px; border: 1px solid #ccc;"></a><br>
                <{foreach item=img from=$images}>
                    <{php}>

                        $count = ++$i;

                        if (($count % 4) == 0){
                        echo "
                        <align
                        =\"center\">";
                        }

                    <{/php}>
                    <a rel="lightbox[roadtrip]" href="<{$storedir}><{$img}>" style="border:none;">
                        <img src="<{$storedir}>ths/<{$img}>" style="padding: 4px; border: 1px solid #ccc;">
                    </a>
                    <br>
                <{/foreach}>
            </div>
        </td>
    </tr>
</table><br>
<{$portfolio_footer}>
