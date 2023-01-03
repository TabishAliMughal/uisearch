<span class="position-absolute p-1 filter-go-btn" style="display:none" onclick="submitForm()" >
    <i id="" class="fa fa-arrow-right"></i>
</span>
<div class="" style="border: 2px solid var(--filter-outline);padding: 0px;border-radius: 0.357rem;background-color:var(--filter-background);margin-bottom:20px;height:min-content" onclick="showOptions()">
    <form id="filter_form" method="get">
        @csrf
        <span class="position-absolute filter-add-btn" style="display:none" onclick="showOptions()">
            <span id="id_filter_add_remove" class="fa fa-plus" onclick="showOptions()"></span>
        </span>
        <!-- For Scrolbar == class="custom-scrollbar" style="overflow-x: scroll; overflow-y:hidden;" -->
        <div style="transform: rotateX(180deg);width:100%">
            <div class="row" style="transform: rotateX(180deg);flex-flow: row nowrap !important;padding:7px;padding-left:40px;padding-right:40px;display:flex;flex-wrap:wrap;">
                @yield('fields')
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('click',function(){
        event.stopPropagation();
    })
    // Table Top Filters
    function removeFilter (filter) {
        filter = filter.split(',');
        event.stopPropagation();
        var url = document.getElementById('id_filter_form').getAttribute('action');
        var elements = document.getElementById('id_filter_form').elements;
        for (let i = 0; i < elements.length; i++) {
            const element = elements[i];
            if (element.getAttribute('name') != null){
                for (let i = 0; i < filter.length; i++) {
                    const field = filter[i];
                    if (element.getAttribute('name').replace('[]','').toLowerCase() == field.toLowerCase()){
                        element.setAttribute('name','');
                    }
                }
            }
        }
        document.getElementById('id_filter_form').submit();
    };
    function submitForm (){
        var url = document.getElementById('id_filter_form').getAttribute('action');
        var form = document.getElementById('filter_form');
        form.setAttribute('action',url);
        form.submit();
    }
</script>
<script>
    function showOptions (){
        var elements = document.getElementsByName('options');
        for (let i = 0; i < elements.length; i++) {
            const element = elements[i];
            if (element.style.display == 'none'){
                element.style.display = 'block';
                document.getElementById('id_filter_add_remove').setAttribute('class',"fa fa-minus");
            }else{
                element.style.display = 'none';
                document.getElementById('id_filter_add_remove').setAttribute('class',"fa fa-plus");
            }
        }
    };
</script>
<script>
    $(function (){
        var headers = $("td , th");
        
        for (let p = 0; p < headers.length; p++) {
            header = headers[p]
            args = <?php print_r((json_encode($_REQUEST))) ; ?>;
            data = <?php print_r((json_encode($dataDictionary))) ; ?>;
            if (header.getAttribute('url-id')){
                arg_keys = (Object.keys(args));
                for (let k = 0; k < arg_keys.length; k++) {
                    const element = arg_keys[k];
                    if (args[element]){
                        tooltip_args = ''
                        if (header.getAttribute('url-id') == element){
                            (data[header.getAttribute('data-id')]).forEach(val => {
                                if (val[Object.keys(val)[0]] == args[element]){
                                    tooltip_args += "<i class='fa fa-dot-circle-o'></i>" + String(val[Object.keys(val)[header.getAttribute('data-index') ?? 1]]);
                                }
                            });
                            var title = header.innerHTML;
                            header.innerHTML = '';
                            header.style = 'color:var(--filter-outline);';
                            header.innerHTML += '<a href="javascript:" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" data-bs-title="' + tooltip_args + '" style="color:var(--filter-outline)">' + title + '<i class="fa fa-filter"></i></a>';
                        }
                    }
                }
            }
            
        }
        const tooltipTriggerList = $('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    })
</script>