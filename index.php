<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><? $title ?></title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;800&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<link rel="stylesheet" href="/style.css">
</head>
<body>
	<canvas id="particles" class="background-canvas"></canvas>
	
	<div id="themeToggle" class="theme-toggle">
		<i class="fas fa-moon"></i>
		<i class="fas fa-sun"></i>
	</div>
	
	<div class="nebula-container">
		<header class="nebula-header">
			<div class="avatar-container">
				<div class="avatar-glow"></div>
				<div class="avatar">
					<div class="avatar-inner">
						<i class="fas fa-user-astronaut"></i>
					</div>
				</div>
			</div>
			<div class="user-info">
				<h1 class="user-name glitch" data-text="<?= $name ?>"><?= $name ?></h1>
				<div class="user-title"><?= $desc ?></div>
				<div class="user-stats">
					<?= $stats ?>
				</div>
			</div>
		</header>
		
		<section class="bio-section">
			<div class="bio-content">
				<p class="bio-text">
					<?= $bio ?></p>
				<div class="bio-tags">
					<?= $tags ?>
				</div>
			</div>
		</section>
		
		<!--
		<section class="social-bar">
			<div class="social-container">
				<a href="#" class="social-item">
                    <i class="fas fa-rocket"></i>
                    <div class="platform-name">PLTFRM</div>
                </a>
				<a href="#" class="social-item">
                    <i class="fas fa-rocket"></i>
                    <div class="platform-name">PLTFRM</div>
                </a>
				<a href="#" class="social-item">
                    <i class="fas fa-rocket"></i>
                    <div class="platform-name">PLTFRM</div>
                </a>
			</div>
		</section>
		-->
		
		<section class="links-section">
			<div class="links-grid">
				<?php $s = 0; ?>
				<?php while ($s < count($ds)): ?>
					<?php $f = $ds[$s]; $id = $s + 1; ?>
					<a href="<?= $f[0] ?>" class="link-card" data-platform="portfolio">
						<div class="link-icon <?= $f[2] ?>">
							<i class="<?= $f[1] ?>"></i>
						</div>
						<div class="link-content">
							<div class="link-title">
								<i class="fas fa-arrow-right"></i>
								<?= $f[3] ?>
							</div>
							<div class="link-description"><?= $f[4] ?></div>
						</div>
					</a>
					<?php $s++; ?>
				<?php endwhile; ?>
			</div>
		</section>
		
		<footer class="nebula-footer">
			<div class="footer-content">
				<div class="footer-text">
					<a href="https://mabgl.com/"><i class="fas fa-copyright"></i> 2025 MABGL.com</a>
				</div>
				<div class="footer-links">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php $s = 0; ?>
					<?php while ($s < count($ds)): ?>
						<?php $f = $footerLink[$s]; $id = $s + 1; ?>
							<a href="<?= $f[0] ?>" class="footer-link"><?= $f[1] ?></a>
						<?php $s++; ?>
					<?php endwhile; ?>
				</div>
			</div>
		</footer>
	</div>
	
	<div id="audioVisualizer" class="audio-visualizer">
		<div class="visualizer-bars"></div>
	</div>
	
	<script src="/script.js"></script>
</body>
</html>
