"use strict";

$(function () {
    $('input').attr('autocomplete', 'off');

    $('.anchor').on('click', function () {
        if ($(this).next('.items').is(":hidden")) {
            $(this).next('.items').show();
        } else {
            $(this).next('.items').hide();
        }
    });
});

function selectCheckList(elm, label, default_text) {
    elm.on("click", function () {
        var checkedlx = elm.filter(":checked");
        if (checkedlx.length == 0) {
            label.empty();
            label.append("--- " + default_text + " ---");
        } else {
            label.empty();
            label.append("เลือกแล้ว " + checkedlx.length + " รายการ");
        }
    });
}