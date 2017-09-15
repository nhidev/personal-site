<?php
/**
 * The template display search form
 */
?>
<form id="searchform" action="<?php bloginfo("url") ?>/" method="get">
    <fieldset>
        <input type="text" name="s" id="search" value="<?php if(get_search_query()!="") the_search_query(); else echo "Tìm kiếm"; ?>" />
        <input type="submit" alt="Search" id="btn_search" value=""/>
    </fieldset>
</form>