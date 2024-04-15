<?php
    include"database.php";
?>
<?php
    class user_admin{
        private $db;

        public function delete_account($id){
            $query = "DELETE FROM user_form WHERE id = '$id'";
            $result = $this->db->update($query);
            header('Location:user-admin_list.php');
            return $result;
        }
        public function show_account() {
            // Đảm bảo $this->db không phải là null
            if ($this->db !== null) {
                $result = $this->db->select("SELECT * FROM user_form");
                return $result; // Trả về kết quả của truy vấn
            } else {
                echo "Database connection is null!";
                return null;
            }
        }
        public function get_account($id){
            $query = "SELECT * FROM user_form WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        // public function update_account($cartegory_name, $cartegory_id){
        //     $query = "UPDATE user_form SET cartegory_name = '$cartegory_name' WHERE cartegory_id = '$cartegory_id' ";
        //     $result = $this->db->update($query);
        //     header('Location:cartegory_list.php');
        //     return $result;
        // }
}