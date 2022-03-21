<div class="w3-light-grey w3-container w3-round-xlarge " style="padding-top: 16px;">
    <a href="{{route('employee.job.show',['id'=>$post->id])}}">
    <div>
        <img src="{{ URL::asset('storage/'.$post->logo) }}" width="150" height="150"style="float:left; margin-right:16px;" class="w3-round-xlarge">
    </div>
    <p style="float:right">DUE:{{date('d/m/Y', strtotime($post->end_date));}}</p>
    <h6><b>{{$post->company_name}}</b></h6>
    <div>           
        <p>Position: {{$post->position}}</p>
        <p>Location: {{$post->city->name}}</p>
        <p>Salary: {{$post->salary}}</p>
    </div>
    </a>
    <div style="height: 1px; background-color:black;"></div>
</div>