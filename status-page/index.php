<html>
<head>
<title>Status</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</head>
<body>
<div class="container" style="margin-top: 1rem;">
<h1>Status</h1>
<p>
View the status of services.
<p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Service</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $files = scandir('containers/');
            foreach($files as $file) {
                if ($file === "." || $file === "..") {
                    continue;
                }

                $name=$file;
                $status=trim(file_get_contents('containers/'.$file));
                $color="default";
                switch ($status) {
                    case "running":
                        $color="success";
                        break;
                    case "stopped":
                        $color="danger";
                        break;
                    case "paused":
                        $color="info";
                        break;
                }

                echo "
                    <tr>
                        <td>$name</td>
                        <th class=\"text-$color\">$status</th>
                    </tr>
                    ";
            }
        ?>
    </tbody>
</table>
</div>
</body>
</html>
