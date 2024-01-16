<?php include 'Views/base/header.php';?>
<table class="table">
	<thead>
		<th>Semester</th>
		<th>paymentdate</th>
		<th>paymenttype</th>
		<th>paymentcount</th>
		<th>rupees</th>
		<th>paymentdate</th>
	</thead>
	<tbody>

		<?php 
			$i=0;
			foreach ($semds as $semd) {
				?>
				<tr>
					<td><?=$semd->semester;?></td>
					<td><?=$semd->paymentdate?></</td>
					<td><?=$semd->paymenttype?></</td>
					<td><?=$semd->paymentcount?></</td>
					<td><?=$semd->rupees?></td>
					<td><?=$semd->paymentdate?></td>
				</tr>
			<?php }
		?>
	</tbody>
</table>
<div class="container">
	<div><a href="/students" class="btn btn-warning">Back</a></div>
</div>



<?php include 'Views/base/footer.php';?>