@if($filters['applicable'] != 'no')
<span class="position-absolute text-dark border-light bg-light rounded-circle p-1" onclick="showOptions()" style="font-size: 31px;top: 73px;z-index: 2;left: -3px;">
    <span id="id_filter_add_remove" class="bi bi-plus-circle-fill"></span>
</span>
    <div class="" style="border: 2px solid;padding: 0px;border-radius: 0.357rem;background-color:lightgrey;margin-bottom:20px;height:60px" onclick="showOptions()">
        <!-- <div style=""> -->
            <form id="filter_form" method="post">
                @csrf
                <span class="position-absolute text-dark border-light bg-light rounded-circle p-1" onclick="submitForm()" style="font-size: 31px;right:0;top:73px;z-index:9;">
                    <span class="bi bi-arrow-right-circle-fill"></span>
                </span>
                <div class="custom-scrollbar" style="overflow-x: scroll;overflow-y:hidden;transform: rotateX(180deg);">
                    <div class="row" style="transform: rotateX(180deg);flex-flow: row nowrap !important;padding-left:20px;width:100%;padding-top:3px;">
                        @foreach($filters as $head => $filter)
                            @if($head != 'applicable')
                                @if($filter['data'] != Null)
                                    @if($filter['field'] == 'dropdown')
                                        <div class="" style="width:max-content;" onclick="event.stopPropagation()" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" data-bs-title="@foreach($filter['data'] as $option) @if($option != null) <i class='bi bi-dot'></i> {{ $option }} <br> @endif @endforeach" style="color:red">
                                            <div class="position-relative">
                                                <div style="float:left;padding-right:10px;">
                                                    <span class="text-dark" style="">{{ $head }} </span>
                                                </div>
                                                <div class="filter-fields" style="display:inline-block;max-width:250px;" >
                                                    <select name="{{ $filter['name'] }}[]" multiple="multiple" class="3col active form-control" id="id_select_{{ $head }}">
                                                        @foreach($filter['data'] as $option)
                                                            @if($option != null)
                                                                <option selected value="{{ $option }}">{{ $option }}</option>
                                                            @endif
                                                        @endforeach
                                                        @foreach($filter['args'] as $option)
                                                            <?php 
                                                                if ($filter['name'] != 'null'){
                                                                    $array = json_decode(json_encode($option), true);
                                                                    $name = $filter['name'];
                                                                    $option = $array[$name];
                                                                } 
                                                            ?>
                                                            <option value="{{ $option }}">{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span onclick="removeFilter('{{ $head }}')" class="position-absolute start-100 translate-middle text-danger bg-light rounded-circle" style="top:11;z-index:2;">
                                                    <span class="bi bi-x-circle-fill"></span>
                                                </span>
                                            </div>
                                        </div>
                                    @elseif($filter['field'] == 'checkbox')
                                        <div style="width:max-content;" onclick="event.stopPropagation()">
                                            <div class="position-relative">
                                                <div style="float:left;padding-right:10px;">
                                                    <span class="text-dark" style="">{{ $head }} </span>
                                                </div>
                                                <div class="" style="display:inline-block;padding-top: 5px;padding-right: 12px;">
                                                    <input style="padding-top" <?php echo $filter['custom'] ?> name="{{ $filter['name'] }}" type="{{ $filter['field'] }}" id="field_{{ $head }}"  {{ $filter['data'] }} onclick="event.stopPropagation()">
                                                </div>
                                                <span onclick="removeFilter('{{ $head }}')" class="position-absolute start-100 translate-middle text-danger bg-light rounded-circle" style="top:11;z-index:2;">
                                                    <span class="bi bi-x-circle-fill"></span>
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div style="width:max-content;" onclick="event.stopPropagation()">
                                            <div class="position-relative">
                                                <div style="float:left;padding-right:10px;">
                                                    <span class="text-dark" style="">{{ $head }} </span>
                                                </div>
                                                <div class="filter-fields" style="display:inline-block">
                                                    <input class="text-dark form-control" <?php echo $filter['custom'] ?> name="{{ $filter['name'] }}" type="{{ $filter['field'] }}" id="field_{{ $head }}"  value="{{ $filter['data'] }}" onclick="event.stopPropagation()" style="max-width:{{ strlen($filter['data'])*12 }}px">
                                                </div>
                                                <span onclick="removeFilter('{{ $head }}')" class="position-absolute start-100 translate-middle text-danger bg-light rounded-circle" style="top:11;z-index:2;">
                                                    <span class="bi bi-x-circle-fill"></span>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                        @foreach($filters as $head => $filter)
                            @if($head != 'applicable')
                                @if($filter['data'] == Null)
                                    @if($filter['field'] == 'dropdown')
                                        <div name="options" style="width:max-content;display:none" onclick="event.stopPropagation()">
                                            <div class="position-relative">
                                                <div style="float:left;padding-right:10px;cursor:pointer;" onclick="appendOption('{{ $head }}')">
                                                    <span class="text-dark" style="">{{ $head }} </span>
                                                </div>
                                                <div id="id_field_{{ $head }}" class="filter-fields" style="display:none;max-width:250px;">
                                                    <select name="{{ $filter['name'] }}[]" multiple="multiple" class="3col active form-control" id="id_select_{{ $head }}">
                                                        @foreach($filter['data'] as $option)
                                                            @if($option != null)
                                                                <option selected value="{{ $option }}">{{ $option }}</option>
                                                            @endif
                                                        @endforeach
                                                        @foreach($filter['args'] as $option)
                                                            <?php 
                                                                if ($filter['name'] != 'null'){
                                                                    $array = json_decode(json_encode($option), true);
                                                                    $name = $filter['name'];
                                                                    $option = $array[$name];
                                                                } 
                                                            ?>
                                                            <option value="{{ $option }}">{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span id="id_close_btn_{{ $head }}" onclick="appendOption('{{ $head }}')" class="position-absolute start-100 translate-middle text-danger bg-light rounded-circle" style="top:11;z-index:2;display:none;">
                                                    <span class="bi bi-x-circle-fill"></span>
                                                </span>
                                            </div>
                                        </div>
                                    @elseif($filter['field'] == 'checkbox')
                                        <div name="options" style="width:max-content;display:none" onclick="event.stopPropagation()">
                                            <div class="position-relative">
                                                <div style="float:left;padding-right:10px;cursor:pointer;" onclick="appendOption('{{ $head }}')">
                                                    <span class="text-dark" style="">{{ $head }} </span>
                                                </div>
                                                <div id="id_field_{{ $head }}"  style="display:inline-block;padding-right: 12px;display:none">
                                                    <input class="form-check-input" <?php echo $filter['custom'] ?> name="{{ $filter['name'] }}" type="{{ $filter['field'] }}" id="field_{{ $head }}" onclick="event.stopPropagation()">
                                                </div>
                                                <span id="id_close_btn_{{ $head }}" onclick="appendOption('{{ $head }}')" class="position-absolute start-100 translate-middle text-danger bg-light rounded-circle" style="top:11;z-index:2;display:none;">
                                                    <span class="bi bi-x-circle-fill"></span>
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div name="options" style="width:max-content;display:none" onclick="event.stopPropagation()">
                                            <div class="position-relative">
                                                <div style="float:left;padding-right:10px;cursor:pointer;" onclick="appendOption('{{ $head }}')">
                                                    <span class="text-dark" style="">{{ $head }} </span>
                                                </div>
                                                <div id="id_field_{{ $head }}" class="filter-fields" style="display:none;">
                                                    <input class="text-dark form-control" onkeypress="this.style.width = ((this.value.length + 1) * 10) +10+ 'px';" <?php echo $filter['custom'] ?> name="{{ $filter['name'] }}" type="{{ $filter['field'] }}" id="field_{{ $head }}" onclick="event.stopPropagation()">
                                                </div>
                                                <span id="id_close_btn_{{ $head }}" onclick="appendOption('{{ $head }}')" class="position-absolute start-100 translate-middle text-danger bg-light rounded-circle" style="top:11;z-index:2;display:none;">
                                                    <span class="bi bi-x-circle-fill"></span>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endforeach                       
                        <div style="width:150px;">
                        </div>
                    </div>
                </div>
            </form>
        <!-- </div> -->
    </div>
@endif
@section('scripts')
    <script>
        document.addEventListener('click',function(){
            event.stopPropagation();
        })
        // Table Top Filters
        function removeFilter (filter) {
            event.stopPropagation()
            var url = document.getElementById('id_filter_form').getAttribute('action');
            var form = document.getElementById('filter_form');
            form.setAttribute('action',url);
            var elements = document.getElementById('filter_form').elements;
            for (let i = 0; i < elements.length; i++) {
                const element = elements[i];
                if (element.getAttribute('name') != null){
                    if (element.getAttribute('name').replace('[]','').toLowerCase() == filter.toLowerCase()){
                        element.setAttribute('name','');
                        document.getElementById('filter_form').submit();
                        document.getElementById(filter).style.display = 'none';
                    }
                }
            }
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
                    document.getElementById('id_filter_add_remove').setAttribute('class',"bi-dash-circle-fill");
                }else{
                    element.style.display = 'none';
                    document.getElementById('id_filter_add_remove').setAttribute('class',"bi-plus-circle-fill");
                }
            }
        };
    </script>
    <script>
        function appendOption (head){
            event.stopPropagation()
            var style = document.getElementById('id_field_'+head).style.display;
            if (style == 'inline-block'){
                document.getElementById('id_field_'+head).style.display = 'none';
                document.getElementById('id_close_btn_'+head).style.display = 'none';
            }else{
                document.getElementById('id_field_'+head).style.display = 'inline-block';
                document.getElementById('id_close_btn_'+head).style.display = 'inline-block';
            }
        };
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
    </script>
    <script>
        $(function (){
            filters = <?php echo json_encode($filters); ?>;
            filter_keys = Object.keys(<?php echo json_encode($filters); ?>);
            for (let i = 0; i < filter_keys.length; i++) {
                const element = filter_keys[i];
                if (element != 'applicable'){
                    data = filters[element]['data']
                    if(data != '' && data != null){
                        var headers = $('th,td');
                        for (let p = 0; p < headers.length; p++) {
                            const header = headers[p];
                            e_id = header.getAttribute('data-id');
                            if (element == e_id){
                                header.style = 'color: red;';
                                data = "<i class='bi bi-dot'></i>" + String(data).replaceAll(',',"<br><i class='bi bi-dot'></i>");
                                header.innerHTML += '<span style="float:right;padding-top:5px;"><a href="javascript:" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" data-bs-title="' + data + '" style="color:red"><i class="bi bi-funnel-fill"></i></a></span>';
                            }
                        }
                    }
                }
            }
        const tooltipTriggerList = $('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        })
    </script>
@endsection