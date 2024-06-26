<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSTRUCTOR PAGE</title>
    <link rel="stylesheet" href="../public/styles/mainpages.css">
    <link rel="stylesheet" href="../public/styles/topbar.css">
</head>
<body>

    <?php require("../views/components/topbar.php") ?>

    <section>
        <h2 class="greetings" style="font-size: 20px;">WELCOME BACK, <?php echo strtoupper($_SESSION["lastname"]); ?>!</h2>
        <div class="content-block">
            <div class="left-content">
                <h3>Your Schedule</h3>
                <ul class="cards">
                <?php foreach ($cards as $index => $card): ?>
                    <?php
                    $currentColor = '#' . $colors[$colorIndex % count($colors)];
                    $colorIndex++;
                    $borderColor = $currentColor;
                    $backgroundOpacity = 0.2;
                    list($r, $g, $b) = sscanf($currentColor, "#%02x%02x%02x");
                    $backgroundColor = "rgba($r, $g, $b, $backgroundOpacity)";
                    ?>
                      <li class="card" style="border: <?php echo $borderColor; ?> 3px solid; background-color: <?php echo $backgroundColor; ?>; ">
                        <h3 style="font-size: 16px;"><?php echo $card['Description']; ?> <span>(<?php echo $card['course_code']; ?>)</span></h3>
                        <div class="card-details">
                            <div class="detail-left">
                                <span><?php echo $card['Room']; ?></span>
                                <span><?php echo $card['Section']; ?></span>
                            </div>
                            <div class="detail-right">
                                <h4 class="class-day"><?php echo substr($card['class_day'], 0, 1); ?></h4>
                                <div class="time-section">
                                    <span class="time" style="background-color: <?php echo $currentColor; ?>;"><?php echo $card['start_time']; ?></span>
                                    <span class="time" style="background-color: <?php echo $currentColor; ?>;"><?php echo $card['end_time']; ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
                </ul>
            </div>
            <div class="right-content">
                <div class='top-content'>
                    <h3>Search Schedule</h3>
                    <div class="search-section">
                        <div class="search">
                            <img class="icon" src="../public/images/search-icon.png">
                            <input type="text" class="search-input" placeholder="Search" onkeyup="searchTable()">
                        </div>
                        <button onclick="printTable()">PRINT</button>
                    </div>
                </div>
                <div class='bottom-content'>
                    <table id="scheduleTable">
                        <tr>
                            <th>Room No</th>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Credits</th>
                            <th>Section</th>
                            <th>Class Day</th>
                            <th>Time</th>
                        </tr>

                        <?php foreach($schedules as $schedule): ?>
                            <tr>
                                <td><?php echo $schedule['room_no']; ?></td>
                                <td><?php echo $schedule['course_code']; ?></td>
                                <td><?php echo $schedule['Description']; ?></td>
                                <td><?php echo $schedule['Credits']; ?></td>
                                <td><?php echo $schedule['section']; ?></td>
                                <td><?php echo $schedule['class_day']; ?></td>
                                <td><?php echo $schedule['Time']; ?></td>
                            </tr>
                         <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script  src="../public/scripts/Search.js"></script>
    <script  src="../public//scripts/Print.js"   ></script>
</body>
</html>
