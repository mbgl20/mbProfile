<?php
	$name = 'YOUR NAME';
	$desc = 'Job-/Hobby-Description';
	$title = 'Profile of ' . $name;
	
	$stats = '
		<div class="stat"><i class="fas fa-code"></i>				5+ years experience</div>
		<div class="stat"><i class="fas fa-project-diagram"></i>	20+ projects</div>
		<div class="stat"><i class="fas fa-graduation-cap"></i>		M.Sc. programmer</div>
	';
	
	$bio = 'This is the Bio of <b>' . $name . '</b>! Here you can write a long text about you, your hobbies and/or other stuff.';
	
	$tags = '
		<span class="tag">TypeScript</span>
		<span class="tag">React</span>
		<span class="tag">Node.js</span>
		<span class="tag">GraphQL</span>
		<span class="tag">Tailwind CSS</span>
		<span class="tag">AWS</span>
	';
	
	$quickLinks = [
		['#anyLink1', 'fas fa-rocket', 'Any Site 1'],
		['#anyLink2', 'fas fa-rocket', 'Any Site 2'],
		['#anyLink3', 'fas fa-rocket', 'Any Site 3'],
		['#anyLink4', 'fas fa-rocket', 'Any Site 4'],
		['#anyLink5', 'fas fa-rocket', 'Any Site 5'],
	];
	
	$ds = [
	//	  LINK							 ICON             	 STYLE					 TITLE			 DESCRIPTION
		['https://mabgl.com/', 			'fas fa-rocket',	'icon-portfolio',		'My Website',	'Check out my latest demonstations, projects and work!'],
		['https://mabgl.com/', 			'fab fa-linkedin',	'icon-linkedin',		'LinkedIn',		'My bussines profile.'],
		['https://mabgl.com/', 			'fab fa-youtube',	'icon-youtube',			'Youtube',		'Weekly videos with tech reviews and tutorials.'],
		['https://mabgl.com/', 			'fab fa-github',	'icon-github',			'GitHub',		'Get all my open-source projects for free download!'],
		['https://mabgl.com/', 			'fab fa-instagram',	'icon-instagram',		'Instagram',	'Here you can see behind the scenes footage.'],
		['https://mabgl.com/', 			'fab fa-tiktok',	'icon-tiktok',			'Tiktok',		'Short Videos with content of me.'],
		['https://mabgl.com/', 			'fab fa-twitter',	'icon-twitter',			'Twitter/X',	'Meme and Posts.'],
		['https://mabgl.com/', 			'fab fa-spotify',	'icon-spotify',			'Spotify',		'My favourite songs and playlists at one spot!'],
		['https://mabgl.com/', 			'fab fa-discord',	'icon-discord',			'Discord',		'Quick contact here!'],
		['mailto:mail@mabgl.com',		'fas fa-phone',		'icon-phone',			'Telefon',		'Call me for personal talking!'],
		['tel:+49123456789', 			'fas fa-envelope',	'icon-email',			'E-Mail',		'Hit me up on e-mail for comfortable chatting!']
	];
	
	$footerLink = [
	//	  LINK					 TITLE
		['#legalInformation',	'Legal Information'],
		['#dataPrivacy',		'Data Privacy'],
		['#contact',			'Contact'],
	];
?>
