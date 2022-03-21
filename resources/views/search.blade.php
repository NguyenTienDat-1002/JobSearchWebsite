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

   <x-nav :entity="'employee'"/>
   <div class=" w3-margin">
      <x-searchform :routename="'employee.searchpost'"/>
   </div>

   <div class="w3-container list">
      @foreach ($posts as $post)
          <tr class="w3-card-4">
            <div class="w3-container">
               <x-postitem :post="$post"/>
            </div>
         </tr>
      @endforeach
   </div>

   <div >
      <div  >
         {{$posts->links()}}
      </div>
   </div>
   
    @includeIf('partials.footer')

    @includeIf('partials.js')
 </body>
</html>