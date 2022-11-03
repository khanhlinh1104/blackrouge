<?php
 $n = "";
 if (isset ( $_POST ['n'] )) {
    $n = $_POST ['n'];
}
function isPrimeNumber($n) {
    // so nguyen n < 2 khong phai la so nguyen to
    if ($n < 2) {
        return false;
    }
    // check so nguyen to khi n >= 2
    $squareRoot = sqrt($n);
    for ($i = 2; $i <= $squareRoot; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

echo ("Tất cả các số nguyên tố nhỏ hơn $n là: <br>");
if ($n >= 2) {
    echo "2";
}
for ($i = 3; $i < $n; $i+=2) {
    if (isPrimeNumber($i)) {
        echo (" " . $i);
    }
}
?>
<form action="#" method="post">
 <table>
  <tr>
   <td>Nhập n</td>
   <td><input type="text" name="n" value="<?=$n?>" /></td>
   <td><input type="submit" value="Kết quả"></td>
  </tr>
  </form>
<br>
<?php
// gọi hàm giải phương trình bậc 2
// Sử dụng từ kháo $GLOBALS để đọc các biến toàn cầu và truyền vào hàm
if (is_numeric ( $GLOBALS ['n'] ) ) {
    isPrimeNumber ( $GLOBALS ['n'] );
}
?>