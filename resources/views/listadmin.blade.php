<!DOCTYPE html>
<html>   
   <head>
      @includeIf ('partials.head')
      <style>
         .search{
            height: 45px;
         }
         form {
            padding-left: 80px;
            padding-right:80px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
         }
         .list{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-left: 13%;
            margin-right: 13%;
         }
         @media (max-width:800px){
            .list{
               margin-left: 3%;
               margin-right: 3%;
            }
         }
         
      </style>
   </head>

 <body class="w3-light-grey">

   <x-nav :entity="'admin'"/>

   <div class=" w3-margin">
    
   </div>
   <div class="w3-container list">
    <tr class="w3-card-4">
        <div class="w3-round-xlarge w3-border w3-border-grey w3-panel">
           <a href="{{route('admin.create')}}"><center>Add</center></a>
     </div>
     <div style="height: 1px; background-color:black;"></div>
  </tr>
      @foreach ($admins as $admin)
          <tr class="w3-card-4">
               <div class="w3-padding-16 w3-container">
                  {{$admin->username}} | Phone Number: {{$admin->phone}}  
                  <div style="float:right"><a href="{{route('admin.destroy',['id'=>$admin->id])}}" style="color:red;">Delete</a></div>
               <div style="height: 1px; background-color:black;"></div>
            </div>
         </tr>
      @endforeach
   </div>

   <div style="margin-left: 13%; margin-right: 13%; height:55px "  >
      <div style="margin-right: 0px; float:right; margin:10px; margin-right:30px" >

      </div>
   </div>


    @includeIf('partials.js')
 </body>
</html>