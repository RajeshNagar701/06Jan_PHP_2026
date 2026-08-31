<?php
    class model{

        public $conn="";
        function __construct()
        {
           $this->conn=new mysqli('localhost','root','','bakery');
        }

        function select($tbl){
            $sel="select * from $tbl";       //query
            $run=$this->conn->query($sel);   // query run on db
            while($fetch=$run->fetch_object())
            {
                $arr[]=$fetch;
            }
            return $arr;
        }

        // insert function
        // $arr=array("id"=>"1","cate_name"=>"Men","cate_img"=>"flana.jpg")
        function insert($tbl,$arr){
          
            $col_arr=array_keys($arr);  // array("0"=>"id","1"=>"cate_name");
            $col=implode(",",$col_arr); //arr to string/ id,cate_name,cate_image  

            $value_arr=array_values($arr);  // array("0"=>"1","1"=>"Men");
            $value=implode("','",$value_arr); // '1','Men','falana.jpg'

            echo $ins="insert into $tbl ($col) values('$value')";     // query
            $run=$this->conn->query($ins);                       // run
            return $run;
        }
		
		function select_where($tbl,$where){
          
            $col_arr=array_keys($where);
            $value_arr=array_values($where); 
            $i=0;
			$sel="select * from $tbl where 1=1";     // query continue
			foreach($where as $w)
			{
				$sel.=" and $col_arr[$i]='$value_arr[$i]'";
				$i++;
			}
            $run=$this->conn->query($sel);                       // run
            return $run;
        }
		
		function delete_where($tbl,$where){
          
            $col_arr=array_keys($where);
            $value_arr=array_values($where); 
            $i=0;
			$del="delete from $tbl where 1=1";     // query continue
			foreach($where as $w)
			{
				$del.=" and $col_arr[$i]='$value_arr[$i]'";
				$i++;
			}
            $run=$this->conn->query($del);                       // run
            return $run;
        }
		
		// update customer set col1=value1 , col2=value2 ,.. col6=value6 where id=1 and status="unblock";
		function update_where($tbl,$arr,$where){
          
            $col_arr=array_keys($arr);
            $value_arr=array_values($arr); 
            $i=0;
			$upd="update $tbl set";     // query continue
			$count=count($arr);
			foreach($arr as $w)
			{
				if($count==$i+1)
				{
					$upd.=" $col_arr[$i]='$value_arr[$i]'";
				}
				else
				{	
					$upd.=" $col_arr[$i]='$value_arr[$i]',";
					$i++;
				}
			}
			$where_col=array_keys($where);
            $where_val=array_values($where); 
            $j=0;
			$upd.=" where 1=1";     // query continue
			foreach($where as $w)
			{
				$upd.=" and $where_col[$j]='$where_val[$j]'";
				$j++;
			}
            $run=$this->conn->query($upd);                       // run
            return $run;
          
        }

    }
    $obj=new model;
?>