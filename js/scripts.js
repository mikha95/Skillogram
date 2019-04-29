function subscribe(a) { //Подписка на пользователя
    var xhr = new XMLHttpRequest();
    xhr.open("POST",'handlers/subscribe.php',true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var body = 'author_id=' + a;
    xhr.send(body);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            console.log('успешно');
            var author = '.author' + a;
            var f = document.querySelectorAll(author);
            f.forEach(function(element) {
                element.innerHTML = 'Вы подписались';
                element.disabled = true;
            });
        } 
    }
}

function unsubscribe(a) { //Отписка от пользователя
    var xhr = new XMLHttpRequest();
    xhr.open("POST",'handlers/unsubscribe.php',true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var body = 'author_id=' + a;
    xhr.send(body);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log('успешно');
            var author = '.author' + a;
            var f = document.querySelectorAll(author);
            f.forEach(function(element) {
                element.innerHTML = 'Вы отписались';
                element.disabled = true;
            });
        }
    }
}