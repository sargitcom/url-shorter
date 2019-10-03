<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if (empty($data)) {
                            ?>
                            <h1>No statistics avaialable</h1>
                            <?php
                        } else {
                            ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>System</th>
                                            <th>User agent</th>
                                            <th>IP</th>
                                            <th>Region</th>
                                            <th>Added date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($data as $stat) {
                                                ?>
                                                    <tr>
                                                        <td><?= $stat->system ?></td>
                                                        <td><?= $stat->user_agent ?></td>
                                                        <td><?= $stat->ip ?></td>
                                                        <td><?= $stat->region ?></td>
                                                        <td><?= $stat->added ?></td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                            </table>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
