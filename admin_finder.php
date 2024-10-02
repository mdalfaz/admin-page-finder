<?php
if (isset($_POST['base_url'])) {
    $base_url = $_POST['base_url'];
    $start_time = microtime(true); // Start time to measure execution duration


    $admin_pages = file('path.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // HTML স্টাইল
    echo "<html><head><title>Admin Page Finder</title>
    <style>
        body {
            background-color: #000000;
            color: #00FF00;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
            box-shadow: 0 0 20px #00FF00, 0 0 10px #00FF00;
        }
        th, td {
            border: 1px solid #00FF00;
            padding: 10px;
            color: #00FF00;
        }
        th {
            background-color: #003300;
            font-size: 20px;
        }
        td {
            background-color: #001a00;
            font-size: 18px;
        }
        h1 {
            color: #00FF00;
            font-size: 40px;
        }
        h2 {
            color: #FF0000;
            font-size: 25px;
        }
        a {
            color: #FFFF00;
        }
    </style></head><body>";

    // Header information
    echo "<h1>Admin Page Finder</h1>";
    echo "<h2>Developed By: Alfaz</h2>";

    echo "<table>";
    echo "<tr><th>URL</th><th>Status</th></tr>";

    foreach ($admin_pages as $page) {
        $full_url = $base_url . $page;
        $headers = @get_headers($full_url);

        if ($headers && strpos($headers[0], '200')) {
            echo "<tr><td style='color:green;'><a href='" . $full_url . "' target='_blank'>" . $full_url . "</a></td><td>Exist (200)</td></tr>";
        } else {
            echo "<tr><td style='color:red;'>" . $full_url . "</td><td>Not Found</td></tr>";
        }
    }

    echo "</table>";

    $end_time = microtime(true); // End time to measure execution duration
    $execution_time = $end_time - $start_time;

    // Display execution time
    echo "<p>Execution time: " . round($execution_time, 2) . " seconds</p>";

    // Search another URL button
    echo "<br><a href='admin_finder.html' style='color: yellow;'>Search another URL</a>";

    echo "</body></html>";
}
?>
