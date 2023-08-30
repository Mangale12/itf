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
            <tr style="height: 300px;">
                <td align="center" style="border: none;
                           border-bottom: 2px solid #4cb96b;
                           padding-right: 20px;padding-left:20px">

                    <p style="font-weight: bolder;font-size: 42px;
                              letter-spacing: 0.025em;
                              color:black;">
                        Hello {{ $contact['name'] }}!
                        {{-- <br> Check out our latest Blogs --}}
                        <p class="data"
                       style="text-align: justify-all;
                              align-items: center;
                              font-size: 15px;
                              padding-bottom: 12px;">
                                <h1>Congratulations!</h1>
                            You've been assigned to a team at {{ $contact['name'] }} .
                    Your team details are as follows:
                    <ul>
                        <li><strong>Team Name:</strong> {{ $team['name'] }}</li>
                        <li><strong>Team Email:</strong> [Team Leader Name]</li>
                        <li><strong>Team Address:</strong> [List of Team Members]</li>
                        <li><strong>Team No. :</strong> [List of Team Members]</li>
                        <li><strong>Team Position :</strong> [List of Team Members]</li>
                    </ul>

                    You'll be working together to achieve our goals and make a difference!
                </p>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
