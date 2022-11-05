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

            <a href="{{ route('addCustomer') }}" class="btn btn-success btn-sm my-3">Add Customer</a>
            <a href="{{ route('manageCustomer') }}" class="btn btn-success btn-sm my-3">Manage Customer</a>
            <a href="{{ route('customerLogAdd') }}" class="btn btn-success btn-sm my-3">Add Customer Log</a>
            <a href="{{ route('customerLogManageView') }}" class="btn btn-success btn-sm my-3">Manage Customer Log</a>
    
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
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
                                <button class="btn btn-danger" id="status_<?php echo $customer->id ?>"  onclick='chnageStatus("<?php echo $customer->status ?>", "<?php echo $customer->id ?>")'>Incomplete</button>
                            @else
                                <button class="btn btn-success" id="status_<?php echo $customer->id ?>"  onclick='chnageStatus("<?php echo $customer->status ?>", "<?php echo $customer->id ?>")'>Complete</button>
                            @endif
                            
                            
                        </td>
                        <td>
                            <a href="{{ route('customerLogEdit',$customer->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square "></i> Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('customerLogDelete',$customer->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</a>
                        </td>
                    </tr>
              
                @endforeach
            </tbody>
        </table>

    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function chnageStatus(status, serial_number){
            var data = {
                customer_id:serial_number
            }

            //send ajax post request
            $.ajax({
                type: "GET",
                url: "{{route('customer.changestatus')}}",
                data: data,
                success: function (response) {
                    console.log(response);
                    if(response.status == 1){
                        $('#status_'+response.serial_number).html('Incomplete');
                        $('#status_'+response.serial_number).addClass("btn-danger");
                        $('#status_'+response.serial_number).removeClass("btn-success");

                 
                    }
                    else if(response.status == 2){
                        $('#status_'+response.serial_number).html('Complete');
                        $('#status_'+response.serial_number).removeClass("btn-danger");
                        $('#status_'+response.serial_number).addClass("btn-success");
                    }
                   
                    
                }
            });
            
            //==========Ajax Update part=================
           

            
        }
      
    </script>
</body>
</html>