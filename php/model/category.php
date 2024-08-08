<?php 

class Category{
    public $connection;
    public function __construct(){
        $config = new Config();
        $this->connection = $config->getConnection();
    }

    public function addcategory($category){
        $category = strtolower(trim($category));
        $sql = "INSERT INTO `category`(`category`) VALUES ('$category')";
        $addcategory = $this->connection->query($sql);
        if ($addcategory == TRUE) {
            header('location: http://localhost/repository/php/view/admin/addcategory.php');
        }
    }

    public function showcategory(){
        $sql = "SELECT * FROM `category`";
        $showcategory = $this->connection->query($sql);
        if ($showcategory->num_rows > 0) {
            
            $i = 1;
            foreach ($showcategory as $value) {
                echo '<tr>
                        <td class="text-center">'.$i++.'</td>
                        <td class="text-uppercase text-center">'.$value['category'].'</td>
                        <td class="text-danger text-center"><a href="http://localhost/repository/php/view/admin/managecategory.php?id='.$value['id'].'">View</a></td>
                        <td class="text-danger text-center"><a href="http://localhost/repository/php/controller/deletecategory.php?id='.$value['id'].'">Delete</a></td>
                    </tr>';
            }
            
            
             
        }

    }
    public function showcategoryonselect(){
        $sql = "SELECT * FROM `category`";
        $showcategory = $this->connection->query($sql);
        if ($showcategory->num_rows > 0) {
            foreach ($showcategory as $value) {
                echo '<option value="'.$value["category"].'">'.$value["category"].'</option>';
            }
            
            
             
        }

    }
    public function categoryname($id){
        $sql = "SELECT * FROM `category` WHERE id = '$id'";
        $getcategory = $this->connection->query($sql);
        if ($getcategory->num_rows > 0) {
           $category = $getcategory->fetch_assoc();
           return $category['category'];   
        }

    }
    
    public function deletecategory($id){
        $sql = "DELETE FROM `category` WHERE id ='$id'";
        $deletecategory = $this->connection->query($sql);
        if ($deletecategory == TRUE) {
            header('location: http://localhost/repository/php/view/admin/addcategory.php');
        }

    }
    public function allcategory(){
        $sql = "SELECT * FROM `category`";
        $showcategory = $this->connection->query($sql);
        if ($showcategory->num_rows > 0) {
            
            $i = 1;
            foreach ($showcategory as $value) {
                echo '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative">
                  <div>
                    <h3 class="text-uppercase">'.$value['category'].'</h3>
                    <a href="categorylist.php?category='.$value['category'].'" class="read-more stretched-link">View <i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>';    
            }
        }
    }
    public function countallcategory(){
        $sql = "SELECT * FROM `category`";
        $showcategory = $this->connection->query($sql);
        if ($showcategory->num_rows > 0) {
            $counts = $showcategory->num_rows;
            return $counts;
        }
    }
    public function allcategoryunderlist($category){
        $sql = "SELECT * FROM `article` WHERE category = '$category'";
        $showcategory = $this->connection->query($sql);
        if ($showcategory->num_rows > 0) {
            
            $i = 1;
            foreach ($showcategory as $value) {
                echo '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative">
                  <div>
                    <h3 class="text-uppercase">'.$value['articleTopic'].'</h3>
                    <a href="overview.php?id='.$value['id'].'" class="read-more stretched-link">View </a>
                  </div>
                </div>
              </div>';    
               }   
        }
    }
    public function searchcategoryunderlist($word){
        $sql = "SELECT * FROM `article` WHERE `articleTopic` LIKE '%$word%'";
        $showcategory = $this->connection->query($sql);
        if ($showcategory->num_rows > 0) {
            
            $i = 1;
            foreach ($showcategory as $value) {
                echo '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative">
                  <div>
                    <h3 class="text-uppercase">'.$value['articleTopic'].'</h3>
                    <a href="overview.php?id='.$value['id'].'" class="read-more stretched-link">View </a>
                  </div>
                </div>
              </div>';    
               }   
        }else{
            echo 'no result';
        }
    }
    public function viewarticles($id){
        $sql = "SELECT * FROM `article` WHERE id = '$id'";
        $showcategory = $this->connection->query($sql);
        if ($showcategory->num_rows > 0) {
            
            $i = 1;
            foreach ($showcategory as $value) {
                echo '<div class="col-lg-8 offset-lg-2" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative">
                  <div>
                    <h3 class="text-uppercase">'.$value['articleTopic'].'</h3>
                    <h3 class="">'.$value['author'].'</h3>
                    <p class="">'.$value['abstract'].'</p>
                    <a class="btn btn-sm btn-primary" href="http://localhost/repository/php/controller/userdownloadfile.php?id='.$value["id"].'">Download</a>
                  </div>
                </div>
              </div>';    
               }   
        }
    }
}