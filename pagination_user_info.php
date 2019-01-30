<?php 
    session_start();
        if( isset($_POST['id']) ) $id = $_POST['id'];
        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
        

        $record_per_page = 3;
    
        $page = '';
        $output = '';

        if(isset($_POST["page"])){
            $page = $_POST["page"];
        } else {
            $page = 1;
        }

         $start_from = ($page - 1) * $record_per_page;
         $q = "SELECT reg_br_igr, ime, prezime, votes,pImage  FROM igrac JOIN users_votes using(reg_br_igr) 
         WHERE ID=" . $id .  " AND active =  1 ORDER BY votes LIMIT $start_from, $record_per_page";
         $res = $db->query($q);

        if( $res->num_rows == 0 ) {
        	echo "<h3 style='text-align: center;color: grey'>No results</h3>";
        }else {
        	while($row = $res->fetch_assoc()){
	        	$output .= "<div class='row'>";
		           $output .= "<div class=col-md-6>
		           		<a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."'  style='text-align: center;' height='119px' width='91px'></a>
		           	</div>";
		           $output .= "<div class='col-md-6' style = 'text-decoration-color: aqua '>
		           		<b>Name:</b> " . $row['ime'] . "</br>
		           		<b>Last name:</b> " . $row['prezime'] ."</br>
		           		<b>Votes:</b> " . $row['votes'] . "
		           	</div>";
	           $output .= "</div>";
	           $output .= "<hr width='100%'>";
            } 
            $q = "SELECT reg_br_igr, ime, prezime, votes,pImage  FROM igrac JOIN users_votes using(reg_br_igr) 
                  WHERE ID=" . $id .  " AND active =  1 ORDER BY votes";
            $sql_query = $db->prepare($q);
            $sql_query->execute();
            $page_result = $sql_query->get_result();
            $total_records = mysqli_num_rows($page_result);
            $total_pages = ceil ($total_records/$record_per_page);
            for($i = 1; $i <= $total_pages; $i++) {
                $output .= "<span class = 'pagination_link' style = 'cursor:pointer; padding:6px; border:1px solid #ccc;' id = '".$i."'>".$i."</span>";
    
            }
            echo $output;
        }                                                                           
?>