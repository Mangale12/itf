<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<!-- Complete Email template -->

<body style="background-color:grey">
    <table align="center" border="0" cellpadding="0" cellspacing="0"
           width="550" bgcolor="white" style="border:2px solid black">
        <tbody>

            <tr>
                <td align="center" style="border: none;
                           border-bottom: 2px solid #4cb96b;
                           padding-right: 20px;padding-left:20px">

                    <p style="font-weight: bolder;font-size: 20px;
                              letter-spacing: 0.025em;
                              color:black;">
                        Hello {{ $name }}!
                        {{-- <br> Check out our latest Blogs --}}
                    </p>
                    <p class="data"
                       style="text-align: justify-all;
                              align-items: center;
                              font-size: 15px;
                              padding-bottom: 12px;">
                                We have received your message and will get back to you as soon as possible.
                                Thank you for choosing us!
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
