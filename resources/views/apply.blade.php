<!DOCTYPE html>
<html>
    <head>
        @includeIf('partials.head')
    </head>
    <body>
        <x-nav :entity="'employee'"/>
        <div class="w3-card-4 w3-display-middle">
            <div class="w3-container w3-teal">
                <center><h2>Apply</h2></center>
            </div>
            <form  enctype="multipart/form-data" style="min-width: 280px; max-width:350px;"class="w3-container" action="{{route('employee.job.apply.submit',['id'=>$id])}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="post" value="{{$id}}">
                <p>
                    <label class="w3-text-grey" for="CV">CV</label>
                    <input class="w3-input w3-border" type="file" required id="CV" name="CV">
                </p>
                @if(session('notification'))
                <center><p style="color:green">{{ session('notification')}}</p></center>
                @endif
                @if($errors->any())
                    <center><p style="color:red">{{$errors->first()}}</p></center>
                @endif
                <p>
                    <center><input type="submit" class="w3-btn w3-padding w3-teal" style="width:120px" name="apply" value="apply"></center>
                </p>
            </form>
        </div>
    </body>
    </html> 