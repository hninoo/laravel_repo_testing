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
                <th style="width: 10%;">No</th>
                <th style="width: 30%;">Task</th>
                <th style="width: 20%;">Status</th>
                <th style="width: 40%;">Description</th>
            </tr>
        </thead>
        <tbody style="width:100%;">
            @foreach ($data as $key=>$item)

                <tr style="width:100%;" >
                    <td style="width: 10%;">{{++$key}}</td>
                    <td style="width: 30%;">{{$item[0]['task_name']}}</td>
                    <td style="width: 20%;">{{$item[0]->status->name}}</td>
                    <td style="width: 40%;">{!! $item[0]->description !!}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
