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

            <a href="{{ route('addCustomer') }}" class="btn btn-success btn-sm my-3">Add Customer</a>
            <a href="{{ route('manageCustomer') }}" class="btn btn-success btn-sm my-3">Manage Customer</a>
            <a href="{{ route('customerLogAdd') }}" class="btn btn-success btn-sm my-3">Add Customer Log</a>
            <a href="{{ route('customerLogManageView') }}" class="btn btn-success btn-sm my-3">Manage Customer Log</a>

        <form action="{{ Route('storeCustomer') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="">
            </div>
            <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="phone" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address">
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>