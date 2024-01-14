<?php
if(isset($_POST['simpan'])){
 $user = $_POST['user'];
 $pass = ($_POST['pass']);

 $conn = mysqli_connect('localhost', 'root', '', 'db_penjualan_buku');
  if(mysqli_connect_errno()){
   echo "Koneksi Ke Server Gagal";
   exit();
  }

 $sql="select * from user where username='$user' AND password='$pass'";
    $result=mysqli_query($conn, $sql);
    $num_rows=mysqli_num_rows($result);
    $row=mysqli_fetch_row($result);
    if($num_rows>0){
        session_start();
        $tipe=mysqli_fetch_row(mysqli_query($conn,"select * from user where username='$user' AND password='$pass'"));
		$_SESSION['kosong']=$tipe[0];
        echo "<script>location='index2.php';</script>";
    } else {
        echo "<script>alert('Username atau Password yang anda masukkan salah!');</script>";
        echo "<script>location='index.php';</script>";
    }
}
?>