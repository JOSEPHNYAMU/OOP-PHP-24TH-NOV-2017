<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP OOP</title>
    <link rel="stylesheet" href="css/index.css"/>
</head>
<body>
<div class="container">
    <?php
    //Auto Loading
    function __autoload($class)
    {
        $class = str_replace('..', '', $class);
        require_once("classes/$class.php");
    }

    $Menu = new Menu();


    //Interface
    interface compute
    {
        public function details();
    }

    //CLasses
    class name implements compute
    {
        public function details()
        {
            return '<br/><div style="margin-bottom:12px;background-color: red;padding:8px;color:#ffffff;">INTEREST CALCULATION RESULTS</div>';
        }
    }


    // Classes
    class location implements compute
    {
        public function details()
        {
            return '';
        }
    }

    if (isset($_POST['show'])) {

        //Object
        $title = new name;
        echo $title->details();
        $name = $_POST['names'];
        $location = $_POST['location'];
        $bank = $_POST['bank'];
        $amount = $_POST['amount'];
        $times = $_POST['times'];
        if($bank == 'Equity'){
            $interest = 0.1;
        }else if ($bank == 'KCB'){
            $interest = 0.6;
        }else if($bank = 'Standard Chartered'){
            $interest = 0.9;
        }else{

            $interest = 0.12;
        }
        $total = ($amount*$interest*$times);
        $allAmount = $total + $amount;

        //Object
        $confirm = new location;
        echo "<table width='100%'>
<tr>
<td>
NAME
</td>
<td>
" . $name . "
</td>
</tr>
<tr>
<td>
LOCATION
</td>
<td>
" . $location . "
</td>
</tr>
<tr>
<td>
BANK
</td>
<td>
" . $bank . "
</td>
</tr>
<tr>
<td>
AMOUNT
</td>
<td>
" . $amount . " /=
</td>
</tr>
<tr>
<td>
PERIOD
</td>
<td>
" . $times . "
</td>
</tr>
<tr>
<td style='color:blue;'>
INTEREST
</td>
<td style='color:blue;font-weight: bold;'>
".$total." /=
</td>
</tr>
<tr>
<td style='color:blue;'>
TOTAL AMOUNT
</td>
<td style='color:blue;'>
".$allAmount."
</td>
</tr>
<tr>
<td>
</td>
<td style='font-size: 9px;'>
Report generated by " . $bank . " Bank
</td>
</tr>
</table>";
    }
    ?>
</div>
</body>
</html>
