<?php
    include('dbconnection.php');
    $request = $_POST['request'];

    if($request=="getcourses")
    {
        $courseid = $_POST['courseid'];
    
        $stmt = $con->prepare("SELECT * FROM `all_courses` WHERE `Course_ID`='$courseid'");
        $stmt->execute();

        $result = $stmt->fetchAll();
        $i=0;
        $j=0;

        foreach($result as $row)
        {
            $courses[$i][$j]=$row["Subject_Short"];
            $courses[$i][$j+1]=$row["Subject_Long"];
            
            $i++;
            $j=0;
        }
        echo json_encode($courses);
    }

    if($request=="getlabs")
    {
        $courseid = $_POST['courseid'];
    
        $stmt = $con->prepare("SELECT * FROM `lab` WHERE `Course_ID`='$courseid'");
        $stmt->execute();

        $result = $stmt->fetchAll();
        $i=0;
        $j=0;

        foreach($result as $row)
        {
            $courses[$i][$j]=$row["Subject_Short"];
            $courses[$i][$j+1]=$row["Subject_Long"];
            
            $i++;
            $j=0;
        }
        echo json_encode($courses);
    }

    if($request=="getslots")
    {
        $slotid = $_POST['slotid'];

        $stmt = $con->prepare("SELECT * FROM `slots` WHERE `Slot_ID`='$slotid'");
        $stmt->execute();

        $result = $stmt->fetchAll();
        $i=0;
        $j=0;

        foreach($result as $row)
        {
            $slots[$i][$j]=$row["Slot1"];
            $slots[$i][$j+1]=$row["Slot2"];
            $slots[$i][$j+2]=$row["Slot3"];
            $slots[$i][$j+3]=$row["Slot4"];
            $slots[$i][$j+4]=$row["Slot5"];
            $slots[$i][$j+5]=$row["Slot6"];
            $slots[$i][$j+6]=$row["Slot7"];
            
            $i++;
            $j=0;
        }
        echo json_encode($slots);
    }

    if($request=="generate")
    {
        $slotid = $_POST['slotid'];
        $courseid = $_POST['courseid'];
        
        $stmt = $con->prepare("SELECT * FROM `slots` WHERE `Slot_ID`='$slotid'");
        $stmt->execute();

        $slot_result = $stmt->fetchAll();

        $stmt2 = $con->prepare("SELECT * FROM `all_courses` WHERE `Course_ID`='$courseid'");
        $stmt2->execute();

        $course_result = $stmt2->fetchAll();

        //print_r($course_result);

        $i=0;
        $j=0;

        foreach($course_result as $row)
        {
            $courses[$i][$j]=$row["Subject_Short"];
            $i++;
            $j=0;
        }

        for($i=0;$i<6;$i++)
        {
            shuffle($courses);
            $random_keys=array_rand($courses,4);
                $k=0;
                //$slot1=array($a[$random_keys[0]],$a[$random_keys[1]],$a[$random_keys[2]],$a[$random_keys[3]]);
                $random_courses[$i][$k] = $courses[$random_keys[0]];
                $random_courses[$i][$k+1] = $courses[$random_keys[1]];
                $random_courses[$i][$k+2] = $courses[$random_keys[2]];
                $random_courses[$i][$k+3] = $courses[$random_keys[3]];
        }

        echo json_encode($random_courses);

    }

    
?>