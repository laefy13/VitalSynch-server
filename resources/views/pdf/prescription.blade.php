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
            margin-left:12px;
            font-size:16px;
        }
        .main-cont{
            display:flex;
            font-size:30px;
            justify-content: center; /* Center the text horizontally */
            align-items: center; /* Center the text vertically */
            text-align: center;

        }
        .footer-cont{
            display:flex;
            justify-content: flex-end; /* Align to the far right */
            align-items: flex-end;
            text-align: right; 

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
        Address : {{ $patient->ptnt_address }}
        </div>
        <div class="sub-cont">
        Sex : {{ $patient->ptnt_sex }}<br>
        Date : {{ now()->format('Y-m-d') }}
        </div>
    </div>
    <div class="main-cont">
        
    <!-- Use a foreach loop for each drug name and instruction -->
    @foreach ($drugs as $drug)
        {{ $drug->drug_name }} : {{ $drug->pd_instruction}}
    @endforeach
    </div>
    <div class="footer-cont">
        <!-- <img src="storage/Signatures/Pez57jGhCBVDTJFGO3EPoCJI91wDEygDbkNkVlrE.png" alt="doctor signature"><br>
        {{ $doctor->doctor_signature }} -->
        Doctor Name : {{ $doctor->doctor_surname }} {{ $doctor->doctor_first_name }} {{ $doctor->doctor_mid_name }} {{ $doctor->doctor_extn_name }}
    </div>
</body>
</html>
