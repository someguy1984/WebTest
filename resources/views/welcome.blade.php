<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
</head>
<body>


<div class="flex-center position-ref full-height">
    <div class="content">

        @if(!empty($errors))
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{ Form::open(array('url' => '/')) }}
        {{ Form::label('value', 'Please Enter a value specifying either Pounds (£) or Pence (p):') }}
        {{ Form::text('value') }}
        {{ Form::submit('Submit') }}
        {{ Form::close() }}

        @if(!empty($results))
            <table>
                <thead>
                <th>Coin Type</th>
                <th>Total</th>
                </thead>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result[0] }}</td>
                        <td>{{ $result[1] }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
</body>
</html>
