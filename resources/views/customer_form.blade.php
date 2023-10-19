<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="http://127.0.0.1:8000/api/customer" method="POST" enctype="multipart/form-data" style="padding: 20px">
        <tr>
            <th>
                Image :
            </th>
            <th>
                <input type="file" name='image' image='image' id="image">
            </th>
        </tr>
        <tr>
            <th>
                Name :
            </th>
            <th>
                <input type="text" name='name' id="name" placeholder="Name">
            </th>
        </tr>
        <tr>
            <th>
                Email :
            </th>
            <th>
                <input type="text" name="email" id="email" placeholder="Email">
            </th>
        </tr>
        <tr>
            <th>
                Address :
            </th>
            <th>
                <input type="text" name="address" id="address" placeholder="Address">
            </th>
        </tr>
        <tr>
            <th>
                Nic :
            </th>
            <th>
                <input type="text" name="nic" id="nic" placeholder="NIC">
            </th>
        </tr>

        <th>
            <input style="color: black;background:greenyellow; " type="submit" id="add-button" value="Submit">
        </th>
    </form>

    <br>

    <th>
        <th>
               Enter Customer ID :
        </th>
        <th>
            <input type="text" name="customer_id" id="customer_id" placeholder="ID">
        </th>
        
        <a style="color: rgb(10, 32, 161)" href="#" id="download-link">Download PDF</a>
    </th>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            
            $('#customer_id').on('input', function () {
                var customerId = $(this).val(); 
                var downloadLink = '{{ route('customerPdf', ['id' => 'CUSTOMER_ID']) }}';
                downloadLink = downloadLink.replace('CUSTOMER_ID', customerId);
    
                $('#download-link').attr('href', downloadLink);
            });
        });
    </script>
</body>
</html>