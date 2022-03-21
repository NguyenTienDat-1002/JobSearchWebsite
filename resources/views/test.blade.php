<!DOCTYPE html>
<html>
    <head>
        @includeIf('partials.head')
    </head>

<body>
    <embed src="https://drive.google.com/viewerng/viewer?embedded=true&url={{URL::asset(Storage::url('CV/1.pdf'))}}" style="width:600px; height:500px;" type="application/pdf"/>
    <iframe src="http://docs.google.com/gview?url={{URL::asset(Storage::url('CV/1.pdf'))}}&embedded=true" style="width:800px; height:500px;" frameborder="0"></iframe>
    <p>{{URL::asset(Storage::url('CV/1.pdf'))}}</p>
    <a href="{{URL::asset(Storage::disk('local')->url('CV/1.pdf'))}}" download>Download the pdf</a>
</body>
</html> 