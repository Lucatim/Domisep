$(document).ready(function () {
    $('.rond_image img').each(function(){
        $(this).addClass(this.height > this.width ? 'portrait' : '');
    });

    $('.carre_image img').each(function(){
        $(this).addClass(this.height > this.width ? 'portrait' : '');
    });
});
