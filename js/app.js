$("#login-form, #registration-form").submit(function (e) {
    e.preventDefault();
    var obj = $(this), action = obj.attr('name');
    $.ajax({
        type: "POST",
        url: e.target.action,
        data: obj.serialize() + "&Action=" + action,
        cache: false,
        success: function (JSON) {
            if (JSON.error != '') {
                $("#" + action + " #display-error").show().html(JSON.error);
            } else {
                window.location.href = "./";
            }
        }
    });
});
