$(function() {
    var id = $('select[multiple].active.3col');
    $('select[multiple].active.3col').multiselect({
        columns: 1,
        placeholder: 'Select ',
        search: true,
        searchOptions: {
            'default': 'Search '
        },
        selectAll: true
    });
});