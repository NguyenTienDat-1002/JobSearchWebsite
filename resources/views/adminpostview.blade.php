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
    <x-nav :entity="'admin'"/>
        <x-adminpostdetail :post="$post" :requirement="$requirement" :description="$description"/>
        @includeIf('partials.footer')
</body>
</html>