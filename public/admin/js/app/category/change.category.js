"use strict";

$(function() {
    var changeCategory = new ChangeCategory();
    changeCategory.change();
});

function ChangeCategory() {}

ChangeCategory.prototype.change = function() {
    var elt = $('#account_id_top');
    elt.on('change', function(event) {
        const accountFormTop =  $('form#accountFormTop');
        $.ajax({
            url: accountFormTop.attr("action"),
            type: 'POST',
            data: accountFormTop.serialize(),
            success: function(data) {
                console.log('data', data);
            },
            error: function(err) {
            }
        });
    });
};



