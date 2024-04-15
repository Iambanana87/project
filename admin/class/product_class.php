<?php
    include"database.php";
?>

<?php
    class product{
        private $db;

        public function __construct(){
            $this->db = new Database();   
        }
        // public function show_cartegory(){
        //     $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
        //     $result = $this -> db -> select($query);
        //     return $result;
        // }
        public function insert_product($postData, $fileData) {
            $product_name = $postData['product_name'];
            $cartegory_id = $postData['cartegory_id'];
            $product_price = $postData['product_price'];
            $product_price_new = $postData['product_price_new'];
            $product_desc = $postData['product_desc'];
            $product_img = $fileData['product_img']['name'];
            move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
        
            $query = "INSERT INTO tbl_product (
                product_name,
                cartegory_id,
                product_price,
                product_price_new,
                product_desc,
                product_img
            ) VALUES (
                '$product_name',
                '$cartegory_id',
                '$product_price',
                '$product_price_new',
                '$product_desc',
                '$product_img'
            )";

            $result = $this->db->insert($query);
            if($result){
                $query = "SELECT* FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                $result = $this -> db -> select($query) ->fetch_assoc();
                $product_id = $result['product_id'];
                $product_price = $result['product_price'];
                $filename = $_FILES['product_img_desc']['name'];
                $filetmp = $_FILES['product_img_desc']['tmp_name'];

                foreach ($filename as $key => $value){
                    move_uploaded_file($filetmp [$key],"uploads/".$value);
                    $query = "INSERT INTO tbl_product_img_desc (product_id,product_img_desc) VALUES ('$product_id','$value')";
                    $result = $this ->db ->insert($query);
                }
            }
        
            return $result;
        }
        
        public function show_cartegory(){
            $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_product(){
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_product_by_id($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = $product_id ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_product_img_desc($product_id){
            $query = "SELECT * FROM tbl_product_img_desc WHERE product_id = $product_id ";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_details($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this->db->select($query);
            return $result->fetch_assoc();
        }

        public function update_product($postData) {
            $product_id = $postData['product_id'];
            $product_name = $postData['product_name'];
            $cartegory_id = $postData['cartegory_id'];
            $product_price = $postData['product_price'];
            $product_price_new = $postData['product_price_new'];
            $product_desc = $postData['product_desc'];
        
            // Kiểm tra xem người dùng đã chọn ảnh mới hay chưa
            if ($_FILES['product_img']['name'] != '') {
                $product_img = $_FILES['product_img']['name'];
                move_uploaded_file($_FILES['product_img']['tmp_name'], "uploads/" . $product_img);
            } else {
                // Nếu không có ảnh mới, giữ nguyên ảnh cũ
                $product_img = $this->get_product_details($product_id)['product_img'];
            }
        
            $query = "UPDATE tbl_product SET
                        product_name = '$product_name',
                        cartegory_id = '$cartegory_id',
                        product_price = '$product_price',
                        product_price_new = '$product_price_new',
                        product_desc = '$product_desc',
                        product_img = '$product_img'
                    WHERE product_id = '$product_id'";
        
            $result = $this->db->update($query);
        
            if ($result) {
                // Xóa ảnh mô tả cũ
               // $this->delete_old_product_images($product_id);
        
                // Lưu ảnh mô tả mới
                $filename = $_FILES['product_img_desc']['name'];
                $filetmp = $_FILES['product_img_desc']['tmp_name'];
        
                foreach ($filename as $key => $value) {
                    move_uploaded_file($filetmp[$key], "uploads/" . $value);
                    $query = "INSERT INTO tbl_product_img_desc (product_id, product_img_desc) VALUES ('$product_id', '$value')";
                    $this->db->insert($query);
                }
            }
        
            return $result;
        }
        
        // Hàm để xóa ảnh mô tả cũ
        private function delete_old_product_images($product_id) {
            $old_images_query = "SELECT product_img_desc FROM tbl_product_img_desc WHERE product_id = '$product_id'";
            $old_images_result = $this->db->select($old_images_query);

            while ($old_image = $old_images_result->fetch_assoc()) {
                $old_image_path = "uploads/" . $old_image['product_img_desc'];
                if (file_exists($old_image_path) && !is_dir($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            // Kiểm tra xem thư mục có tồn tại không trước khi xóa
            $uploads_directory = "uploads/";
            if (is_dir($uploads_directory)) {
                // Xóa thư mục nếu nó không rỗng
                $files = glob($uploads_directory . '*');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
            }

            $delete_old_images_query = "DELETE FROM tbl_product_img_desc WHERE product_id = '$product_id'";
            $this->db->delete($delete_old_images_query);
        }


        public function delete_product($product_id){
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this->db->delete($query);
            return $result;
        }
    }