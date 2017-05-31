<?
    include __DIR__.'/../f_data/get_type.php';
    $typeList = getProductType();
    $countList = getTypeCount();
?>
<div class="left-nav">
    <div class="search-area">
        <input class="search-bar" type="text" name="search" placeholder="search something">
    </div>
    <div class="type">
        <h3>分類</h3>
        <?
            for ($i=0; $i < count($typeList); $i++) {
                $tId= $typeList[$i]['t_id'];
                $tName = $typeList[$i]['t_name'];
                $tCount = $countList[$tId];
        ?>
                <li><a href="product_list.php?t=<?=$tId?>"><?=$tName?>（<?=$tCount?>）</a></li>
        <?
            }
        ?>
    </div>
</div>