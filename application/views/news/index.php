<h1>Все новости</h1>

<p><a href="/news/create">добавить новость</a></p><br>

<?php foreach ($news as $key => $value): ?>
	<p><a href="/news/<?php echo $value['slug'];?>"><?php echo $value['title'];?></a> | <a href="/news/edit/<?php echo $value['slug'];?>">edit</a> | <a href="/news/delete/<?php echo $value['slug'];?>">x</a></p>
<?php endforeach ?>


