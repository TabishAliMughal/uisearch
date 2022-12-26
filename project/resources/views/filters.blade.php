<h3>Select To Filter</h3>
<br>
<div class="container">
    <form id="id_filter_form" action="filtered" method="post">
        @csrf
        <div class="mb-3">
            <label>ID</label>
            <input class="form-control" type="text" id="id" name="id" value="{{ $filters['ID']['data'] ?? null }}" >
        </div>
        <div class="mb-3">
            <label>Year</label>
            <input class="form-control" id="year" name="year" type='number' min='1900' max='2050' value="{{ $filters['Year']['data'] ?? null }}"/>
        </div>
        <div class="mb-3">
            <label>Client ID</label>
            <input class="form-control" type="text" id="client_id" name="client_id" value="{{ $filters['Client_ID']['data'] ?? null }}">
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ $filters['Name']['data'] ?? null }}" >
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input class="form-control" type="text" id="address" name="address" value="{{ $filters['Address']['data'] ?? null }}" >
        </div>
        <div class="mb-3">
            <label>City</label>
            <div style="max-height:100px;display:block">
                <select class="3col active form-control" placeholder="Type to search..." id="city" name="city[]" multiple>
                    @foreach($filters['City']['data'] as $option)
                        <option value="{{ $option }}" selected>{{ $option }}</option>
                    @endforeach
                    @foreach($filters['City']['args'] as $option)
                        <?php $name = $filters['City']['name']; $option = $option->$name; ?>
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label>State</label>
            <div style="max-height:100px;display:block">
                <select class="3col active form-control" placeholder="Type to search..." id="state" name="state[]" multiple>
                    @foreach($filters['State']['data'] as $option)
                        <option value="{{ $option }}" selected>{{ $option }}</option>
                    @endforeach
                    @foreach($filters['State']['args'] as $option)
                        <?php $name = $filters['State']['name']; $option = $option->$name; ?>
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label>Zip</label>
            <input class="form-control" type="text" id="zip" name="zip" value="{{ $filters['Zip']['data'] ?? null }}" >
        </div>
        <div class="mb-3">
            <label>Country</label>
            <div style="max-height:100px;display:block">
                <select class="3col active form-control" placeholder="Type to search..." id="country" name="country[]" multiple>
                    @foreach($filters['Country']['data'] as $option)
                        <option value="{{ $option }}" selected>{{ $option }}</option>
                    @endforeach
                    @foreach($filters['Country']['args'] as $option)
                        <?php $name = $filters['Country']['name']; $option = $option->$name; ?>
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label>Created Date</label>
            <input class="form-control" type="daterange" id="created_date" name="created_date" value="{{ $filters['Created_Date']['data'] ?? null }}" >
        </div>
        <button class="btn btn-primary form-control">Search</button>
    </form>
</div>