<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>
</head>

<body>
    <h1>Email Verification</h1>
    <p>Please click the following link to verify your email address:</p>
    <p>The token is : {{ $token }}</p>
    {{-- <a href="{{ route('verify-email', ['token' => $token]) }}">Verify Email</a> --}}
</body>

</html>
