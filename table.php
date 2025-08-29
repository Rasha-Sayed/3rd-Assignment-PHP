<?php
#Third Assignment / Printing Array Data in a Table (Display PHP array data inside an HTML table using a ready-made template)

#Create a PHP page (table.php) that contains the following student data:
$students = [ 
    [   
        '#' => '1',
        'stdNo' => '20003',
        'stdName' => 'Ahmed Ali',
        'stdEmail' => 'ahmed@gmail.com',
        'stdGAP' => 88.7
    ],
    [
        '#' => '2',
        'stdNo' => '30304',
        'stdName' => 'Mona Khalid',
        'stdEmail' => 'mona@gmail.com',
        'stdGAP' => 78.5
    ],
    [
        '#' => '3',
        'stdNo' => '10002',
        'stdName' => 'Bilal Hmaza',
        'stdEmail' => 'bilal@gmail.com',
        'stdGAP' => 98.7
    ],
    [
        '#' => '4',
        'stdNo' => '10005',
        'stdName' => 'Said Ali',
        'stdEmail' => 'said@gmail.com',
        'stdGAP' => 98.7
    ],
    [
        '#' => '5',
        'stdNo' => '10007',
        'stdName' => 'Mohammed ahmed',
        'stdEmail' => 'mohamed@gmail.com',
        'stdGAP' => 98.7
    ]
];
 
$maxGPA = max(array_column($students, 'stdGAP'));                                       #Get the highest GPA
$avgGPA = array_sum(array_column($students, 'stdGAP')) / count($students);              #Calculate the average GPA
?>


<?php#Use a ready-made template with HTML?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel = "stylesheet" href="css/bootstrap.css">    <!-- Adding Bootstrap CSS-->

    <style>
        body {
            background-color: #e6e7e7ff;
        }

        table {
            border-radius: 8px;
            overflow: hidden; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        th, td {
            text-align: center;
        }

        th {
            background-color: #1a60a6ff !important; 
            color: #fff;
        }

       
    </style>

</head>

<body class="container mt-5">    <!--container: centers the page content with automatic side padding (Using Bootstrap)-->

    <h2>Student Information</h2>
    <!--Using Bootstrap to style the table: borders, hover -->
    <table class="table  table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Student No</th>
                <th>Name</th>
                <th>Email</th>
                <th>GPA</th>
            </tr>
        </thead>
        
        <tbody>
        
        <?php
            foreach ($students as $student):
                $highlighted = "";      #Default: without color
                
                
                if($student["stdGAP"] == 98.7) {
                    $highlighted = "table-info";
                }

                elseif($student["stdGAP"] == 88.7) {
                    $highlighted = "table-warning";
                }

                elseif($student["stdGAP"] == 78.5) {
                    $highlighted = "table-danger";
                }

                    
           ?>

            <tr class="<?= $highlighted ?>">
                <td><?= $student["#"] ?></td>
                <td><?= $student["stdNo"] ?></td>
                <td>
                    <?= $student["stdName"] ?>
                    <?= ($student["stdGAP"] == $maxGPA) ? " 🥇" : "" ?>
                </td>
                <td><?= $student["stdEmail"] ?></td>
                <td><?= $student["stdGAP"] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>


        <tfoot>
            <tr>
                <td colspan="4"><strong>Total Students:</strong></td>
                <td><strong><?= count($students) ?></strong></td>             <!-- Display the total number of students -->
            </tr>
        </tfoot>
        
    </table>

    
    <!-- Container for GPA color key-->
    <div class="mt-4">

        <h5>Grade Color Key</h5>                      <!-- Title for the color key -->
        
        <!-- Flex container to arrange the color boxes horizontally -->
        <div style="display: flex; gap: 20px; align-items: center;">

            <!-- First color box: GPA = 98.7 -->
            <div style="display: flex; align-items: center; gap: 5px;">
                <div style="width: 20px; height: 20px; background-color: #cfe2ff; border: 1px solid #000;"></div>
                <span style="font-weight: 600;" >GPA = A+</span>
            </div>
            
            <!-- Second color box: GPA = 88.7 -->
            <div style="display: flex; align-items: center; gap: 5px;">
                <div style="width: 20px; height: 20px; background-color: #fff3cd; border: 1px solid #000;"></div>
                <span style="font-weight: 600;" >GPA = B</span>
            </div>

            <!-- Third color box: GPA = 78.5 -->
            <div style="display: flex; align-items: center; gap: 5px;">
                <div style="width: 20px; height: 20px; background-color: #f8d7da; border: 1px solid #000;"></div>
                <span style="font-weight: 600;" >GPA = C</span>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>


