
<p id="name" >{{ $city->name }}({{ $city->country }})</p>

@if(!empty($links))
    @foreach($links as $key => $image)
        <div style="display:inline-block">
            <label for="image" class="col-md-4 control-label"></label>
            <div>
                <img src="/uploads/{{ $image }}" />
            </div>
        </div>
    @endforeach
@endif
