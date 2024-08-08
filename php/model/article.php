<?php 

class Article extends Category{
    public $connection;
    public function __construct(){
        $config = new Config();
        $this->connection = $config->getConnection();
    }

    public function addarticle($category, $topic, $abstract, $author, $file){
        $fileExtension = strtolower( pathinfo($file['name'], PATHINFO_EXTENSION));
        if (empty($abstract)) {
            $_SESSION['article_error'] = "Abstract required";
            echo "<script>window.history.back();</script>";
        }elseif(strlen($abstract)> 500) {
            $_SESSION['article_error'] = "Abstract length exceed 500 characters";
            echo "<script>window.history.back();</script>";
        }elseif (empty($topic)) {
            $_SESSION['article_error'] = "Please input a topic";
            echo "<script>window.history.back();</script>";
        }elseif (empty($category)) {
            $_SESSION['article_error'] = "Please select a category";
            echo "<script>window.history.back();</script>";
        }elseif (empty($author)) {
            $_SESSION['article_error'] = "Please input a topic";
            echo "<script>window.history.back();</script>";
        }elseif ($file['size'] > (5000000)) {
            $_SESSION['article_error'] = "Please input a topic";
            echo "<script>window.history.back();</script>";
        }elseif ($fileExtension != 'pdf' && $fileExtension != 'docx') {
            $_SESSION['article_error'] = "file format not accepted";
            echo "<script>window.history.back();</script>";
        }else{
            $sql = "INSERT INTO `article`(`abstract`, `articleTopic`, `category`, `author`, `fileName`) VALUES ('$abstract','$topic','$category','$author','".$file['name']."')";
            $addarticle = $this->connection->query($sql);
            var_dump($addarticle);
            if ($addarticle == TRUE) {
                move_uploaded_file($file['tmp_name'], '../view/admin/files/'.$file['name']);
                header('location: http://localhost/repository/php/view/admin/');
            }else{
                $_SESSION['article_error'] = "error occurred. Try again";
                echo "<script>window.history.back();</script>";
            }

        }
        
    }
    public function showarticlesontable(){
        $sql = "SELECT * FROM `article` ORDER BY id DESC LIMIT 10";
        $showarticle = $this->connection->query($sql);
        if ($showarticle->num_rows > 0) {
            foreach ($showarticle as $value) {
                $i = 1;
                echo '<tr>
                        <td>'.$i++.'</td>
                        <td>'.$value['articleTopic'].'</td>
                        <td>'.$value['category'].'</td>
                        <td>'.$value['author'].'</td>
                        <td>'.$value['fileName'].'</td>
                    </tr>';
            }
            
            
             
        }

    }
    public function showarticleontable($id){
        $categoryName = $this->categoryname($id);
        $sql = "SELECT * FROM `article` WHERE category = '$categoryName'";
        $showcategory = $this->connection->query($sql);
        if ($showcategory->num_rows > 0) {
            $i = 1;
            foreach ($showcategory as $value) {
                echo '<tr>
                        <td>'.$i++.'</td>
                        <td>'.$value["category"].'</td>
                        <td>'.$value["articleTopic"].'</td>
                        <td>'.$value["author"].'</td>
                        <td><a class="btn btn-sm btn-primary" href="http://localhost/repository/php/controller/downloadfile.php?id='.$value["id"].'&&Cid='.$id.'">Download</a></td>
                        <td><a class="btn btn-sm btn-primary" href="http://localhost/repository/php/view/admin/viewarticle.php?id='.$value["id"].'&&Cid='.$id.'">Edit</a></td>
                        <td><a class="btn btn-sm btn-primary" href="http://localhost/repository/php/controller/deletearticle.php?id='.$value["id"].'&&Cid='.$id.'">Delete</a></td>
                    </tr>';
            }
            
            
             
        }

    }
    public function deletearticle($id, $categoryId){
        $sql = "DELETE FROM `article` WHERE id ='$id'";
        $deletearticle = $this->connection->query($sql);
        if ($deletearticle == TRUE) {
            header('location: http://localhost/repository/php/view/admin/managecategory.php?id='.$categoryId.'');
        }
    }

    public function downloadfile($id, $categoryId){
        $sql = "SELECT * FROM `article` WHERE id = '$id'";
        $showfilename = $this->connection->query($sql);
        if ($showfilename->num_rows > 0) {
            $filename = $showfilename->fetch_assoc();
            $downloadDir = '../view/admin/files/';
            $filename = basename($filename['fileName']);
            $filepath = $downloadDir . $filename;
            if (file_exists($filepath) && strpos(realpath($filepath), realpath($downloadDir)) === 0) {
                // Set headers to force download
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . $filename);
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filepath));
        
                // Clear output buffer to avoid issues with large files
                ob_clean();
                flush();
        
                // Read the file and send it to the output buffer
                readfile($filepath);
                header('location: http://localhost/repository/php/view/admin/managecategory.php?id='.$id.'');
            }else{
                $_SESSION['download_error'] = 'An error occurred during download';
                echo "<script>window.history.back();</script>";
            }   
        }
        
    }
    public function viewarticle($id, $categoryId){
        $sql = "SELECT * FROM `article` WHERE id = '$id'";
        $showarticle = $this->connection->query($sql);
        if ($showarticle->num_rows > 0) {
            $articledetails = $showarticle->fetch_assoc();
            echo '<form action="http://localhost/repository/php/controller/editarticle.php?id='.$id.'&&Cid='.$categoryId.'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Abstract</label>
                <textarea name="abstract" id="abstract" class="form-control" rows="7" oninput="countCharacters()">'.$articledetails['abstract'].'</textarea>
                <p>Word: <small id="small" class="form-label">0</small>/<small id="smallmax" class="form-label">500</small></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Topic</label>
                <input type="text" class="form-control" name="topic"
                    placeholder="Enter topic" value="'.$articledetails['articleTopic'].'">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Authors</label>
                <input type="text" class="form-control" name="author"
                    placeholder="Example: John, A. C., Mike A. C. and James B. O." value="'.$articledetails['author'].'">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>';
              
        }
        
    }
    public function editarticle($id, $categoryId, $topic, $abstract, $author){
        $sql = "UPDATE `article` SET `abstract`='$abstract',`articleTopic`='$topic',`author`='$author' WHERE id = '$id'";
        $showarticle = $this->connection->query($sql);
        if ($showarticle == true) {
            header('location: http://localhost/repository/php/view/admin/viewarticle.php?id='.$id.'&&Cid='.$categoryId.'');
              
        }
        
    }
    public function userdownloadfile($id){
        $sql = "SELECT * FROM `article` WHERE id = '$id'";
        $showfilename = $this->connection->query($sql);
        if ($showfilename->num_rows > 0) {
            $filename = $showfilename->fetch_assoc();
            $downloadDir = '../view/admin/files/';
            $filename = basename($filename['fileName']);
            $filepath = $downloadDir . $filename;
            if (file_exists($filepath) && strpos(realpath($filepath), realpath($downloadDir)) === 0) {
                // Set headers to force download
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . $filename);
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filepath));
        
                // Clear output buffer to avoid issues with large files
                ob_clean();
                flush();
        
                // Read the file and send it to the output buffer
                readfile($filepath);
                header('location: http://localhost/repository/overview.php?id='.$id.'');
            }else{
                $_SESSION['download_error'] = 'An error occurred during download';
                echo "<script>window.history.back();</script>";
            }   
        }
        
    }
    
}