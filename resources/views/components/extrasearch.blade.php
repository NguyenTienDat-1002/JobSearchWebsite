<div>
    <form class=" w3-padding-32 w3-white container" action="{{route($routename)}}" method="post">
        {{ csrf_field() }}
        <div class="input-group w3-row w3-container" >
        <input class="form-control w3-col s3 search" type="search" placeholder="Search" aria-label="Search" name="search">
        <select class="custom-select w3-col s2 search" name="city">
           <option selected value="">Choose Location...</option>
           @foreach ($cities as $city )
            <option value="{{$city->id}}">{{$city->name}}</option> 
           @endforeach
        </select>
        <select class="custom-select w3-col s2 search"  name="level">
            <option selected value="">Choose level...</option>
            @foreach ($levels as $level )
                <option value="{{$level->id}}">{{$level->name}}</option>
            @endforeach
         </select>
         <select class="custom-select w3-col s2 search"  name="status">
            <option selected value="">Choose level...</option>
            <option value="0">unchecked</option>
            <option value="1">checked</option>
         </select>
        <input class="btn btn-outline-primary my-2 my-sm-0 w3-col s1 search" name="submit" value="search" type="submit">
     </div>
     </form>
</div>