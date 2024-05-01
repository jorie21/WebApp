<?php    
    session_start();

    require '../controllers/Logout.php';
    require '../models/UserModel.php'; 
    require '../controllers/dashboard.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/Instructor_Dashboard.css">
    <link rel="stylesheet" href="../public/styles/Dashboard.css">
    <title>STUDENT PAGE</title>
</head>
<body>
    <?php
        require './components/UpperBar.php'
    ?>
    
    <h2 class="User-Name" style="color: #263339;">WELCOME BACK <?php  echo strtoupper($lastName) ?>!</h2>
 
    <div class="Body-Content">
    
    <div  class="Schedule-Setup" >
    <h1 style="font-size: 20px; font-weight: bold; color: #263339;" >Your Schedule</h1>

    <!-- CARDS -->
    <ul class="cards" style="overflow-y: auto; max-height: 748px;">
    <?php 
    $colors = array('29CC39', 'FF6633', '8833FF', 'E62E7B', '33BFFF', 'FFCB33', '2EE6CA');
    $colorIndex = 0;
    foreach ($cards as $index => $card): 
        $currentColor = '#' . $colors[$colorIndex % count($colors)];
        $colorIndex++;
        $borderColor = $currentColor;
        $backgroundOpacity = 0.2;
        list($r, $g, $b) = sscanf($currentColor, "#%02x%02x%02x");
        $backgroundColor = "rgba($r, $g, $b, $backgroundOpacity)";
    ?>
        <li class="card" style="border: <?php echo $borderColor; ?> 3px solid; background-color: <?php echo $backgroundColor; ?>; color: #4D5E80; border-radius: 10px; padding: 10px 14px; padding-bottom: 100px; list-style-type: none;">
            <h3 style="font-size: 16px;"><?php echo $card['Description']; ?> <span>(<?php echo $card['course_code']; ?>)</span></h3>
            <div class="card-details">
                <div class="detail-left">
                    <span><?php echo $card['Instructor']; ?></span>
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

        
    <?php endforeach; ?>
</ul>


    </div>


<div class="Right-Content">
   <div class="Container-Class">
    <div class="SearchSchedule"><h2>Search Schedule</h2></div> 
        <div class="search-container">        
            <div class="search-input-container">
                <img src="../public/images/search-icon.png" alt="Search" class="search-icon">
                <input type="text" class="search-input" placeholder="Search...">
            </div>
            <button class="Print-Btn">PRINT</button>
        </div>
    </div> 
    
    <div class="Table-Container" style="max-width: 832px; overflow-x: auto; max-height: 682px; overflow-y: auto;">
    <table>
        <tr>
            <th>Room No</th>
            <th>Subject Code</th>
            <th>Description</th>
            <th>Credits</th>
            <th>Section</th>
            <th>Instructor No</th>
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
                <td><?php echo $schedule['Instructor']; ?></td>
                <td><?php echo $schedule['class_day']; ?></td>
                <td><?php echo $schedule['Time']; ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>

</div>
</div>



</body>
</html>