<?php
	include './classes/Db.php';
        $goods = Db::selectData();
    
        $categories = Db::selectCategories();
?>
<!DOCTYPE html>
<html>
<head>
<title>Test</title>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script type="text/javascript" src="/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/js/select.js"></script>
</head>
<body>
    <a href="/handlers/add.php" id="add">Добавить товар:</a>
    <div id="add_goods">
    <div class="exit">X</div>
        <form method="POST" action="/handlers/add.php">
            Наименование: <input class="add_form" type="text" name="name" value=""/><br>
            Цена: <input class="add_form" type="text" name="price" value=""/><br>
            Описание: <textarea class="add_form" rows="7" cols="25" name="description" /></textarea><br>
            Статус: <select class="add_form" name="status">
                        <option selected="selected" value="1">1</option>
                        <option value="100">100</option>
                    </select><br>
            Категория: <select class="add_form" name="name_cat">
                                <option></option>
                            <?php foreach($categories as $category):?> 
                                <option value="<?=$category['id']?>"><?=$category['name_cat']?></option>
                            <?php endforeach;?>
                        </select><br>
            <input id="add_btn" type="submit" name="add_sbmt" value="Добавить" />
	</form>
    </div>
    <table id="goods" border="1" width="50%" cellspacing="0" cellpadding="5px">
        <caption id="cpt_goods">Таблица товаров</caption>
        <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Удаление</th>
        </tr>
        <?php foreach($goods as $item):?>
        <tr>
            <td><a href="<?=$item['id_g'];?>" data-ind="id_g" data-item="<?=$item['id_g'];?>" class="link"><?=$item['id_g'];?></a></td>
            <td><a href="<?=$item['id_g'];?>" data-ind="name" data-item="<?=$item['id_g'];?>" class="link"><?=$item['name'];?></a></td>
            <td><a href="<?=$item['id_g'];?>" data-ind="name_cat" data-item="<?=$item['id_g'];?>" class="link"><?=$item['name_cat'];?></a></td>
            <td><a href="<?=$item['id_g'];?>" data-ind="description" data-item="<?=$item['id_g'];?>" class="link"><?=$item['description'];?></a></td>
            <td><a href="<?=$item['id_g'];?>" data-ind="price" data-item="<?=$item['id_g'];?>" class="link"><?=$item['price'];?></a></td>
            <td><a href="/handlers/delete.php?id=<?=$item['id_g'];?>" data-ind="delete" data-item="<?=$item['id_g'];?>" id="delete">X</a></td>
        </tr>
        <?php endforeach;?>
    </table>
    <div id="update_block">
	<form method="POST" action="upd_handler.php">
            ID: <input class="update_form" type="text" name="id" value="" disabled="disabled"/><br>
            Наименование: <input class="update_form" type="text" name="name" value=""/><br>
            Цена: <input class="update_form" type="text" name="price" value=""/><br>
            Описание: <textarea class="update_form" rows="7" cols="25" name="description" /></textarea><br>
            Статус: <select class="update_form" name="status">
                        <option selected="selected" value="1">1</option>
                        <option value="100">100</option>
                    </select><br>
            Категория: <select class="update_form" name="name_cat">
                                <option></option>
                            <?php foreach($categories as $category):?> 
                                <option value="<?=$category['id']?>"><?=$category['name_cat']?></option>
                            <?php endforeach;?>
                        </select><br>
            <button id="send">OK</button>
	</form>
    </div>
</body>
</html>