<?php

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
        <label for="input">กรอกค่า: </label>
        <input type="text" name="input" id="input">
        <label for="fromUnit">จาก: </label>
        <select name="fromUnit" id="fromUnit">
            <option value="มิลลิเมตร(mm)">มิลลิเมตร(mm)</option>
            <option value="เซนติเมตร(cm)">เซนติเมตร(cm)</option>
            <option value="เมตร(m)">เมตร(m)</option>
            <option value="กิโลเมตร(km)">กิโลเมตร(km)</option>
            <option value="นิ้ว(in)">นิ้ว(in)</option>
            <option value="ฟุต(ft)">ฟุต(ft)</option>
            <option value="หลา(yd)">หลา(yd)</option>
            <option value="ไมล์(mi)">ไมล์(mi)</option>
        </select>
        <label for="toUnit">เป็น: </label>
        <select name="toUnit" id="toUnit">
            <option value="มิลลิเมตร(mm)">มิลลิเมตร(mm)</option>
            <option value="เซนติเมตร(cm)">เซนติเมตร(cm)</option>
            <option value="เมตร(m)">เมตร(m)</option>
            <option value="กิโลเมตร(km)">กิโลเมตร(km)</option>
            <option value="นิ้ว(in)">นิ้ว(in)</option>
            <option value="ฟุต(ft)">ฟุต(ft)</option>
            <option value="หลา(yd)">หลา(yd)</option>
            <option value="ไมล์(mi)">ไมล์(mi)</option>
        </select>
        <button type="submit" name="signup" class="btn btn-danger">เเปลง</button>
    </form>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["input"];
    $fromUnit = $_POST["fromUnit"];
    $toUnit = $_POST["toUnit"];

    if (empty($input)) {
        echo "<p>กรุณากรอกค่าเพื่อทำการแปลงหน่วย</p>";
    } else {
        $result = convertToImperial($input, $fromUnit, $toUnit);

        if ($result !== null) {
            echo "<h4>ผลลัพธ์</h4><p>{$input} {$fromUnit} เท่ากับ {$result} {$toUnit}</p>";
        } else {
            echo "<p>ไม่สามารถแปลงหน่วยได้</p>";
        }
    }
}

?>
</div>
</body>
</html>