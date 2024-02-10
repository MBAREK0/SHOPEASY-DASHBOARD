<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        /* Reset CSS */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }
        /* Main Container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333;
        }
        /* Content */
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        /* Button */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        /* Footer */
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Password Reset</h1>
        </div>
        <div class="content">
            <p>Dear User,</p>
            <p>We have received a request to reset your password. To proceed with the password reset, please click the button below:</p>
            <p><a href="{{ $resetLink }}" class="btn">Reset Password</a></p>
            <p>If you did not request a password reset, you can ignore this email.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Adids. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
