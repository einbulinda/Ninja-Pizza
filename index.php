<?php

include('config/db_connect.php');
// query for all Pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// make query and get results
$result = mysqli_query($conn, $sql);

// fetch resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Good practice is to free result from memory and close DB
mysqli_free_result($result);

// Close connection to DB
mysqli_close($conn);
// echo '<pre>';
// print_r($pizzas);
// echo '</pre>';

// explode(',',$pizzas[0]['ingredients']);

?>
<!DOCTYPE html>
<html>
<?php include 'templates/header.php'; ?>

<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
	<div class="row">
		<?php foreach ($pizzas as $pizza) : ?>
			<div class="col s6 m3">
				<div class="card z-depth-0">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
						<ul>
							<?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
								<li><?php echo htmlspecialchars($ing); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="card-action right-align">
						<a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">More Info!</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<?php if (count($pizzas) >= 2) : ?>
			<p class="center">There are 2 or more Pizzas</p>
		<?php else : ?>
			<p class="center">There are less than 2 Pizzas</p>
		<?php endif; ?>
	</div>
</div>



<?php include 'templates/footer.php'; ?>

</html>