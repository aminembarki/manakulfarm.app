(function($) {

    $('.select2').select2({
        width: '100%',
        allowClear: true
    });

    $('.select2-tags').select2({
        width: '100%',
        tags: true,
        allowClear: true,
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