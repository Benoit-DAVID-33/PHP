<?php
	ini_set('display_errors', 'on');
	require_once "includes/core/globals.php";
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php require "includes/partials/page_head.phtml"; ?>
	</head>
	<body>
		<main>
			<header>
				<?php require "includes/partials/page_header.phtml"; ?>
			</header>
			<nav>
				<?php require_once "includes/partials/navbar.phtml"; ?>
			</nav>
			<section id="content">
				<?php
					require_once('includes/core/database/bdd.php');
				?>

				<article>
					<header>Un nouveau contact a été ajouté</header>
					<section>
						Vous pouvez créer de nouveaux contacts dès maintenant .<br />
						<a href="frm_contact.php?action=add" title="Ajout">C'est ici que ça se passe !</a>
					</section>
					<footer>
						Contacts existants : <?=getContactCount()?>
					</footer>
				</article>
			</section>
			<footer>
				<?php require_once "includes/partials/footer.phtml"; ?>
			</footer>
		</main>
	</body>
</html>