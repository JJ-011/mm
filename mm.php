<?php

$input2 = "";
$fromUnit = "";
$toUnit = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["input"];
    $input2 = $input;
    $fromUnit = $_POST["fromUnit"];
    $toUnit = $_POST["toUnit"];

    if (isset($_POST['swap'])) {
        $temp = $fromUnit;
        $fromUnit = $toUnit;
        $toUnit = $temp;
    }
}
function convertToImperial($input, $fromUnit, $toUnit) {

    if ($fromUnit === $toUnit) {
        return $input; 
    }

    switch ($fromUnit) {
        
        case 'มิลลิเมตร(mm)':
            $input = $input * 0.03937;
            break;
        case 'เซนติเมตร(cm)':
            $input = $input * 0.393701; 
            break;
        case 'เมตร(m)':
            $input = $input * 39.3701; 
            break;
        case 'กิโลเมตร(km)':
            $input = $input * 39370.08; 
            break;
        case 'นิ้ว(in)':
            break;
        case 'ฟุต(ft)':
            $input = $input * 12; 
            break;
        case 'หลา(yd)':
            $input = $input * 36; 
            break;
        case 'ไมล์(mi)':
            $input = $input * 63360; 
            break;
        default:
            return null; 
    }

   
    switch ($toUnit) {
        case 'มิลลิเมตร(mm)':
            $input = $input / 0.03937; 
            break;
        case 'เซนติเมตร(cm)':
            $input = $input / 0.393701; 
            break;
        case 'เมตร(m)':
            $input = $input / 39.3701; 
            break;
        case 'กิโลเมตร(km)':
            $input = $input / 39370.08; 
            break;
        case 'นิ้ว(in)':
            break;
        case 'ฟุต(ft)':
            $input = $input / 12; 
            break;
        case 'หลา(yd)':
            $input = $input / 36; 
            break;
        case 'ไมล์(mi)':
            $input = $input / 63360; 
            break;
        default:
            return null; 
    }

    return $input;
}


?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>โปรแกรมแปลงหน่วย</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light" href="mm.php">เเปลงหน่วยวัด</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container text-center">
    <br>
    <br>
    <h2>โปรแกรมแปลงหน่วย: เมตริกเป็นอังกฤษ</h2>
    <br>
    <form method="POST">
    <div class="col col-sm-3 mx-auto">
        <label for="input">กรอกค่า: </label>
        <input require type="number" class="form-control" name="input" id="input" value="<?php echo $input2 ?>" >
        </div>
        <div class="col col-sm-3 mx-auto">
        <label for="fromUnit">จาก: </label>
        <select class="form-control" name="fromUnit" id="fromUnit">
            <option value="มิลลิเมตร(mm)" <?php if($fromUnit === "มิลลิเมตร(mm)") echo "selected"; ?>>(mm)</option>
            <option value="เซนติเมตร(cm)" <?php if($fromUnit === "เซนติเมตร(cm)") echo "selected"; ?>>(cm)</option>
            <option value="เมตร(m)" <?php if($fromUnit === "เมตร(m)") echo "selected"; ?>>(m)</option>
            <option value="กิโลเมตร(km)" <?php if($fromUnit === "กิโลเมตร(km)") echo "selected"; ?>>(km)</option>
            <option value="นิ้ว(in)" <?php if($fromUnit === "นิ้ว(in)") echo "selected"; ?>>(in)</option>
            <option value="ฟุต(ft)" <?php if($fromUnit === "ฟุต(ft)") echo "selected"; ?>>(ft)</option>
            <option value="หลา(yd)" <?php if($fromUnit === "หลา(yd)") echo "selected"; ?>>(yd)</option>
            <option value="ไมล์(mi)" <?php if($fromUnit === "ไมล์(mi)") echo "selected"; ?>>(mi)</option>
        </select>
        </div>
        <div class="col col-sm-3 mx-auto">
        <label for="toUnit">เป็น: </label>
        <select class="form-control" name="toUnit" id="toUnit">
            <option value="มิลลิเมตร(mm)" <?php if($toUnit === "มิลลิเมตร(mm)") echo "selected"; ?>>(mm)</option>
            <option value="เซนติเมตร(cm)" <?php if($toUnit === "เซนติเมตร(cm)") echo "selected"; ?>>(cm)</option>
            <option value="เมตร(m)" <?php if($toUnit === "เมตร(m)") echo "selected"; ?>>(m)</option>
            <option value="กิโลเมตร(km)" <?php if($toUnit === "กิโลเมตร(km)") echo "selected"; ?>>(km)</option>
            <option value="นิ้ว(in)" <?php if($toUnit === "นิ้ว(in)") echo "selected"; ?>>(in)</option>
            <option value="ฟุต(ft)" <?php if($toUnit === "ฟุต(ft)") echo "selected"; ?>>(ft)</option>
            <option value="หลา(yd)" <?php if($toUnit === "หลา(yd)") echo "selected"; ?>>(yd)</option>
            <option value="ไมล์(mi)" <?php if($toUnit === "ไมล์(mi)") echo "selected"; ?>>(mi)</option>
        </select>
        </div>
        <br>
        <button type="submit" name="signup" class="btn btn-success">เเปลง</button>
        <button type="submit" name="swap" class="btn btn-warning">สลับหน่วย</button>
    </form>
    <?php

    if (empty($input)) {
        echo "<p>กรุณากรอกค่าเพื่อทำการแปลงหน่วย</p>";
    } else {
        $result = convertToImperial($input, $fromUnit, $toUnit);

        if ($result !== null) {
            echo "<br><h4>ผลลัพธ์</h4><p>{$input} {$fromUnit} = {$result} {$toUnit}</p>";
        } else {
            echo "<p>ไม่สามารถแปลงหน่วยได้</p>";
        }
    }

?>
</div>
</body>
</html>