$(document).ready(function() {
    // カートに商品を追加する処理
    $('.add-to-cart-btn').click(function() {
        var form = $(this).closest('form');
        var itemId = form.data('item-id');
        var itemName = form.data('item-name');
        var itemPrice = form.data('item-price');
        var amount = form.find('.amount-input').val();

        // ローカルストレージにカートがすでにあるか確認
        var cart = JSON.parse(localStorage.getItem('cart')) || [];

        // カートにアイテムを追加
        var item = {
            id: itemId,
            name: itemName,
            price: itemPrice,
            amount: parseInt(amount)
        };

        // アイテムがすでにカートにある場合は数量を更新
        var itemExists = false;
        for (var i = 0; i < cart.length; i++) {
            if (cart[i].id === itemId) {
                cart[i].amount += item.amount;
                itemExists = true;
                break;
            }
        }

        // アイテムがカートにない場合は新規追加
        if (!itemExists) {
            cart.push(item);
        }

        // ローカルストレージにカートを保存
        localStorage.setItem('cart', JSON.stringify(cart));

        // カートに追加完了のメッセージを表示
        alert(itemName + ' がカートに追加されました。');
    });

    // フォーム送信時にカートデータをPHPに送信
    $('#cart-form').submit(function(e) {
        if (cart.length === 0) {
            alert('カートに商品がありません！');
            e.preventDefault();  // カートが空の場合、送信しない
        }
    });
});