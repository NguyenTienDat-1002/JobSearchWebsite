<div class="job w3-light-grey w3-container w3-round-xlarge " id="summery">
    <div>
        <img src="{{ URL::asset('storage/'.$post->logo) }}"  width="150" height="150" style="float:left;" class="w3-round-xlarge">
    </div>

    <div  style="float:right; margin:auto;">
        <p>DUE: {{date('d/m/Y', strtotime($post->end_date));}}</p>
        @if($post->status==0)
            <a href="{{route('admin.post.check',['id'=>$post->id])}}" class="w3-button w3-large w3-border w3-border-green w3-round-large w3-hover-green" style="display: block; margin:5px;">Check</a>
        @elseif($post->status==1)
            <center><h5>Checked</h5></center>
        @endif
        <a href="{{route('admin.post.delete',['id'=>$post->id])}}" class="w3-button w3-large w3-border w3-border-red w3-round-large w3-hover-red" style="display: block; margin:5px;">Delete</a>
    </div>
    
        <h5><b>{{$post->company_name}}</b> - Email:{{$post->email}}</h5>

    <div>           
        <p>Position: {{$post->position}} - Level: {{$post->level->name}}</p>
        <p>Location: {{$post->city->name}}</p>
        <p>Salary: {{$post->salary}}</p>
    </div>
</div>
<div class="job w3-light-grey w3-round-xlarge" id="details">
    <div>
    <div>
        <h5>LOCATION</h5>
        <div style="height: 1px; background-color:black;"></div>
        <p>Address: {{$post->location}}</p>
        <p>Location: {{$post->city->name}}</p>      
        <br/>
    </div>
    <div>
        <h5>JOB REQUIREMENT</h5>
        <div style="height: 1px; background-color:black;"></div>
        <p>{!!$requirement!!}</p>
        <br/>
    </div>

    <div>
        <h5>JOB DESCRIPTION</h5>
        <div style="height: 1px; background-color:black;"></div>
        <p>{!!$description!!}</p>
        <br/>
    </div>
    
    
    </div>
</div>