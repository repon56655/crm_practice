<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>



    <div class="col-md-4 offset-md-4">


        @if(session('success'))
            <div class="alert alert-success notification" role="alert" id="success-alert">
                <strong>{{session('success')}}</strong>
            </div>
        @endif

        <form action="{{ route('customerLogUpdate',$customer->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $customer->title }}" id="name" aria-describedby="">
            </div>
            <div class="mb-3">
                    <label for="phone" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option value="0"  >-----Select Option-----</option>
                        <option value="1" @if ($customer->status==1)selected @endif>Incomplete</option>
                        <option value="2" @if ($customer->status==2)selected @endif>Complete</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="floatingTextarea2">Comments</label>
                <textarea class="form-control" id="floatingTextarea2" name="comment" style="height: 100px">{{ $customer->title }}</textarea>
                
            </div>
                <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {

        //remove notification after save data to db
        removeNotification();
        function removeNotification(){
        setTimeout(() => {
            $('.notification').remove();
        }, 1500);
        }


        });
    </script>
</body>
</html>