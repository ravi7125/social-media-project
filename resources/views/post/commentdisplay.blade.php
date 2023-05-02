<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <h1>Comment Replay Details</h1>

<p><strong>Comment:</strong> {{ $postcomment->comment }}</p>
<p><strong>User:</strong> {{ $postcomment->user->name }}</p>
<p><strong>Post Comment:</strong> {{ $postcomment->postcomment->comment }}</p>
<p><strong>Post:</strong> {{ $postcomment->post->title }}</p> --}}
<form action="" method='GET'>
    @csrf
    <table border="2" class="table table-hover table-green">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">user_id </th>
                <th scope="col">post_id</th>
                <th scope="col">postcomment</th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
            </thead>
                       
                        <tbody>
                            <tr>
                                
                                @foreach($postcomment as $pot)
                                <td> {{$pot['id']}}</td>
                                <td> {{$pot['comment']}}</td>
                               
                                @endforeach                         
</body>
</html>