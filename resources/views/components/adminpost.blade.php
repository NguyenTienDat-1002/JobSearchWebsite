<div class="w3-light-grey w3-container w3-round-xlarge " style="padding-top: 16px;">
    
    <a href="{{route('admin.post.detail',['id'=>$post->id])}}">
    <div>
        <img src="{{ URL::asset('storage/'.$post->logo) }}" width="150" height="150"style="float:left; margin-right:16px;" class="w3-round-xlarge">
    </div>
    <div style="float:right;">
        <p>DUE:{{date('d/m/Y', strtotime($post->end_date));}}</p>
        @if ($post->status==0)
            <h5 style="color:red;">unchecked</h5>
        @elseif ($post->status==1)
            <h5 style="color:green;">checked</h5>
        @endif
    </div>
    <div>
    <h6><b>{{$post->company_name}}</b></h6>
    <div>           
        <p>Position: {{$post->position}} - Level:{{$post->level->name}}</p>
        <p>Location: {{$post->city->name}}</p>
        <p>Salary: {{$post->salary}}</p>
    </div>
    </div>
    </a>
    
    <div style="height: 1px; background-color:black;"></div>
</div>