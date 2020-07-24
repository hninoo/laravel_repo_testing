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
                <th style="width: 50%;">Task</th>
                <th style="width: 55%;">Status</th>
            </tr>
        </thead>
        <tbody style="width:100%;">
            @foreach ($data as $key=>$item)

                <tr style="width:100%;" >
                    <td style="width: 10%;padding-left: 15px;">{{++$key}}</td>
                    <td style="width: 50%;padding-left: 130px;">{{$item[0]['task_name']}}</td>
                    <td style="width: 60%;padding-left: 160px;">{{$item[0]->status->name}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
