<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <div>
        <div>


            <div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">
                                #
                            </th>
                            <th scope="col">
                                Code
                            </th>
                            <th scope="col">
                                Customer
                            </th>
                            <th scope="col">
                                Total
                            </th>
                            <th scope="col">
                                Tendered
                            </th>

                        </tr>
                    </thead>
                    <tbody>



                        <tr>
                            <th scope="row">

                            </th>
                            <td>
                                <?= $transaction['code'] ?>
                            </td>
                            <td>
                                <?= $transaction['customer'] ?>
                            </td>
                            <td>
                                <?= $transaction['total_amount'] ?>
                            </td>
                            <td>
                                <?= $transaction['tendered'] ?>
                            </td>

                        </tr>

                    </tbody>
                </table>

                <a href="<?php base_url('pdf/generate') ?>">
                    Download PDF
                </a>
            </div>

        </div>




</body>

</html>