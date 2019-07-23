jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    var delta = 3;
    var tax_count = $('.load-more').data('tax-count');
    $('.load-more').click(function (){

        var button = $(this),
            data = {
                'action': 'loadmore',
                'delta' : delta
             };

        $.ajax({ // you can also use $.post here
            url :loadmore_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                // button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success : function( data ){
                delta += 3;
                if(data) {
                    button.prev().before(data); // insert new posts

                    if(delta < tax_count){
                     }else {
                        button.remove();
                    }
                } else {
                    button.remove(); // if no data, remove the button as well
                }

            }
        });
    });
});