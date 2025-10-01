<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $type }}</title>
</head>
<body>
    <h2>{{ $type }}</h2>

    @if(str_ends_with($filePath, '.pdf'))
        <embed src="{{ $filePath }}" type="application/pdf" width="100%" height="600px">
    @else
        <img src="{{ $filePath }}" style="max-width:100%;">
    @endif
</body>
</html>
