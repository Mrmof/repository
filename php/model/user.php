<?php 

class User{
    public $connection;

    public function __construct(){
        $config = new Config();
        $this->connection = $config->getConnection();
    }
    public function signup($fullname, $email, $matNo, $category, $password, $cpassword){
        if (strlen($fullname) < 3) {
            $_SESSION['signup_error'] = 'Please input your firstname and lastname';
            echo "<script>window.history.back();</script>";
        }elseif(empty($category)) {
            $_SESSION['signup_error'] = 'Please select a category';
            echo "<script>window.history.back();</script>";
        }elseif($password != $cpassword) {
            $_SESSION['signup_error'] = 'Password mismatch, please check your password';
            echo "<script>window.history.back();</script>";
        }else{
            
            $prepared = "INSERT INTO `user`(`fullname`, `email`, `matNo`, `category`, `password`, `status`) VALUES ('$fullname','$email','$matNo','$category',
            '$password','pending')";
            $sql = $this->connection->query($prepared);
            if($sql == true){
                $_SESSION['signup_success'] = 'Sign up successfully. Sign in to continue';
                header('location: http://localhost/repository/signin.php');
            }else{
                $_SESSION['signup_error'] = 'sign up failed';
                echo "<script>window.history.back();</script>";
            }
        }
    }
    public function signin($identity, $password){
        $prepared = "SELECT * FROM `user` WHERE email = '$identity' || matNo = '$identity'";
        $sql = $this->connection->query($prepared);
        if($sql->num_rows > 0){
            $userdetails = $sql->fetch_assoc();
            
            if ($password == $userdetails['password']) {
                $_SESSION['signin_success'] = 'signed in successfully';
                $_SESSION['userid'] = $userdetails['id'];
                if($userdetails['id'] == 1){
                    header('location: http://localhost/repository/php/view/admin/');
                }else{
                    header('location: http://localhost/repository/php/view/dashboard/');
                }

            }else{
                $_SESSION['signin_error'] = 'wrong login details';
                echo "<script>window.history.back();</script>";
            }
            // header('location: http://localhost/repository/php/view/dashboard');
        }else{
            $_SESSION['signin_error'] = 'this email or Mat No. is no registered';
            echo "<script>window.history.back();</script>";
        }
    }
    public function viewusers(){
        $prepared = "SELECT * FROM `user` WHERE id != 1 ORDER BY id DESC";
        $sql = $this->connection->query($prepared);
        if($sql->num_rows > 0){
            $i = 1;
           foreach ($sql as $value) {
            echo '<tr>
                    <td>'.$i++.'</td>
                    <td>'.$value['fullname'].'</td>
                    <td>'.$value['email'].'</td>
                    <td>'.$value['matNo'].'</td>
                    <td>'.$value['category'].'</td>
                    <td>'.$value['status'].'</td>
                    <td><a class="btn btn-sm btn-primary" href="http://localhost/repository/php/controller/approveuser.php?id='.$value['id'].'">change</a></td>
                </tr>';
           }
        }
    }
    public function getStatus($id){
        $prepared = "SELECT * FROM `user` WHERE id = '$id' ";
        $sql = $this->connection->query($prepared);
        if($sql->num_rows > 0){
           $getId = $sql->fetch_assoc();
           return $getId['status'];
        }
    }
    public function userName($userid){
        $prepared = "SELECT * FROM `user` WHERE id = '$userid' ";
        $sql = $this->connection->query($prepared);
        if($sql->num_rows > 0){
           $getId = $sql->fetch_assoc();
           return $getId['fullname'];
        }
    }
    public function userEmail($userid){
        $prepared = "SELECT * FROM `user` WHERE id = '$userid' ";
        $sql = $this->connection->query($prepared);
        if($sql->num_rows > 0){
           $getId = $sql->fetch_assoc();
           return $getId['email'];
        }
    }
    public function userCategory($userid){
        $prepared = "SELECT * FROM `user` WHERE id = '$userid' ";
        $sql = $this->connection->query($prepared);
        if($sql->num_rows > 0){
           $getId = $sql->fetch_assoc();
           return $getId['category'];
        }
    }
    public function userMatNo($userid){
        $prepared = "SELECT * FROM `user` WHERE id = '$userid' ";
        $sql = $this->connection->query($prepared);
        if($sql->num_rows > 0){
           $getId = $sql->fetch_assoc();
           return $getId['matNo'];
        }
    }
    public function allusers(){
        $prepared = "SELECT * FROM `user` ";
        $sql = $this->connection->query($prepared);
        if($sql->num_rows > 0){
           $getId = $sql->num_rows;
           return $getId;
        }
    }
    public function changestatus($id){
        $status = $this->getStatus($id);
        if ($status == 'pending') {
            $prepared = "UPDATE `user` SET `status`='approved' WHERE id ='$id'";
            $sql = $this->connection->query($prepared);
            if($sql == TRUE){
                header('location: http://localhost/repository/php/view/admin/users.php');
            }
        }else{
            $prepared = "UPDATE `user` SET `status`='pending' WHERE id ='$id'";
            $sql = $this->connection->query($prepared);
            if($sql == TRUE){
                header('location: http://localhost/repository/php/view/admin/users.php');
            }
        }
        
    }

}
// $check = new User();