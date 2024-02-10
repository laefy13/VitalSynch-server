<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Prescriptions</title>
    <style>
        hr {
            color: #333;
            background-color: #333;
            height: 2px;
            border: none;
        }
        .subhead-cont{
            margin-left: 12px;
            font-size: 16px;
            display: flex;
            justify-content: space-between; /* Align the sub-cont divs to each end */
        }
        .sub-cont {
            flex: 1; /* Equal width for both sub-cont divs */
        }
        .main-cont{
            display:flex;
            font-size:30px;
            justify-content: center; /* Center the text horizontally */
            align-items: center; /* Center the text vertically */
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="head-cont">
            <h1>VitalSynch</h1> 
        </div>
    </div>
    <hr>
    <div class="subhead-cont">
        <div class="sub-cont">
            Patient Name : {{ $patient->ptnt_surname }}, {{ $patient->ptnt_first_name }} {{ $patient->ptnt_mid_name }} {{ $patient->ptnt_extn_name }}<br>
            Blood Type : {{ $patient->ptnt_blood_group }}
            Sex : {{ $patient->ptnt_sex }}<br>
        </div>
        <div class="sub-cont" style="text-align: right;">
            Test Type : {{ $lab_rep->labrep_type}}<br>
            Test Date : {{ $lab_rep->labrep_test_date}}<br>
            Test Time : {{ $lab_rep->labrep_test_time}}<br>
        </div>
    </div>
    <div class="main-cont">
        <h1>Results:</h1>
        {{ $lab_rep->result }}
    </div>
</body>
</html>
