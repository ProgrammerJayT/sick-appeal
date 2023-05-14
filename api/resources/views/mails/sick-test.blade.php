<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sick Test Application Now Open</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
        <h2 style="color: #333;">Sick Test Application Now Open</h2>
        <p style="color: #333;">Dear Student,</p>
        <p style="color: #333;">We would like to inform you that the sick test application is now open for the module
            <strong>{{ ucfirst($module->name) }}</strong>. If you were unable to attend the initial test
            due to illness or any valid reasons, this is your opportunity to apply for a makeup test.
        </p>
        <p style="color: #333;">Please take note of the following details:</p>
        <ul>
            <li style="color: red;font-weight:bold;font-size:30;"><strong>Application Deadline:</strong>
                {{ $deadline }}</li>
        </ul>
        <p style="color: #333;">To apply for the makeup test, please login and apply.</p>
        <p style="color: #333;">Thank you.</p>
        <p style="color: #333;">Best regards,</p>
        <p style="color: #333;">{{ ucfirst($lecturer->name . ' ' . $lecturer->surname) }}</p>
    </div>
</body>

</html>
