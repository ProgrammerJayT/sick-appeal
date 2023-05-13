<!DOCTYPE html>
<html>

<head>
    <title>New Test Available</title>
    <style>
        body {
            background-color: #F6F6F6;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #1F2937;
            font-size: 24px;
            margin-top: 0;
        }

        p {
            color: #4B5563;
            font-size: 16px;
            margin-bottom: 0;
            line-height: 1.5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 24px;
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .date {
            background-color: #FCA5A5;
            color: #FFFFFF;
            font-size: 18px;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 16px;
            margin-bottom: 24px;
        }

        .details {
            background-color: #00ff44;
            color: #1F2937;
            padding: 16px;
            border-radius: 4px;
            margin-bottom: 24px;
        }

        .details h2 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 16px;
        }

        .footer {
            color: #6B7280;
            font-size: 14px;
            margin-top: 24px;
            text-align: center;
        }

        .footer p {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>New Test Available!</h1>
        <div class="date">{{ $date }}</div>
        <p>Dear student,</p>
        <p>We are pleased to announce that a new test is available for you to take. The details are as follows:</p>
        <div class="details">
            <h2>Test Details</h2>
            <p><strong>Module:</strong> {{ $module }}</p>
            <p><strong>Venue:</strong> {{ $venue }}</p>
            <p><strong>Time:</strong> {{ $time }}</p>
            <p><strong>Lecturer:</strong> {{ $lecturer->name . ' ' . $lecturer->surname }}</p>
        </div>
        <p>Please log in to your account to take the test.</p>
        <div class="footer">
            <p>If you have any questions or concerns, please contact us at <a
                    href="enquiries@sick-applications.co.za">enquiries@sick-applications.co.za</a>.</p>
        </div>
    </div>
</body>

</html>
