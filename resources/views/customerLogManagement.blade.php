<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="col-md-6 offset-md-3">

            <a href="{{ route('customerLogAdd') }}" class="btn btn-success btn-sm my-3">Add Customer Log</a>
    
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
               
                    @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $customer->title }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>
                            @if($customer->status == 1)
                                <button class="btn btn-danger" id="status_<?php echo $key ?>"  onclick='chnageStatus("<?php echo $customer->status ?>", "<?php echo $key ?>")'>Incomplete</button>
                            @else
                                <button class="btn btn-success" id="status_<?php echo $key ?>"  onclick='chnageStatus("<?php echo $customer->status ?>", "<?php echo $key ?>")'>Complete</button>
                            @endif
                            
                            
                        </td>
                        <td>
                            <a href="{{ route('customerLogEdit',$customer->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square "></i></a>
                        </td>
                        <td>
                            <a href="{{ route('customerLogDelete',$customer->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
              
                @endforeach
            </tbody>
        </table>

    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function chnageStatus(status_id, serial_number){
            var new_id;
            if(status_id == 1){
                new_id = 2;
                $('#status_'+serial_number).html('complete');
                $('#status_'+serial_number).removeClass("btn-danger");
                $('#status_'+serial_number).addClass("btn-success");


            }else if(status_id == 2){
                new_id = 1;
                $('#status_'+serial_number).html('Incomplete');
                $('#status_'+serial_number).addClass("btn-danger");
                $('#status_'+serial_number).removeClass("btn-success");

            }
            //send ajax post request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/changeStatus',
                data: {
                    'status_id': new_id
                },
                success: function(data){
                    console.log(data);
                //console.log(data.success)
                }
            });

            
            
        }
      
    </script>
</body>
</html>