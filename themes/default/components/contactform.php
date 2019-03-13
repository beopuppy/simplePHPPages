
<section class="section is-medium">

  <div class="container">

		<?PHP
		if(isset($_POST['message'])){
			?>

				Your message was sent :-)<br/>
				<?=htmlspecialchars($_POST['message']) ?>

			<?PHP
		}
		?>

		<form method="post">

			<input type="text" name="message" />

			<input type="submit" value="send" />

		</form>

	</div>

</section>
