function textErrorForm(error, inp = null) {
    $('.result')
        .css('display', 'block')
        .css('border', 'solid 3px red')
        .css('color', 'red')
        .html(error);
    if (inp != null) {
        inp.css('border', 'solid 3px red');
    }
}

function textDoneForm(done) {
     $('.result')
         .css('display', 'block')
         .css('border', 'solid 3px green')
         .css('color', 'green')
         .html(done);
}

function resetInput(inp) {
    inp.css('border', 'solid 1px rgb(169, 169, 169)');
}

$(document).ready(function() {
    $('form[name=add_Formula]').submit(function(e) {
        var stop = true;
        $('input').each(function() {
            var thisObj = $(this);
            if (thisObj.val() == '') {
                textErrorForm('Поле обизательно!', thisObj);
                stop = false;
            } else {
                resetInput(thisObj);
                if (stop) {
                     stop = true;
                }
            }

        })

        if (stop) {
            var $form = $(this);
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize()
            }).done(function(data) {
                if (data == '1') {
                    textErrorForm('Формула уже существуeт!');
                } else {
                    textDoneForm('Формула успешно добавлена!');
                }
            }).fail(function() {
                textErrorForm('Ошибка отправки формы!');
            });
        }
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault();
    });
});
