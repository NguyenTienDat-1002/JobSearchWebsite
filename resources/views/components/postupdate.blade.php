<div>
    <div class="post w3-container ">
        <div class="w3-container w3-teal">
            <center><h2>Recruitment</h2></center>
        </div>
     
        <form class="w3-container w3-card-4"  enctype="multipart/form-data" action="{{route('employer.post.update',['id'=>$post->id])}}" method="post"> 
            {{ csrf_field() }}
            <br>
            <div class="w3-row-padding">
                <p class="w3-half">      
                    <label class="w3-text-grey" for="position">Position</label>
                    <input class="w3-input w3-border" id="position" name="position" type="text" value="{{$post->position}}"required>
                </p>
                <p class="w3-half">
                    <label class="w3-text-grey" for="level">Level</label>
                    <select class="w3-input w3-border" name="level" id='level' required>
                        @foreach ($Levels as $Level )
                            @if($Level->id==$post->level_id)
                                <option selected value="{{$Level->id}}">{{$Level->name}}</option>
                            @else
                                <option value="{{$Level->id}}">{{$Level->name}}</option>
                            @endif
                        @endforeach
                    </select>  
                </p>
            </div>
    
            <div class="w3-row-padding">
                <p class="w3-half">      
                    <label class="w3-text-grey" for="salary">Salary</label>
                    <input class="w3-input w3-border" type="text" required id="salary" name="salary" value="{{$post->salary}}">
                </p>
    
                <p class="w3-half">      
                    <label class="w3-text-grey" for="end">End date</label>
                    <input class="w3-input w3-border" type="date" id="end" name="end" value="{{$post->end_date}}">
                </p>
    
            </div>
    
            <div class="w3-row-padding">
                <p class="w3-half">      
                    <label class="w3-text-grey" for="company">Company</label>
                    <input class="w3-input w3-border" id="company" name="company" type="text" value="{{$post->company_name}}"required>
                </p>
    
                <p class="w3-half">      
                    <label class="w3-text-grey" for="email">Email</label>
                    <input class="w3-input w3-border" type="text" id="email" name="email" value="{{$post->email}}">
                </p>
            </div>
    
            <div class="w3-row-padding">
                <label class="w3-text-grey" for="logo">Logo</label>
                <input class="w3-input w3-border" type="file" id="logo" name="logo">
            </div>
            
            <div class="w3-row-padding">
                <div class="w3-third">
                <label class="w3-text-grey" for="address">Address</label>
                  <input class="w3-input w3-border" type="text" id="address" value="{{$post->location}}"name="location" required>
                </div>
                <div class="w3-third">
                  <label class="w3-text-grey" for="city">Location</label>
                    <select class="w3-input w3-border" name="city" id='city' required>
                        @foreach ($Cities as $city )
                            @if($city->id==$post->city_id)
                                <option selected value="{{$city->id}}">{{$city->name}}</option>
                            @else
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endif
                        @endforeach
                    </select> 
                </div>
                <div class="w3-third">
                    <label class="w3-text-grey" for="industry">Industry</label>
                    <select class="w3-input w3-border" name="industry" id='industry' required>
                        
                        @foreach ($Industries as $Industry )
                            @if($Industry->id==$post->industry_id)
                                <option value="{{$Industry->id}}" selected>{{$Industry->name}}</option>
                            @else
                                <option value="{{$Industry->id}}">{{$Industry->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="w3-row-padding">
                <p>      
                    <label class="w3-text-grey" for="description">Job's Description</label>
                    <textarea class="w3-input w3-border" id="description" rows="6" name="description" style="resize:none" required>{!!$description!!}</textarea>
                </p>
            </div>
    
            <div class="w3-row-padding">
                <p>      
                    <label class="w3-text-grey" for="requirement">Job's Requirement</label>
                    <textarea class="w3-input w3-border" id="requirement" rows="6" name="requirement" style="resize:none" required>{!!$requirement!!}</textarea>
                </p>
            </div>
            @php
            if($errors->any())
                echo '<center><p style="color:red">'.$errors->first().'</p></center>';
            @endphp
            @if(session('notification'))
            <center><p style="color:green">{{ session('notification')}}</p></center>
            @endif
          <center><p><input type="submit" class="w3-btn w3-padding w3-teal" style="width:120px" name="submit" value="Update"></p></center>
            </form>
        </div>
</div>