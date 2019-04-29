<div class ='container'>
    <h1>Пользователь <?php echo $get['login'];?></h1>
    <?php if ($sub == 1) { ?>
        <button type="button" class="btn btn-outline-success author<?php echo $user_id; ?>" disabled>Вы уже подписаны</button>
        <button type="button" class="btn btn-outline-danger author<?php echo $user_id; ?>" onclick='unsubscribe(<?php echo $user_id; ?>)'>Отписаться</button>
    <?php } else {?>
    <button type="button" class="btn btn-outline-success author<?php echo $user_id; ?>" onclick='subscribe(<?php echo $user_id; ?>)'>Подписаться</button>
    <?php } ?>
</div>