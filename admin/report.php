<?php
include '../include/config.php';
require_once '../vendor/autoload.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $sale = $_POST['sale'];
    if($sale=='Daily'){
// Get daily sales
$sql = "SELECT DATE(time) AS day, SUM(total_amount) AS total_sales
FROM orders WHERE `status` = 1 
GROUP BY DATE(time)
ORDER BY DATE(time)";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);
if($num >= 1) {
    $html = '<style>table, th, td{border: 2px solid black; }table{margin-left: auto;
        margin-right: auto;width: 80%;}</style><table>
    <caption><h1>Daily Sales Report</h1></caption>
    <tr>
    <th>Sr. No.</th>
        <th>Date</th>
        <th>Total Sales</th>
        
    </tr>';
    $srNo = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $srNo=$srNo+1;
     $html .=   '<tr><td>' . $srNo .  '</td>';
     $html .=    '<td>' .$row['day'] .'</td>';
    $html .= '<td>'. $row['total_sales'] .'</td>
        
        </tr>';
  }
  $html .= '</table>
</div>';
}else{
$html .= '<div>NO RECORD FOUND</div>';
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file, 'I');
    }elseif($sale=='Monthly'){
$sql = "SELECT DATE_FORMAT(time, '%Y-%m') AS month, SUM(total_amount) AS total_sales
FROM orders WHERE `status` = 1 
GROUP BY DATE_FORMAT(time, '%Y-%m')
ORDER BY DATE_FORMAT(time, '%Y-%m')";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);
if($num >= 1) {
    $html = '<style>table, th, td{border: 2px solid black; }table{margin-left: auto;
        margin-right: auto;width: 80%;}</style><table>
    <caption><h1>Monthly Sales Report</h1></caption>
    <tr>
    <th>Sr. No.</th>
        <th>Date</th>
        <th>Total Sales</th>
        
    </tr>';
    $srNo = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $srNo=$srNo+1;
     $html .=   '<tr><td>' . $srNo .  '</td>';
     $html .=    '<td>' .$row['month'] .'</td>';
    $html .= '<td>'. $row['total_sales'] .'</td>
        
        </tr>';
  }
  $html .= '</table>
</div>';
}else{
$html .= '<div>NO RECORD FOUND</div>';
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file, 'I');
    }elseif($sale=='Yearly'){
$sql = "SELECT YEAR(time) AS year, SUM(total_amount) AS total_sales
FROM orders WHERE `status` = 1 
GROUP BY YEAR(time)
ORDER BY YEAR(time)";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);
if($num >= 1) {
    $html = '<style>table, th, td{border: 2px solid black; }table{margin-left: auto;
        margin-right: auto;width: 80%;}</style><table>
    <caption><h1>Yearly Sales Report</h1></caption>
    <tr>
    <th>Sr. No.</th>
        <th>Date</th>
        <th>Total Sales</th>  
    </tr>';
    $srNo = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $srNo=$srNo+1;
     $html .=   '<tr><td>' . $srNo .  '</td>';
     $html .=    '<td>' .$row['year'] .'</td>';
    $html .= '<td>'. $row['total_sales'] .'</td>
        
        </tr>';
  }
  $html .= '</table>
</div>';
}else{
$html .= '<div>NO RECORD FOUND</div>';
}

$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file, 'I');
    }         
}

include 'nav.php'; 
?>

<div class="alignItemCenter">
    <form action="report.php" method="post" target="_blank">
    <h3 class="formHeading">Generate Report</h3>
    
        <div class="select">
        <label class="formLabel">Select:</label>

        <select name="sale" required>
        <option value="">--none--</option>
  <option value="Daily">Daily</option>
  <option value="Monthly">Monthly</option>
  <option value="Yearly">Yearly</option>
</select>

        </div>
        <br>
        <div class="formButton">
        
        <button type="login" class="buttonCss">Generate</button>
        </div>
    </form>
</div>
</body>
</html>
