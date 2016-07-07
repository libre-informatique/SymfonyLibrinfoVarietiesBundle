$(document).ready(function () {

//    $('.field-container').each(function () {
//        var select = $(this).find('select');
//        var addChoice = select.siblings('.add-choice');
//        if (select.length == 1) {
//            if (addChoice.length > 0)
//                loadSelectChoices(addChoice.attr('id'));
//        } else if ($(this).find('.checkbox').length > 0) {
//            //loadCheckboxChoices($(this));
//            //addCheckboxButton($(this).find('ul'));
//        } else {
//            return;
//        }
//    });
//    $('.add-choice').parent().on('change', '.editableform', function () {
//
//        //console.log($(this).find('input'));   
//    });

    $('.add-choice').editable({
        type: 'text',
        url: '/librinfo/ajax/choices/add',
        pk: 1,
        placement: 'top',
        savenochange: 'false',
        display: false,
        success: function (data) {
            var widget = $(this).siblings('select');

            if (widget.length > 0) {

                widget.append('<option selected     value="' + widget.children('option').length + '">' + data['value'] + '</option>');
            } else {

                var checkbox = $('<li><div class="checkbox">' +
                        '<label><input type="checkbox"><span class="control-label__text">' +
                        data['value'] +
                        '</span></label></div></li>'
                        );

                widget = $(this).siblings('ul');

                widget.append(checkbox);
                checkbox.iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue'
                });
            }
        }
    });
});

function loadChoices(){
    
    $.get('/librinfo/ajax/choices/get/' + fieldName, function (data) {
        console.log(data);
        
    });
}

function loadSelectChoices(fieldName) {

    var choices = getChoices(fieldName);

    for (var i = 0; i < choices.length; i++) {
        appendOption(choices[i], 'select');
    }
}

function loadCheckboxChoices(fieldName) {

    var choices = getChoices(fieldName);

    for (var i = 0; i < choices.length; i++)
    {
        appendOption(choices[i], 'checkbox');
    }
}

function getChoices(fieldName) {

    var choices;

    $.get('/librinfo/ajax/choices/get/' + fieldName, function (data) {
        console.log(data);
        choices = data.choices;
    });

    return choices;
}

function appendOption(option, type) {
    if (type == 'select') {
        $('select[id="' + option.name + '"]');
    } else {

    }
}