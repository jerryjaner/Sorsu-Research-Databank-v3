<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body style="margin:0; padding:0; background:#f4f6f8; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
        <tr>
            <td align="center">

                <!-- Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:10px; padding:30px;">

                    <!-- Logo -->
                    <tr>
                        <td align="center" style="padding-bottom:20px;">
                            <img src="{{ $logo }}" alt="Logo" width="120" style="display:block; margin:0 auto;">
                        </td>
                    </tr>

                    <!-- Title -->
                    <tr>
                        <td>
                            <h2 style="margin:0; color:#333;">
                                Hello {{ $name }},
                            </h2>
                        </td>
                    </tr>

                    <!-- Message -->
                    <tr>
                        <td style="padding:15px 0;">
                            <p style="margin:0; color:#555; line-height:1.6;">
                                We received a request to reset your password.
                            </p>
                        </td>
                    </tr>

                    <!-- Button -->
                    <tr>
                        <td align="center" style="padding:25px 0;">
                            <a href="{{ $resetUrl }}" style="background:#1d72b8; color:#ffffff; padding:12px 25px; text-decoration:none; border-radius:5px; font-weight:bold; display:inline-block;">
                                Reset Password
                            </a>
                        </td>
                    </tr>

                    <!-- Info -->
                    <tr>
                        <td>
                            <p style="color:#777; font-size:14px; margin:0 0 10px;">
                                This link will expire in 60 minutes.
                            </p>

                            <p style="color:#777; font-size:14px; margin:0;">
                                If you did not request this, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding-top:25px;">
                            <hr style="border:none; border-top:1px solid #eee;">
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding-top:15px;">

                            <p style="margin:0; font-size:14px; color:#333;">
                                Best regards,<br>
                                <strong>Campus Administrator</strong>
                            </p>

                            <!-- Fallback link -->
                            <p style="font-size:12px; color:#888; margin-top:15px;">
                                If the button above does not work, copy and paste this link into your browser:
                            </p>

                            <p style="word-break:break-all; font-size:12px;">
                                <a href="{{ $resetUrl }}" style="color:#1d72b8;">
                                    {{ $resetUrl }}
                                </a>
                            </p>

                            <!-- Footer note -->
                            <p style="font-size:12px; color:#aaa; margin-top:20px; text-align:center;">
                                This is an automated message. Please do not reply.
                            </p>

                            <!-- Copyright -->
                            <p style="font-size:12px; color:#aaa; text-align:center; margin-top:5px;">
                                © {{ date('Y') }} Sorsogon State University
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
