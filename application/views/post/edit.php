<form action="/post/edit/" method="post">
	
	<input class="form-control input-lg" type="input" name="slug" value="<?php  echo $slug_post; ?>" placeholder="slug"></br>
	<input  class="form-control input-lg" type="input" name="title" value="<?php  echo $title_post; ?>" placeholder="название статьи"></br>
	<textarea class="form-control input-lg" name="text" placeholder="текст статьи"><?php  echo $content_post; ?></textarea></br>
	<input type="submit" class="btn btn-default" name="submit" value="Добавить статью">

</form>