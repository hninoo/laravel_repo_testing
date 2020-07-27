<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="width:100%;">
        <thead style="width:100%;">
            <tr style="width:100%;">

                <th style="width: 50%;">Task</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 40%;">Description</th>
            </tr>
        </thead>
        <tbody style="width:100%;">
            <tr>
                <td style="width: 50%;">{{$data->task_name}}</td>
                <td style="width: 10%;">{{$data->status->name}}</td>
                <td style="width: 40%;">{!! $data->description !!}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
