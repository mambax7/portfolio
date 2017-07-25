<div style="font-weight: bold; padding: 6px; border-bottom: 1px solid #CCCCCC; font-size: 18px;"><{$module_title}></div>
<div style="font-size: 10px; font-weight: bold; padding: 3px; border-bottom: 1px solid #CCCCCC; background-color: #f5f5f5;"><{$localize_bar}></div>
<br>
<table width="100%" border="0" cellspacing="0">
    <tr>
        <td width="60%" valign="top">
            <div style="border-bottom: 5px solid #CCCCCC; padding: 6px; font-size: 16px; font-weight: bold;"><{$lang_works}></div>
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr class="even">

                    <td>
                        <{$lang_pages}> <{$pages}>
                    </td>
                </tr>
                <{foreach item=work from=$works}>
                    <tr align="left" class="<{cycle values="even,odd"}>">
                        <td>
                            <{if $work.img!=''}>
                                <a href="view.php?id=<{$work.id}>"><img src="<{$storedir}>ths/<{$work.img}>"
                                                                        align="left" style="padding: 4px;"></a>
                            <{/if}>
                            <strong><a href="view.php?id=<{$work.id}>"><{$work.titulo}></a></strong><br><br>

                            <span style="font-size: 10px;"><{$work.desc}></span><br><br>
                            <img src="assets/images/view.png" border="0" align="absmiddle">
                            <a href="view.php?id=<{$work.id}>"><{$lang_view}></a>
                        </td>
                    </tr>
                <{/foreach}>
                <tr class="even">
                    <td>
                        <{$lang_pages}> <{$pages}>
                    </td>

                </tr>
            </table>
        </td>
        <td width="40%" valign="top" class="even" style="border-left: 1px solid #CCCCCC;">
            <div style="padding: 4px; font-size: 12px; font-weight: bold; border-bottom: 1px solid #CCCCCC;">
                <img src="assets/images/recent.png" border="0" align="absmiddle"> <{$lang_categos}>
            </div>
            <div style="font-size: 11px; padding: 3px;">
                <ul>
                    <{foreach item=catego from=$categos}>
                        <li><strong><a href="categos.php?id=<{$catego.id}>"><{$catego.nombre}></a></strong><br>
                            <span style="font-size: 10px;"><{$catego.desc}></span></li>
                    <{/foreach}>
                </ul>
            </div>
            <div style="padding: 4px; font-size: 12px; font-weight: bold; border-bottom: 1px solid #CCCCCC; text-align: left;">
                <img src="assets/images/featured.png" border="0" align="absmiddle"> <{$lang_featured}>
            </div>
            <div style="font-size: 11px; padding: 3px;">
                <ul>

                    <{foreach item=work from=$destacados}>
                        <li><strong><a href="view.php?id=<{$work.id}>"><{$work.titulo}></a></strong><br>
                            <{$work.desc}>
                        </li>
                    <{/foreach}>
                </ul>
            </div>
            <br>
        </td>
    </tr>

</table>
<br>
<table class="outer" cellspacing="1">
    <tr align="center">
        <{foreach item=work from=$recientes}>
            <{if $work.img!=''}>
            <td class="<{cycle values="even,odd"}>">
                <a href="view.php?id=<{$work.id}>"><img src="<{$storedir}>ths/<{$work.img}>"
                                                        style="border: 1px solid #ccc; padding: 4px;"></a><br>
                <a href="view.php?id=<{$work.id}>" style="font-size: 10px;"><{$work.titulo}></a></td><{/if}>
        <{/foreach}>
    </tr>
</table><br>
<{$portfolio_footer}>