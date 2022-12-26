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

$(function() {
    $('input[type="daterange"]').daterangepicker({
        autoUpdateInput: false,
        opens: 'left',
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('input[type="daterange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('input[type="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})