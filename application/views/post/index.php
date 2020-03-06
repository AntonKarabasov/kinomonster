<h1>Все статьи</h1>

<p><a href="/post/create">добавить статью</a></p><br>

<?php foreach ($post as $key => $value): ?>
	<p><a href="/post/<?php echo $value['slug'];?>"><?php echo $value['title'];?></a> | <a href="/post/edit/<?php echo $value['slug'];?>">edit</a> | <a href="/post/delete/<?php echo $value['slug'];?>">x</a></p>
<?php endforeach ?>


