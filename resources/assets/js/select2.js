(function($) {
    $('.select2').select2({
        width: '100%'
    });
    $('.select2-tags').select2({
        width: '100%',
        tags: true,
        createTag: function (params) {
            var term = $.trim(params.term).toUpperCase();
            if (term === '')
                return null;
            return {
                id: term,
                text: term
            }
        }
    });
}) ($);