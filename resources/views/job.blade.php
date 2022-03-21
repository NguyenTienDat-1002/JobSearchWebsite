<!DOCTYPE html>
<html>
    <head>
        @includeIf('partials.head')
        <style>
            .job{
                margin-left: 150px;
                margin-right: 150px;
                margin-top: 50px;
                margin-bottom: 50px;
                padding: 16px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            img{
                margin-right:16px
            }
            
            @media (max-width:600px){
                .job{
                    margin: 16px;
                }
                
            }
        </style>

    </head>

<body class="w3-light-blue">
    <x-nav :entity="'employee'"/>
    <div class="job w3-light-grey w3-container w3-round-xlarge " id="summery">
        <div>
            <img src="{{ URL::asset('storage/'.$post->logo) }}"  width="150" height="150" style="float:left;" class="w3-round-xlarge">
        </div>
        <a class="w3-button w3-large w3-border w3-border-green w3-round-large w3-hover-green" style="float:right; margin:auto;" href="{{route('employee.job.apply.show',['id'=>$post->id])}}">Apply</a>
        
        <h4><b>{{$post->company_name}}</b></h4>

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
    @includeIf('partials.footer')
</body>
</html>