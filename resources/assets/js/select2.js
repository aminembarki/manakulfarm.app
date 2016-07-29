(function($) {
    $('.select2.select2-breeder').select2({
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