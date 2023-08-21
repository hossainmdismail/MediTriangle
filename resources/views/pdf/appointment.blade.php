<!DOCTYPE html>
<html lang="en">
<?php
print_r($data['appointment']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px 30px 8px 8px;
        }


        ul {
            padding-inline-start: 0;
        }

        ul li {
            list-style: none;
            padding: 3px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4rem;
        }

        .logo img {
            width: 200px;
        }

        .date {
            font-size: 0.8rem;
            display: inline-flex;
            column-gap: 1rem;
        }

        .billings {
            display: inline-flex;
            width: 60%;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <img src="http://meditriangle.com/frontend/brand.png" alt="">
        </div>
    </div>

    <table style="margin-bottom: 3rem;">
        <tr>
            <td>Order ID</td>
            <td>{{ $data['appointment']->order_id }}</td>
        </tr>
        <tr>
            <td>Fee</td>
            <td>{{ $data['appointment']->fee }} TK</td>
        </tr>
        <tr>
            <td>Request</td>
            <td>{{ $data['appointment']->appoinment_date->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $data['appointment']->passportname }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{ $data['appointment']->gender }}</td>
        </tr>
        <tr>
            <td>Number</td>
            <td>{{ $data['appointment']->number }}</td>
        </tr>
        <tr>
            <td>Passport</td>
            <td>{{ $data['appointment']->passportnumber }}</td>
        </tr>
    </table>


    <div style="margin-bottom: 4rem;">
        <h2>Appointment for :</h2>
        <table style="margin-bottom: 2rem; width: 100%;">
            <tr>
                <th>Doctor</th>
                <th>Department</th>
                <th>Location</th>
            </tr>
            <tr>
                <td>{{ $data['appointment']->con_doctor->name }}</td>
                <td>{{ $data['appointment']->con_doctor->con_department->department }}</td>
                <td>{{ $data['appointment']->con_doctor->con_hospital->hospital }},{{ $data['appointment']->con_doctor->con_state->state }},{{ $data['appointment']->con_doctor->con_country->country }}
                </td>
            </tr>
        </table>
    </div>

    <div style="margin-bottom: 4rem;">
        <h2>Attendant :</h2>
        <table style="margin-bottom: 2rem; width: 100%;">
            <tr>
                <th>Name</th>
                <th>Passport</th>
            </tr>
            @foreach (App\Models\attendant::where('order_id', $data['appointment']->order_id)->get() as $key => $attendent)
                <tr>
                    <td>{{ $attendent->attendant_name }}</td>
                    <td>{{ $attendent->passport_number }}</td>
                </tr>
            @endforeach

        </table>
    </div>

    <footer style="margin-top: 6rem;">

    </footer>

</body>

</html>
