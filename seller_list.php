<?php

include('includes/header.php');

$id = $_SESSION['login_seller'];
$db = DB::getInstance()->get_all("select * from seller_table");
?>
	<!-- table -->
	<div class="table-app app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>BUY ANY PRODUCT FROM OUR SCHOOL SELLERS</h3>
			</div>
			<table class="bordered">
				<thead>
					<tr>
						<th>SELLERS UNIT</th>
						<th>Explore</th>
						
					</tr>
				</thead>
				<tbody>
				<?php 
				while($row=$db->fetch()){?>
					<tr>
                        <td><button class="btn btn-primary"><?php echo $row['business_name']; ?></button></td>
						<td><a href="shopping-cart.php?seller=<?php echo $row['id']; ?>"><button class="btn btn-default">Visit</button></a></td>
						
					</tr>
					<?php 
					
					}
					?>
                   
					
				</tbody>
			</table>
		</div>
	</div>
	<!-- end table -->
	
	<!-- footer -->
<?php 
include('includes/footer.php');
?>