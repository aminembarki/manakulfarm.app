(function($) {
    $('.sidebar-menu a').each(function(index, el) {
        var href = $(el).attr('href');
        if (window.location.href.indexOf(href) != -1)
            $(el).closest('li').addClass('active');
    });
}) ($);