<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Task</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($todos as $key => $item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->task_name}}</td>
                <td>{{$item->status->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
