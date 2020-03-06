<h1><?php echo $title; ?></h1>
<hr>

<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="<?php echo $player_code; ?>" frameborder="0" allowfullscreen></iframe>
</div>
<div class="well info-block text-center">
  Год: <span class="badge"><?php echo $year; ?></span>
  Рейтинг: <span class="badge"><?php echo $rating; ?></span>
  Режиссер: <span class="badge"><?php echo $director; ?></span>
</div>

<div class="margin-8"></div>

<h2>Описание <?php echo $title; ?></h2>
<hr>

<div class="well">
  <?php echo $descriptions_movies; ?>
</div>

<div class="margin-8"></div>

<h2>Отзывы об <?php echo $title; ?></h2>
<hr>

<?php foreach ($comments as $key => $value): ?>
   <div class="panel panel-info">
      <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span><?php echo getUserNameById($value['user_id'])->username ; ?></span> </div>
      <div class="panel-body">
        <?php echo $value['comment_text']; ?>
      </div>
    </div>
<?php endforeach ?>


<form action="/movies/view/" method="post">
  <div class="panel panel-info">
    <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span><?php echo getUserNameById($value['user_id'])->username ; ?></span> 
    </div>
      <div class="form-group">
        <textarea class="form-control" type="input" name="comment_text"></textarea>
      </div>
  </div>
  <button class="btn btn-lg btn-warning pull-right" name="submit">отправить</button>
</form>



        