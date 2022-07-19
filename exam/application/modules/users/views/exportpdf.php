<!DOCTYPE html>

<html lang="en" dir="ltr">

    <head>

        <meta charset="utf-8">

        <title>Users Lists</title>

    </head>

    <body>

        <label style="font-weight:700;">Users</label>

        <table style="margin-top:20px; border-collapse: collapse; text-align:center;width:100%">
            <tr>
                <th style="border: 1px solid #000; padding: 2px">No.</th>
                <th style="border: 1px solid #000; padding: 2px">Full Name</th>
                <th style="border: 1px solid #000; padding: 2px">Date of Birth</th>
                <th style="border: 1px solid #000; padding: 2px">Salary</th>
                <th style="border: 1px solid #000; padding: 2px">Description</th>
                <th style="border: 1px solid #000; padding: 2px">Job Description</th>
            </tr>
            <?php foreach($datas as $key => $value) { ?>
                
                <tr>
                    <td style="border: 1px solid #000; padding: 2px"><?= $value->user_id; ?></td>
                    <td style="border: 1px solid #000; padding: 2px"><?= $value->fullname; ?></td>
                    <td style="border: 1px solid #000; padding: 2px"><?= date('m/d/Y', strtotime($value->birthdate)); ?></td>
                    <td style="border: 1px solid #000; padding: 2px"><?= $value->salary; ?></td>
                    <td style="border: 1px solid #000; padding: 2px"><?= $value->description; ?></td>
                    <td style="border: 1px solid #000; padding: 2px"><a href="<?php base_url('assets/uploads/pdf/'.$value->job_description); ?>"><?= $value->job_description; ?></a></td>
                </tr>
            <?php } ?>

        </table>

    </body>

</html>