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
                            <th scope="col">
                                Date
                            </th>

                        </tr>
                    </thead>
                    <tbody>



                        <tr>
                            <th scope="row">

                            </th>
                            <td>
                                <?= $code ?>
                            </td>
                            <td>
                                <?= $customer ?>
                            </td>
                            <td>
                                <?= $total_amount ?>
                            </td>
                            <td>
                                <?= $tendered ?>
                            </td>
                            <td>
                                <?= $created_at ?>
                            </td>


                        </tr>

                    </tbody>
                </table>

            </div>

        </div>




</body>

</html>