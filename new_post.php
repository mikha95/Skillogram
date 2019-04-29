<?php
session_start();
?>
<!DOCTYPE html PUBLIC>
<html>


	<body>
		<p>Добавить пост</p>
		<form enctype="multipart/form-data" action="handlers/save_post.php" method="post">
			<div class="form-group">
				<label for="exampleFormControlFile1">Загрузите изображение</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" accept="image/*,image/jpeg">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Введите описание</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Добавить</button>
		</form>
	</body>



</html>
