<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <style>
        .div_hold {
            border: 1px solid gray;
            padding: 8px;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            color: #4CAF50;
        }

        p {
            text-indent: 50px;
            text-align: justify;
            letter-spacing: 1px;
        }

        a {
            text-decoration: none;
            color: #008CBA;
        }

        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="div_hold">
        <h1>You have a new contact request</h1>
        <table id="customers">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
            </tr>
            <tr>
                <td>{{ $contact['name'] }}</td>
                <td>{{ $contact['email'] }}</td>
                <td>{{ $contact['subject'] }}</td>
            </tr>
        </table>
        <p>{{ $contact['body'] }}</p>
    </div>
</body>

</html>
