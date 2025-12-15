const themeToggle = document.getElementById('themeToggle');
const audioVisualizer = document.getElementById('audioVisualizer');
const visualizerBars = document.querySelector('.visualizer-bars');

document.addEventListener('DOMContentLoaded', function() {
	initializeApp();
	createParticles();
	setupAudioVisualizer();
});

function initializeApp() {
	setupThemeToggle();
	setupHoverEffects();
	setupScrollAnimations();
}

function setupThemeToggle() {
	themeToggle.addEventListener('click', function() {
		document.body.classList.toggle('light-mode');
		document.body.style.transition = 'background 0.5s ease';
		const isLightMode = document.body.classList.contains('light-mode');
		localStorage.setItem('theme', isLightMode ? 'light' : 'dark');
	});

	const savedTheme = localStorage.getItem('theme');
	if (savedTheme === 'light') {
		document.body.classList.add('light-mode');
	}
}

function setupHoverEffects() {
	document.querySelectorAll('.link-card').forEach(card => {
		card.addEventListener('mouseenter', function() {
			this.style.transform = 'translateY(-8px) translateZ(10px)';
			createFloatingParticles(this);
		});

		card.addEventListener('mouseleave', function() {
			this.style.transform = '';
		});
	});

	document.querySelectorAll('.social-item').forEach(item => {
		item.addEventListener('mouseenter', function() {
			const shine = document.createElement('div');
			shine.className = 'social-shine';
			shine.style.cssText = `
				position: absolute;
				top: -50%;
				left: -50%;
				width: 200%;
				height: 200%;
				background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
				transform: rotate(30deg);
				pointer-events: none;
				z-index: 3;
			`;
			this.appendChild(shine);

			setTimeout(() => {
				if (shine.parentNode) {
					shine.parentNode.removeChild(shine);
				}
			}, 600);
		});
	});
}

function createFloatingParticles(element) {
	const rect = element.getBoundingClientRect();
	const particlesCount = 5;

	for (let i = 0; i < particlesCount; i++) {
		const particle = document.createElement('div');
		particle.style.cssText = `
			position: fixed;
			width: 6px;
			height: 6px;
			background: linear-gradient(45deg, var(--primary), var(--secondary));
			border-radius: 50%;
			pointer-events: none;
			z-index: 1000;
			left: ${rect.left + Math.random() * rect.width}px;
			top: ${rect.top + Math.random() * rect.height}px;
			animation: float-particle 1.5s ease-out forwards;
		`;

		document.body.appendChild(particle);

		const style = document.createElement('style');
		style.textContent = `
			@keyframes float-particle {
				0% {
					transform: translate(0, 0) scale(1);
					opacity: 1;
				}
				100% {
					transform: translate(${(Math.random() - 0.5) * 100}px, -100px) scale(0);
					opacity: 0;
				}
			}
		`;
		document.head.appendChild(style);

		setTimeout(() => {
			particle.remove();
			style.remove();
		}, 1500);
	}
}

function setupScrollAnimations() {
	const observerOptions = {
		root: null,
		rootMargin: '0px',
		threshold: 0.1
	};

	const observer = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.style.animationPlayState = 'running';
			}
		});
	}, observerOptions);

	document.querySelectorAll('.link-card').forEach(card => {
		card.style.animation = 'fade-in-up 0.6s ease-out forwards';
		card.style.animationPlayState = 'paused';
		observer.observe(card);
	});
}

function createParticles() {
	const canvas = document.getElementById('particles');
	if (!canvas) return;
	const ctx = canvas.getContext('2d');

	function setCanvasSize() {
		canvas.width = window.innerWidth;
		canvas.height = window.innerHeight;
	}

	setCanvasSize();
	window.addEventListener('resize', setCanvasSize);

	class Particle {
		constructor() {
			this.reset();
		}

		reset() {
			this.x = Math.random() * canvas.width;
			this.y = Math.random() * canvas.height;
			this.size = Math.random() * 3 + 1;
			this.speedX = Math.random() * 0.5 - 0.25;
			this.speedY = Math.random() * 0.5 - 0.25;
			this.color = `rgba(139, 92, 246, ${Math.random() * 0.3 + 0.1})`;
			this.originalX = this.x;
			this.originalY = this.y;
		}

		update() {
			this.x += this.speedX;
			this.y += this.speedY;
			this.x += Math.sin(Date.now() * 0.001 + this.originalX * 0.01) * 0.5;
			this.y += Math.cos(Date.now() * 0.001 + this.originalY * 0.01) * 0.5;

			if (this.x < -10 || this.x > canvas.width + 10 ||
				this.y < -10 || this.y > canvas.height + 10) {
				this.reset();
			}
		}

		draw() {
			ctx.fillStyle = this.color;
			ctx.beginPath();
			ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
			ctx.fill();
		}
	}

	const particles = [];
	const particleCount = Math.min(150, Math.floor(window.innerWidth * window.innerHeight / 5000));

	for (let i = 0; i < particleCount; i++) {
		particles.push(new Particle());
	}

	function animate() {
		ctx.fillStyle = 'rgba(10, 15, 34, 0.1)';
		ctx.fillRect(0, 0, canvas.width, canvas.height);

		particles.forEach(particle => {
			particle.update();
			particle.draw();
		});

		requestAnimationFrame(animate);
	}

	animate();
}

function setupAudioVisualizer() {
	for (let i = 0; i < 20; i++) {
		const bar = document.createElement('div');
		bar.className = 'visualizer-bar';
		visualizerBars.appendChild(bar);
	}

	function simulateAudio() {
		const bars = document.querySelectorAll('.visualizer-bar');
		bars.forEach(bar => {
			const height = Math.random() * 100;
			bar.style.height = `${height}%`;
			bar.style.backgroundColor = `hsl(${Math.random() * 60 + 270}, 70%, 60%)`;
		});
	}

	setInterval(simulateAudio, 100);
}

const globalStyle = document.createElement('style');
globalStyle.textContent = `
	@keyframes fade-in-up {
		from {
			opacity: 0;
			transform: translateY(30px) scale(0.95);
		}
		to {
			opacity: 1;
			transform: translateY(0) scale(1);
		}
	}
`;

document.head.appendChild(globalStyle);
