jQuery(function($){
    $('.this_price').blur(function(){

        this_price = $(this);

        $.ajax({
            url:ajaxurl,
            type:'POST',
            data:'action=changePrice&product_id=' + this_price.attr('data-id') + '&price_val=' + this_price.val(),
            beforeSend:function(xhr){
                this_price.attr('readonly','readonly').next().html('Сохраняю...');
            },
            success:function(results){
                this_price.removeAttr('readonly').next().html('<span style="color:#0FB10F">Сохранено</span>');
            }
        });
    });
});