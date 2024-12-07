<?php 
session_start();
    class Database{
        protected $link, $result, $rownum;
        // method / function
        public function __construct() {
         $this->link = mysqli_connect('localhost','root','','refat');
         mysqli_set_charset($this->link,"utf8");
        }
        public function dbQuery($sql){
            $this->result = mysqli_query($this->link, $sql);

            
            if (!$this->result) {
                die("Query failed: " . mysqli_error($this->link));
            }
            return $this->result;
        }
        public function Last_id(){
            return mysqli_insert_id($this->link);
        }
        public function dbNumRows(){
            $this->rownum = mysqli_num_rows($this->result);
            return  $this->rownum;
        }
        public function dbFetchResult($result){
            $rows = array();
            for($i = 1; $i <= $this->dbNumRows(); $i++){
                $rows[$i] = mysqli_fetch_array($this->result);
            }
            return $rows;
        }
        public function dbFetchRecord($result){
            return mysqli_fetch_array($this->result);
        }
         public function get_setting($col){
$sql = "Select * from setting where id = 1";
$rs = $this->dbQuery($sql);
$row = $this->dbFetchRecord($rs);
echo $row[$col];

        }
        public function check($col){
            $sql = "Select * from setting where id = 1";
            $rs = $this->dbQuery($sql);
            $row = $this->dbFetchRecord($rs);
            if($row[$col] != null){
                return 'yes';
            }
            
            
                    }
                    public function get_pages($col){
                        $sql = "Select * from pages where id = 1";
                        $rs = $this->dbQuery($sql);
                        $row = $this->dbFetchRecord($rs);
                        echo $row[$col];
                        
                                }

public function get_price_cu($price){
    echo '<span class="justify-content-center"> '. $this->get_setting('currancy').' '. $price .'</span>';
}
        function doLogin()
{
    $errMessage = "";
    $username = $_POST['txtUserName'];
    $password = $_POST['txtPassword'];
    if($username !="" && $password !="")
    {
        $query = "Select id from users
                where username = '$username' and
                password = '$password'";
        $result = $this->dbQuery($query);
        if($this->dbNumRows($result) > 0 )
        {
           $rows = $this->dbFetchResult($result);
               foreach ($rows as $row) {
                   # code...

           $_SESSION['id'] = $row[0];
           }
           // $session = array('id'=> $row[0], 'name'=>$row[1])
           $_SESSION['name'] = $username; // $row[1]
           header('location:dashboard.php');
        }else
           $errMessage = "الرجاء التأكد من اسم المستخدم وكلمة المرور";
    }else
           $errMessage ="الرجاء ادخال اسم المستخدم وكلمة المرور";

    return $errMessage;
}

   function CheckUser()
   {
       if(!isset($_SESSION['id']))
       {
           header('location:login.php');
       }
   }


    }
?>