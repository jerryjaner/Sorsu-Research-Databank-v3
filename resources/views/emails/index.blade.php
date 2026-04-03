<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $mailData['subject'] }}</title>
</head>
<body style="margin:0; padding:0; background:#f4f6f8; font-family: Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
<tr>
<td align="center">

    <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:10px; padding:30px;">

        <!-- Logo -->
        <tr>
            <td align="center" style="padding-bottom:20px;">
                <img src="{{ url('/student/assets/media/logos/ssu-logo.png') }}" width="120">
            </td>
        </tr>

        <!-- Title -->
        <tr>
            <td>
                <h2 style="margin:0;">
                    {{ $mailData['title'] ?? 'Notification' }}
                </h2>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding:15px 0;">
                <p style="color:#555; line-height:1.6;">
                    {!! nl2br(e($mailData['body'])) !!}
                </p>
            </td>
        </tr>

        <!-- Divider -->
        <tr>
            <td>
                <hr style="border:none; border-top:1px solid #eee;">
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="padding-top:15px;">
                <p style="margin:0;">
                    Best regards,<br>
                    <strong>Campus Administrator</strong>
                </p>

                <p style="font-size:12px; color:#aaa; margin-top:10px;">
                    © {{ date('Y') }} Campus System
                </p>
            </td>
        </tr>

    </table>

</td>
</tr>
</table>

</body>
</html>
