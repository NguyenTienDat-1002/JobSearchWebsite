<!DOCTYPE html>
<html>
    <head>
        @includeIf('partials.head')
        <style>
            .post{
                margin: 16px;
                padding:16px;
            }
            form{
                font-size: 1.3em;
            }
        </style>
    </head>

<body>
    <x-nav :entity="'employer'"/>
    <x-postupdate :post="$post"/>
    @includeIf('partials.footer')
</body>
</html>