<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Email Verification</h1>
    <p>Hello {{ $user->name }},</p>
    <p>Thank you for registering. Please click the link below to verify your email address:</p>
    <a href="{{ $verificationUrl }}">Verify Email Address</a>
</body>
</html>