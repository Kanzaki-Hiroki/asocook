//カート閲覧画面の商品個数操作ステッパー
$(".btn-number").click(function (e) {
    e.preventDefault();

    var fieldName = $(this).attr("data-field");
    var type = $(this).attr("data-type");
    var itemId = $(this).attr("data-id"); // ユニークIDを取得
    var input = $("#number-of-unit-" + itemId); // ユニークIDを使って対象のinputを指定
    var currentVal = parseInt(input.val());

    if (!isNaN(currentVal)) {
        if (type == "minus") {
            if (currentVal > input.attr("min")) {
                input.val(currentVal - 1).change();
            }
            if (parseInt(input.val()) == input.attr("min")) {
                $(this).attr("disabled", true);
            }
        } else if (type == "plus") {
            if (currentVal < input.attr("max")) {
                input.val(currentVal + 1).change();
            }
            if (parseInt(input.val()) == input.attr("max")) {
                $(this).attr("disabled", true);
            }
        }
    } else {
        input.val(0);
    }
});
$(".input-number").focusin(function () {
    $(this).data("oldValue", $(this).val());
});
$(".input-number").change(function () {
    minValue = parseInt($(this).attr("min"));
    maxValue = parseInt($(this).attr("max"));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr("name");
    if (valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr(
        "disabled"
    );
    } else {
        $(this).val($(this).data("oldValue"));
    }
    if (valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr(
        "disabled"
        );
    } else {
        $(this).val($(this).data("oldValue"));
    }
});
$(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if (
        $.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
      // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)
    ) {
      // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if (
        (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
        (e.keyCode < 96 || e.keyCode > 105)
    ) {
        e.preventDefault();
    }
});

/* input type="nunber" の値を div id="output-number-of-unit" に出力する。*/
$(function () {
    var $input = $("#number-of-unit");
    var $output = $("#output-number-of-unit");
    $input.on("change", function (event) {
        var value = $input.val();
        $output.text(value);
    });
});


