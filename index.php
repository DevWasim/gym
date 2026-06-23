<?php
$site_name = "القوة | AlQuwwa Elite Fitness";
$tagline_en = "Where Desert Strength Meets Elite Performance";
$tagline_ar = "حيث تلتقي قوة الصحراء بالأداء الرفيع";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($site_name) ?></title>
<meta name="description" content="AlQuwwa Elite Fitness — Saudi Arabia's premier personal training and fitness coaching brand. Elite trainers, world-class results.">

<!-- Fonts: Reem Kufi (Arabic display), Changa (Arabic athletic display), Cairo (Arabic body), Cormorant Garamond (English display), Inter (English body) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Changa:wght@400;500;600;700;800&family=Reem+Kufi:wght@400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<!-- Three.js Import Map -->
<script type="importmap">
{
  "imports": {
    "three": "https://cdn.jsdelivr.net/npm/three@0.184.0/build/three.module.js",
    "three/addons/": "https://cdn.jsdelivr.net/npm/three@0.184.0/examples/jsm/"
  }
}
</script>

<style>
/* ===== DESIGN TOKENS ===== */
:root {
  --gold:         #C6A84B;
  --gold-light:   #E8C96E;
  --gold-pale:    #F5EDD6;
  --black:        #060606;
  --black-soft:   #111111;
  --black-card:   #161210;
  --black-border: #2A2218;
  --sand:         #C4A96A;
  --sand-light:   #E8D8B0;
  --white:        #FDFAF4;
  --white-dim:    rgba(253,250,244,0.65);
  --white-ghost:  rgba(253,250,244,0.12);
  --gold-glow:    rgba(198,168,75,0.18);
  --gold-glow2:   rgba(198,168,75,0.06);

  --ff-display: 'Cormorant Garamond', serif;
  --ff-body:    'Inter', sans-serif;
  --ff-arabic:  'Reem Kufi', sans-serif;
  --ff-arabic-sport: 'Changa', sans-serif;
  --ff-arabic-body: 'Cairo', sans-serif;

  --section-pad: clamp(70px, 8vw, 120px);
  --container:   1280px;
  --radius-sm: 4px;
  --radius-md: 12px;
  --radius-lg: 24px;

  --ease-silk: cubic-bezier(0.25, 0.46, 0.45, 0.94);
  --ease-expo: cubic-bezier(0.16, 1, 0.3, 1);
}

/* ===== RESET & BASE ===== */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body {
  background: var(--black);
  color: var(--white);
  font-family: var(--ff-body);
  font-size: 16px;
  line-height: 1.6;
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}
img { max-width: 100%; display: block; }
a { text-decoration: none; color: inherit; }
ul { list-style: none; }
button { cursor: pointer; border: none; background: none; font-family: inherit; }

/* ===== UTILITY ===== */
.container {
  max-width: var(--container);
  margin: 0 auto;
  padding: 0 clamp(20px, 4vw, 60px);
}
.section-pad { padding: var(--section-pad) 0; }
.gold { color: var(--gold); }
.arabic {
  font-family: var(--ff-arabic);
  direction: rtl;
  letter-spacing: normal !important;
}
.sr-only { position:absolute; width:1px; height:1px; overflow:hidden; clip:rect(0,0,0,0); }

/* ===== ISLAMIC GEOMETRIC SVG ===== */
.geo-pattern {
  position: absolute;
  inset: 0;
  pointer-events: none;
  opacity: 0;
  animation: geo-fade-in 2.4s var(--ease-expo) 0.6s forwards;
}
@keyframes geo-fade-in {
  from { opacity: 0; }
  to   { opacity: 1; }
}

/* ===== SCROLLBAR ===== */
::-webkit-scrollbar { width: 5px; }
::-webkit-scrollbar-track { background: var(--black); }
::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 99px; }

/* ===== THREE.JS CANVAS ===== */
#three-hero-canvas {
  position: absolute;
  inset: 0;
  z-index: 1;
  pointer-events: none;
}
#three-divider-canvas {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
  pointer-events: none;
}

/* ===== HEADER / NAV ===== */
#header {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 100;
  padding: 20px 0;
  transition: background 0.5s var(--ease-silk), padding 0.4s, box-shadow 0.4s;
}
#header.scrolled {
  background: rgba(6,6,6,0.94);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  padding: 14px 0;
  box-shadow: 0 1px 0 var(--black-border);
}
.nav-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}
.logo {
  display: flex;
  flex-direction: column;
  line-height: 1.1;
}
.logo-ar {
  font-family: var(--ff-arabic);
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--gold);
  letter-spacing: normal;
  direction: rtl;
  display: inline-block;
}
.logo-en {
  font-family: var(--ff-display);
  font-size: 0.75rem;
  font-weight: 300;
  color: var(--white-dim);
  letter-spacing: 0.35em;
  text-transform: uppercase;
}
.nav-links {
  display: flex;
  align-items: center;
  gap: clamp(20px, 2.5vw, 40px);
}
.nav-links a {
  font-size: 0.78rem;
  font-weight: 500;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--white-dim);
  position: relative;
  transition: color 0.3s;
}
.nav-links a::after {
  content: '';
  position: absolute;
  bottom: -4px; left: 0;
  width: 0; height: 1px;
  background: var(--gold);
  transition: width 0.35s var(--ease-silk);
}
.nav-links a:hover { color: var(--gold); }
.nav-links a:hover::after { width: 100%; }
.nav-cta {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 24px;
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--black);
  background: var(--gold);
  border-radius: 2px;
  transition: background 0.3s, transform 0.2s;
}
.nav-cta:hover { background: var(--gold-light); transform: translateY(-1px); }
.hamburger {
  display: none;
  flex-direction: column;
  gap: 5px;
  padding: 5px;
  z-index: 101;
}
.hamburger span {
  display: block;
  width: 24px;
  height: 2px;
  background: var(--white);
  transition: transform 0.3s, opacity 0.3s;
}

/* ===== HERO ===== */
#hero {
  position: relative;
  min-height: 100svh;
  display: flex;
  align-items: center;
  overflow: hidden;
}
.hero-bg {
  position: absolute;
  inset: 0;
  z-index: 0;
}
.hero-bg img {
  width: 100%; height: 100%;
  object-fit: cover;
  object-position: center 30%;
  transform: scale(1.04);
  animation: hero-zoom 14s var(--ease-silk) forwards;
}
@keyframes hero-zoom {
  from { transform: scale(1.04); }
  to   { transform: scale(1.00); }
}
.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    135deg,
    rgba(6,6,6,0.88) 0%,
    rgba(6,6,6,0.60) 50%,
    rgba(20,14,4,0.78) 100%
  );
}
.hero-geo {
  position: absolute;
  right: -80px;
  top: 50%;
  transform: translateY(-50%);
  width: min(600px, 55vw);
  opacity: 0.055;
}
.hero-content {
  position: relative;
  z-index: 2;
  padding-top: 120px;
  padding-bottom: 80px;
  max-width: 800px;
}
.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 28px;
  padding: 7px 18px;
  border: 1px solid rgba(198,168,75,0.35);
  border-radius: 999px;
  font-size: 0.68rem;
  font-weight: 600;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--gold);
  backdrop-filter: blur(10px);
  opacity: 0;
  animation: fade-up 0.9s var(--ease-expo) 0.3s forwards;
}
.hero-badge-dot {
  width: 6px; height: 6px;
  border-radius: 50%;
  background: var(--gold);
  animation: pulse-dot 2s infinite;
}
@keyframes pulse-dot {
  0%,100% { opacity: 1; transform: scale(1); }
  50%      { opacity: 0.5; transform: scale(1.4); }
}
.hero-ar {
  font-family: var(--ff-arabic);
  font-size: clamp(1.6rem, 3.5vw, 2.6rem);
  font-weight: 700;
  color: var(--gold-light);
  letter-spacing: normal;
  margin-bottom: 14px;
  direction: rtl;
  opacity: 0;
  animation: fade-up 0.9s var(--ease-expo) 0.5s forwards;
  text-shadow: 0 2px 20px rgba(198,168,75,0.3);
}
.hero-h1 {
  font-family: var(--ff-display);
  font-size: clamp(2.8rem, 7vw, 6.5rem);
  font-weight: 700;
  line-height: 0.96;
  letter-spacing: -0.02em;
  color: var(--white);
  margin-bottom: 12px;
  opacity: 0;
  animation: fade-up 0.9s var(--ease-expo) 0.65s forwards;
}
.hero-h1 em {
  font-style: italic;
  color: var(--gold);
}
.hero-sub {
  font-size: clamp(0.9rem, 1.4vw, 1.1rem);
  font-weight: 300;
  color: var(--white-dim);
  max-width: 480px;
  line-height: 1.7;
  margin-bottom: 44px;
  opacity: 0;
  animation: fade-up 0.9s var(--ease-expo) 0.8s forwards;
}
.hero-actions {
  display: flex;
  align-items: center;
  gap: 20px;
  flex-wrap: wrap;
  opacity: 0;
  animation: fade-up 0.9s var(--ease-expo) 0.95s forwards;
}
.btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 16px 36px;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--black);
  background: var(--gold);
  border-radius: 2px;
  transition: all 0.3s var(--ease-silk);
  position: relative;
  overflow: hidden;
}
.btn-primary::before {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--gold-light);
  transform: translateX(-100%);
  transition: transform 0.4s var(--ease-silk);
}
.btn-primary:hover::before { transform: translateX(0); }
.btn-primary span, .btn-primary svg { position: relative; z-index: 1; }
.btn-outline {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 15px 34px;
  font-size: 0.78rem;
  font-weight: 500;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--white);
  border: 1px solid rgba(253,250,244,0.3);
  border-radius: 2px;
  transition: all 0.3s;
}
.btn-outline:hover {
  border-color: var(--gold);
  color: var(--gold);
}
.hero-scroll-hint {
  position: absolute;
  bottom: 36px; left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  z-index: 2;
  opacity: 0;
  animation: fade-up 1s var(--ease-expo) 1.4s forwards;
}
.hero-scroll-hint span {
  font-size: 0.6rem;
  letter-spacing: 0.25em;
  text-transform: uppercase;
  color: var(--white-dim);
}
.scroll-line {
  width: 1px;
  height: 50px;
  background: linear-gradient(to bottom, var(--gold), transparent);
  animation: scroll-anim 2s ease-in-out infinite;
}
@keyframes scroll-anim {
  0%   { transform: scaleY(0); transform-origin: top; }
  50%  { transform: scaleY(1); transform-origin: top; }
  51%  { transform: scaleY(1); transform-origin: bottom; }
  100% { transform: scaleY(0); transform-origin: bottom; }
}
.hero-stats {
  position: absolute;
  bottom: 0; left: 0; right: 0;
  z-index: 2;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  border-top: 1px solid var(--black-border);
  background: rgba(6,6,6,0.7);
  backdrop-filter: blur(20px);
}
.hero-stat {
  padding: 24px 36px;
  border-right: 1px solid var(--black-border);
  text-align: center;
}
.hero-stat:last-child { border-right: none; }
.hero-stat-num {
  font-family: var(--ff-display);
  font-size: clamp(1.8rem, 3vw, 2.6rem);
  font-weight: 600;
  color: var(--gold);
  line-height: 1;
  margin-bottom: 4px;
}
.hero-stat-lbl {
  font-size: 0.68rem;
  font-weight: 500;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--white-dim);
}

/* ===== ANIMATIONS ===== */
@keyframes fade-up {
  from { opacity: 0; transform: translateY(28px); }
  to   { opacity: 1; transform: translateY(0); }
}
.reveal {
  opacity: 0;
  transform: translateY(36px);
  transition: opacity 0.8s var(--ease-expo), transform 0.8s var(--ease-expo);
}
.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}
.reveal-delay-1 { transition-delay: 0.1s; }
.reveal-delay-2 { transition-delay: 0.2s; }
.reveal-delay-3 { transition-delay: 0.3s; }
.reveal-delay-4 { transition-delay: 0.4s; }

/* ===== SECTION LABEL ===== */
.section-label {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 18px;
}
.section-label::before {
  content: '';
  width: 32px; height: 1px;
  background: var(--gold);
}
.section-label span {
  font-size: 0.65rem;
  font-weight: 600;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--gold);
}
.section-label span.section-label-ar {
  font-family: var(--ff-arabic);
  font-size: 0.95rem !important;
  font-weight: 700;
  color: rgba(198,168,75,0.7);
  margin-right: 8px;
  letter-spacing: normal !important;
  text-transform: none;
  direction: rtl;
  display: inline-block;
}
.section-h2 {
  font-family: var(--ff-display);
  font-size: clamp(2rem, 4.5vw, 3.6rem);
  font-weight: 600;
  line-height: 1.08;
  letter-spacing: -0.01em;
}
.section-h2 em {
  font-style: italic;
  color: var(--gold);
}
.section-desc {
  font-size: 0.95rem;
  font-weight: 300;
  color: var(--white-dim);
  line-height: 1.75;
  max-width: 560px;
}

/* ===== PARTICLE DIVIDER ===== */
.particle-divider {
  position: relative;
  height: 80px;
  overflow: hidden;
  background: transparent;
}
.particle-divider canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
}

/* ===== ABOUT SECTION ===== */
#about {
  background: var(--black-soft);
  position: relative;
  overflow: hidden;
}
#about::before {
  content: '';
  position: absolute;
  top: -200px; right: -200px;
  width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, var(--gold-glow) 0%, transparent 70%);
  pointer-events: none;
}
.about-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: clamp(40px, 6vw, 100px);
  align-items: center;
}
.about-image-wrap {
  position: relative;
}
.about-img-main {
  width: 100%;
  aspect-ratio: 3/4;
  object-fit: cover;
  border-radius: var(--radius-md);
  position: relative;
  z-index: 1;
}
.about-img-accent {
  position: absolute;
  bottom: -28px;
  right: -28px;
  width: 52%;
  aspect-ratio: 1;
  object-fit: cover;
  border-radius: var(--radius-md);
  border: 4px solid var(--black-soft);
  z-index: 2;
}
.about-gold-bar {
  position: absolute;
  top: 28px; left: -14px;
  width: 4px;
  height: 80px;
  background: var(--gold);
  border-radius: 2px;
}
.about-badge-float {
  position: absolute;
  top: -20px; right: 28px;
  background: var(--gold);
  color: var(--black);
  padding: 14px 20px;
  border-radius: var(--radius-sm);
  text-align: center;
  z-index: 3;
}
.about-badge-num {
  font-family: var(--ff-display);
  font-size: 2rem;
  font-weight: 700;
  line-height: 1;
}
.about-badge-txt {
  font-size: 0.6rem;
  font-weight: 600;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  margin-top: 2px;
}
.about-text { padding: 20px 0; }
.about-list {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-top: 36px;
}
.about-list-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  padding: 18px;
  background: var(--black-card);
  border: 1px solid var(--black-border);
  border-radius: var(--radius-sm);
  transition: border-color 0.3s;
}
.about-list-item:hover { border-color: var(--gold); }
.about-list-icon {
  width: 36px; height: 36px;
  min-width: 36px;
  border-radius: 50%;
  background: var(--gold-glow);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--gold);
  font-size: 1rem;
}
.about-list-title {
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  color: var(--white);
  margin-bottom: 3px;
}
.about-list-desc {
  font-size: 0.73rem;
  color: var(--white-dim);
  line-height: 1.5;
}

/* ===== PROGRAMS SECTION ===== */
#programs {
  background: var(--black);
  position: relative;
  overflow: hidden;
}
.programs-header {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 30px;
  margin-bottom: 60px;
  flex-wrap: wrap;
}
.programs-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px;
  background: var(--black-border);
  border-radius: var(--radius-md);
  overflow: hidden;
}
.program-card {
  position: relative;
  background: var(--black-card);
  overflow: hidden;
  cursor: pointer;
  transition: flex 0.5s var(--ease-silk);
}
.program-card-img {
  width: 100%;
  aspect-ratio: 9/14;
  object-fit: cover;
  transition: transform 0.7s var(--ease-silk), filter 0.5s;
  filter: brightness(0.5) saturate(0.7);
}
.program-card:hover .program-card-img {
  transform: scale(1.06);
  filter: brightness(0.65) saturate(0.9);
}
.program-card-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(6,6,6,0.95) 0%, transparent 55%);
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 28px 24px;
}
.program-num {
  font-family: var(--ff-display);
  font-size: 2.8rem;
  font-weight: 300;
  color: var(--gold);
  opacity: 0.25;
  line-height: 1;
  margin-bottom: auto;
  padding-top: 24px;
}
.program-icon {
  width: 40px; height: 40px;
  border-radius: 50%;
  background: var(--gold);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
  font-size: 1.1rem;
  color: var(--black);
  transform: translateY(10px);
  opacity: 0;
  transition: all 0.4s var(--ease-expo) 0.1s;
}
.program-card:hover .program-icon {
  transform: translateY(0);
  opacity: 1;
}
.program-name-ar {
  font-family: var(--ff-arabic-sport);
  font-size: 1rem;
  font-weight: 700;
  color: var(--gold);
  margin-bottom: 4px;
  direction: rtl;
  display: block;
  letter-spacing: normal;
}
.program-name {
  font-family: var(--ff-display);
  font-size: 1.4rem;
  font-weight: 600;
  color: var(--white);
  margin-bottom: 8px;
  line-height: 1.15;
}
.program-desc {
  font-size: 0.78rem;
  color: var(--white-dim);
  line-height: 1.55;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.4s var(--ease-expo);
}
.program-card:hover .program-desc {
  max-height: 100px;
}
.program-tag {
  display: inline-block;
  margin-top: 14px;
  padding: 5px 12px;
  font-size: 0.62rem;
  font-weight: 600;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--gold);
  border: 1px solid rgba(198,168,75,0.35);
  border-radius: 999px;
}

/* ===== TRAINERS SECTION ===== */
#trainers {
  background: var(--black-soft);
  position: relative;
}
.trainers-intro {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  margin-bottom: 64px;
  align-items: center;
}
.trainers-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.trainer-card {
  background: var(--black-card);
  border: 1px solid var(--black-border);
  border-radius: var(--radius-md);
  overflow: hidden;
  transition: border-color 0.3s, transform 0.4s var(--ease-silk);
}
.trainer-card:hover {
  border-color: var(--gold);
  transform: translateY(-6px);
}
.trainer-img-wrap {
  position: relative;
  overflow: hidden;
}
.trainer-img {
  width: 100%;
  aspect-ratio: 3/4;
  object-fit: cover;
  object-position: top center;
  transition: transform 0.7s var(--ease-silk);
  filter: grayscale(15%);
}
.trainer-card:hover .trainer-img {
  transform: scale(1.04);
}
.trainer-specialty {
  position: absolute;
  bottom: 14px; left: 14px;
  padding: 5px 12px;
  font-size: 0.62rem;
  font-weight: 600;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--black);
  background: var(--gold);
  border-radius: 999px;
}
.trainer-social {
  position: absolute;
  top: 14px; right: 14px;
  display: flex;
  flex-direction: column;
  gap: 8px;
  transform: translateX(60px);
  transition: transform 0.4s var(--ease-expo);
}
.trainer-card:hover .trainer-social {
  transform: translateX(0);
}
.trainer-social a {
  width: 34px; height: 34px;
  border-radius: 50%;
  background: rgba(6,6,6,0.7);
  backdrop-filter: blur(8px);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.9rem;
  transition: background 0.3s;
}
.trainer-social a:hover { background: var(--gold); }
.trainer-info { padding: 22px; }
.trainer-name {
  font-family: var(--ff-display);
  font-size: 1.3rem;
  font-weight: 600;
  margin-bottom: 2px;
}
.trainer-name-ar {
  font-family: var(--ff-arabic-sport);
  font-size: 1rem;
  font-weight: 700;
  color: var(--gold);
  direction: rtl;
  display: block;
  margin-bottom: 8px;
  letter-spacing: normal;
}
.trainer-role {
  font-size: 0.72rem;
  font-weight: 500;
  color: var(--white-dim);
  letter-spacing: 0.1em;
  text-transform: uppercase;
  margin-bottom: 16px;
}
.trainer-stats {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 10px;
  padding-top: 16px;
  border-top: 1px solid var(--black-border);
}
.trainer-stat-val {
  font-family: var(--ff-display);
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--gold);
}
.trainer-stat-key {
  font-size: 0.6rem;
  color: var(--white-dim);
  letter-spacing: 0.1em;
  text-transform: uppercase;
}

/* ===== GALLERY ===== */
#gallery {
  background: var(--black);
  padding-top: var(--section-pad);
  padding-bottom: 0;
}
.gallery-header {
  margin-bottom: 40px;
}
.gallery-grid {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: auto;
  gap: 3px;
}
.gallery-item {
  overflow: hidden;
  position: relative;
  cursor: pointer;
}
.gallery-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.7s var(--ease-silk), filter 0.5s;
  filter: brightness(0.8) saturate(0.85);
}
.gallery-item:hover img {
  transform: scale(1.06);
  filter: brightness(0.95) saturate(1.1);
}
.gallery-item-overlay {
  position: absolute;
  inset: 0;
  background: rgba(198,168,75,0.12);
  opacity: 0;
  transition: opacity 0.4s;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.8rem;
}
.gallery-item:hover .gallery-item-overlay { opacity: 1; }
.g1 { grid-column: span 5; grid-row: span 2; height: 420px; }
.g2 { grid-column: span 4; height: 207px; }
.g3 { grid-column: span 3; height: 207px; }
.g4 { grid-column: span 4; height: 207px; }
.g5 { grid-column: span 3; height: 207px; }
.g6 { grid-column: span 4; height: 250px; }
.g7 { grid-column: span 4; height: 250px; }
.g8 { grid-column: span 4; height: 250px; }

/* ===== TESTIMONIALS ===== */
#testimonials {
  background: var(--black-soft);
  position: relative;
  overflow: hidden;
}
#testimonials::before {
  content: '';
  position: absolute;
  bottom: -200px; left: -200px;
  width: 500px; height: 500px;
  border-radius: 50%;
  background: radial-gradient(circle, var(--gold-glow) 0%, transparent 65%);
}
.testi-slider {
  position: relative;
  overflow: hidden;
}
.testi-track {
  display: flex;
  transition: transform 0.6s var(--ease-expo);
}
.testi-slide {
  min-width: 100%;
  padding: 0 clamp(20px, 8vw, 140px);
}
.testi-card {
  max-width: 780px;
  margin: 0 auto;
  text-align: center;
  padding: 60px 50px;
  background: var(--black-card);
  border: 1px solid var(--black-border);
  border-radius: var(--radius-lg);
  position: relative;
}
.testi-quote-mark {
  font-family: var(--ff-display);
  font-size: 7rem;
  font-weight: 700;
  color: var(--gold);
  opacity: 0.12;
  position: absolute;
  top: 0; left: 40px;
  line-height: 1;
}
.testi-stars {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
  margin-bottom: 24px;
  color: var(--gold);
  font-size: 0.9rem;
}
.testi-text {
  font-family: var(--ff-display);
  font-size: clamp(1.1rem, 2.2vw, 1.55rem);
  font-weight: 400;
  font-style: italic;
  color: var(--white);
  line-height: 1.55;
  margin-bottom: 36px;
}
.testi-author {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 16px;
}
.testi-avatar {
  width: 52px; height: 52px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid var(--gold);
}
.testi-author-name {
  font-weight: 600;
  font-size: 0.9rem;
}
.testi-author-title {
  font-size: 0.72rem;
  color: var(--gold);
  letter-spacing: 0.1em;
}
.testi-controls {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  margin-top: 44px;
}
.testi-dot {
  width: 28px; height: 3px;
  border-radius: 999px;
  background: var(--black-border);
  cursor: pointer;
  transition: all 0.3s;
}
.testi-dot.active {
  background: var(--gold);
  width: 44px;
}
.testi-nav {
  width: 44px; height: 44px;
  border-radius: 50%;
  border: 1px solid var(--black-border);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--white-dim);
  font-size: 0.9rem;
  cursor: pointer;
  transition: all 0.3s;
  background: none;
}
.testi-nav:hover {
  border-color: var(--gold);
  color: var(--gold);
}

/* ===== CTA SECTION ===== */
#cta {
  position: relative;
  overflow: hidden;
}
.cta-bg {
  position: absolute;
  inset: 0;
}
.cta-bg img {
  width: 100%; height: 100%;
  object-fit: cover;
  filter: brightness(0.25);
}
.cta-bg::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(6,6,6,0.6) 0%, rgba(20,12,2,0.6) 100%);
}
.cta-content {
  position: relative;
  z-index: 2;
  text-align: center;
  padding: var(--section-pad) 0;
}
.cta-ar {
  font-family: var(--ff-arabic);
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--gold);
  direction: rtl;
  margin-bottom: 14px;
  display: block;
  letter-spacing: normal;
}
.cta-h2 {
  font-family: var(--ff-display);
  font-size: clamp(2.2rem, 5vw, 4.5rem);
  font-weight: 600;
  line-height: 1.08;
  color: var(--white);
  margin-bottom: 18px;
}
.cta-h2 em {
  font-style: italic;
  color: var(--gold);
}
.cta-sub {
  font-size: 1rem;
  color: var(--white-dim);
  max-width: 440px;
  margin: 0 auto 44px;
  line-height: 1.7;
}
.cta-actions {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 18px;
  flex-wrap: wrap;
}
.cta-geo-left, .cta-geo-right {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  opacity: 0.06;
  width: 280px;
}
.cta-geo-left { left: -60px; }
.cta-geo-right { right: -60px; transform: translateY(-50%) scaleX(-1); }

/* ===== CONTACT / LOCATIONS ===== */
#contact {
  background: var(--black-soft);
}
.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1.4fr;
  gap: clamp(40px, 6vw, 90px);
  align-items: start;
}
.contact-info { }
.contact-cities {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-top: 36px;
}
.city-card {
  display: flex;
  align-items: center;
  gap: 18px;
  padding: 20px 22px;
  background: var(--black-card);
  border: 1px solid var(--black-border);
  border-radius: var(--radius-sm);
  transition: border-color 0.3s;
}
.city-card:hover { border-color: var(--gold); }
.city-flag { font-size: 2rem; }
.city-name {
  font-size: 1.05rem;
  font-weight: 600;
}
.city-name-ar {
  font-family: var(--ff-arabic);
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--gold);
  direction: rtl;
  display: block;
  letter-spacing: normal;
}
.city-address {
  font-size: 0.72rem;
  color: var(--white-dim);
  margin-top: 2px;
}
.contact-form-wrap {
  background: var(--black-card);
  border: 1px solid var(--black-border);
  border-radius: var(--radius-md);
  padding: clamp(28px, 4vw, 52px);
}
.form-title {
  font-family: var(--ff-display);
  font-size: 1.6rem;
  font-weight: 600;
  margin-bottom: 6px;
}
.form-sub {
  font-size: 0.8rem;
  color: var(--white-dim);
  margin-bottom: 30px;
}
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
.form-group label {
  font-size: 0.68rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--white-dim);
}
.form-group input,
.form-group select,
.form-group textarea {
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--black-border);
  border-radius: var(--radius-sm);
  padding: 12px 16px;
  font-size: 0.88rem;
  font-family: var(--ff-body);
  color: var(--white);
  outline: none;
  transition: border-color 0.3s, background 0.3s;
  -webkit-appearance: none;
}
.form-group select option { background: var(--black-soft); }
.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  border-color: var(--gold);
  background: rgba(198,168,75,0.05);
}
.form-group textarea { resize: vertical; min-height: 110px; }
.form-submit {
  width: 100%;
  padding: 16px;
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--black);
  background: var(--gold);
  border-radius: var(--radius-sm);
  transition: background 0.3s, transform 0.2s;
  margin-top: 8px;
}
.form-submit:hover {
  background: var(--gold-light);
  transform: translateY(-1px);
}

/* ===== FOOTER ===== */
footer {
  background: var(--black);
  border-top: 1px solid var(--black-border);
  padding: 70px 0 30px;
  position: relative;
  overflow: hidden;
}
footer::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--gold), transparent);
}
.footer-top {
  display: grid;
  grid-template-columns: 1.6fr 1fr 1fr 1fr;
  gap: clamp(30px, 4vw, 60px);
  margin-bottom: 60px;
}
.footer-brand-ar {
  font-family: var(--ff-arabic);
  font-size: 2.4rem;
  font-weight: 700;
  color: var(--gold);
  display: block;
  margin-bottom: 4px;
  letter-spacing: normal;
  direction: rtl;
}
.footer-brand-en {
  font-family: var(--ff-display);
  font-size: 0.75rem;
  font-weight: 300;
  letter-spacing: 0.35em;
  text-transform: uppercase;
  color: var(--white-dim);
  display: block;
  margin-bottom: 18px;
}
.footer-tagline {
  font-size: 0.82rem;
  color: var(--white-dim);
  line-height: 1.7;
  max-width: 280px;
  margin-bottom: 24px;
}
.footer-social {
  display: flex;
  gap: 10px;
}
.footer-social a {
  width: 38px; height: 38px;
  border-radius: 50%;
  border: 1px solid var(--black-border);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.88rem;
  color: var(--white-dim);
  transition: all 0.3s;
}
.footer-social a:hover {
  background: var(--gold);
  border-color: var(--gold);
  color: var(--black);
}
.footer-col-title {
  font-size: 0.68rem;
  font-weight: 600;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--gold);
  margin-bottom: 20px;
}
.footer-links {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.footer-links a {
  font-size: 0.82rem;
  color: var(--white-dim);
  transition: color 0.3s;
}
.footer-links a:hover { color: var(--gold); }
.footer-bottom {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  padding-top: 24px;
  border-top: 1px solid var(--black-border);
  flex-wrap: wrap;
}
.footer-copy {
  font-size: 0.72rem;
  color: var(--white-dim);
}
.footer-copy strong { color: var(--gold); }
.footer-credits {
  font-size: 0.68rem;
  color: rgba(253,250,244,0.3);
}
.footer-geo {
  position: absolute;
  bottom: -80px; right: -80px;
  width: 320px;
  opacity: 0.03;
  pointer-events: none;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1100px) {
  .programs-grid { grid-template-columns: repeat(2, 1fr); }
  .trainers-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 900px) {
  .about-grid, .contact-grid { grid-template-columns: 1fr; }
  .trainers-intro { grid-template-columns: 1fr; }
  .about-img-accent { display: none; }
  .footer-top { grid-template-columns: 1fr 1fr; }
  .programs-grid { grid-template-columns: repeat(2, 1fr); }
  
  /* Compact horizontal statistics row on tablet and phone */
  .hero-stats {
    grid-template-columns: repeat(3, 1fr);
    background: rgba(6, 6, 6, 0.85);
  }
  .hero-stat {
    padding: 16px 12px;
    border-right: 1px solid var(--black-border);
    border-bottom: none;
  }
  .hero-stat:last-child {
    border-right: none;
  }
  .hero-stat-num {
    font-size: clamp(1.2rem, 2.5vw, 1.8rem);
  }
  .hero-stat-lbl {
    font-size: clamp(0.55rem, 1.2vw, 0.65rem);
    letter-spacing: 0.1em;
  }
  
  .g1 { grid-column: span 12; }
  .g2,.g3,.g4,.g5 { grid-column: span 6; }
  .g6,.g7,.g8 { grid-column: span 4; }
}
@media (max-width: 700px) {
  /* Full screen blur mobile navigation overlay */
  .nav-links {
    display: none;
    flex-direction: column;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(6, 6, 6, 0.98);
    padding: 100px 24px 24px;
    gap: 28px;
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    z-index: 100;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.35s ease;
    pointer-events: none;
  }
  .nav-links.open {
    display: flex;
    opacity: 1;
    pointer-events: auto;
  }
  .nav-links a {
    font-size: 1.25rem;
    font-weight: 500;
    letter-spacing: 0.18em;
  }
  .nav-cta { display: none; }
  .hamburger { display: flex; }
  
  /* Horizontal carousels with native inertia swipe snap */
  .programs-grid {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    gap: 16px;
    background: none;
    border-radius: 0;
    padding: 10px 0 20px;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin;
  }
  .program-card {
    flex: 0 0 280px;
    scroll-snap-align: start;
    border-radius: var(--radius-md);
    border: 1px solid var(--black-border);
  }
  .programs-grid::-webkit-scrollbar {
    height: 4px;
  }
  .programs-grid::-webkit-scrollbar-thumb {
    background: var(--gold);
    border-radius: 99px;
  }

  .trainers-grid {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    gap: 16px;
    padding: 10px 0 20px;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin;
  }
  .trainer-card {
    flex: 0 0 280px;
    scroll-snap-align: start;
  }
  .trainers-grid::-webkit-scrollbar {
    height: 4px;
  }
  .trainers-grid::-webkit-scrollbar-thumb {
    background: var(--gold);
    border-radius: 99px;
  }

  /* Font clamp limits for extremely narrow screens */
  .hero-h1 {
    font-size: clamp(2.2rem, 7vw, 6.5rem) !important;
  }
  .hero-ar {
    font-size: clamp(1.3rem, 3.5vw, 2.6rem) !important;
  }

  .form-row { grid-template-columns: 1fr; }
  .about-list { grid-template-columns: 1fr; }
  .footer-top { grid-template-columns: 1fr; }
  .cta-geo-left, .cta-geo-right { display: none; }
  .hero-geo { display: none; }
}
@media (max-width: 500px) {
  .g1,.g2,.g3,.g4,.g5,.g6,.g7,.g8 { grid-column: span 12; height: 220px; }
}
</style>
</head>
<body>

<!-- ===== THREE.JS HERO CANVAS ===== -->
<canvas id="three-hero-canvas"></canvas>

<!-- ===== HEADER ===== -->
<header id="header">
  <div class="container">
    <nav class="nav-inner" role="navigation" aria-label="Main Navigation">
      <a href="#" class="logo" aria-label="AlQuwwa Elite Fitness">
        <span class="logo-ar">القوة</span>
        <span class="logo-en">AlQuwwa Elite Fitness</span>
      </a>
      <ul class="nav-links" role="list">
        <li><a href="#about">About</a></li>
        <li><a href="#programs">Programs</a></li>
        <li><a href="#trainers">Trainers</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <a href="#contact" class="nav-cta">
        <span>Book Free Session</span>
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M1 11L11 1M11 1H4M11 1V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
      </a>
      <button class="hamburger" aria-label="Menu" id="menuToggle">
        <span></span><span></span><span></span>
      </button>
    </nav>
  </div>
</header>

<!-- ===== HERO ===== -->
<section id="hero">
  <div class="hero-bg">
    <img
      src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1920&q=85&fit=crop&crop=center"
      alt="Elite gym interior with professional equipment"
      loading="eager"
    />
    <div class="hero-overlay"></div>
  </div>

  <!-- Islamic Geometric SVG Pattern -->
  <svg class="hero-geo" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <g stroke="#C6A84B" stroke-width="0.5" opacity="0.9">
      <!-- 8-pointed star repeat -->
      <polygon points="200,40 214,80 254,80 224,104 234,144 200,120 166,144 176,104 146,80 186,80" fill="none"/>
      <polygon points="200,40 214,80 254,80 224,104 234,144 200,120 166,144 176,104 146,80 186,80" fill="none" transform="rotate(22.5 200 200) scale(1.6) translate(-75 -75)"/>
      <!-- Outer geometric ring -->
      <circle cx="200" cy="200" r="160" stroke-dasharray="4 8"/>
      <circle cx="200" cy="200" r="130"/>
      <circle cx="200" cy="200" r="80"/>
      <!-- Star lines -->
      <line x1="200" y1="40" x2="200" y2="360"/>
      <line x1="40" y1="200" x2="360" y2="200"/>
      <line x1="87" y1="87" x2="313" y2="313"/>
      <line x1="313" y1="87" x2="87" y2="313"/>
      <!-- Inner octagon -->
      <polygon points="200,70 270,90 330,130 350,200 330,270 270,310 200,330 130,310 70,270 50,200 70,130 130,90" fill="none"/>
      <!-- Decorative circles at points -->
      <circle cx="200" cy="70" r="5"/>
      <circle cx="330" cy="200" r="5"/>
      <circle cx="200" cy="330" r="5"/>
      <circle cx="70" cy="200" r="5"/>
      <circle cx="287" cy="113" r="4"/>
      <circle cx="287" cy="287" r="4"/>
      <circle cx="113" cy="287" r="4"/>
      <circle cx="113" cy="113" r="4"/>
      <!-- Inner star -->
      <polygon points="200,140 213,175 250,175 221,196 232,231 200,210 168,231 179,196 150,175 187,175" fill="none"/>
    </g>
  </svg>

  <div class="container">
    <div class="hero-content">
      <div class="hero-badge">
        <span class="hero-badge-dot"></span>
        Premium Personal Training · Saudi Arabia & UAE
      </div>
      <div class="hero-ar">اكتشف قوتك الحقيقية</div>
      <h1 class="hero-h1">
        Forge Your<br>
        <em>Strongest</em><br>
        Self.
      </h1>
      <p class="hero-sub">
        Elite personal trainers and fitness coaches rooted in the heart of Saudi Arabia — delivering world-class results through discipline, culture, and cutting-edge science.
      </p>
      <div class="hero-actions">
        <a href="#contact" class="btn-primary">
          <span>Start Your Journey</span>
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 13L13 1M13 1H5M13 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        </a>
        <a href="#programs" class="btn-outline">
          Explore Programs
        </a>
      </div>
    </div>
  </div>

  <div class="hero-stats">
    <div class="hero-stat">
      <div class="hero-stat-num">12+</div>
      <div class="hero-stat-lbl">Years in Saudi Sport</div>
    </div>
    <div class="hero-stat">
      <div class="hero-stat-num">3,400+</div>
      <div class="hero-stat-lbl">Athletes Transformed</div>
    </div>
    <div class="hero-stat">
      <div class="hero-stat-num">6</div>
      <div class="hero-stat-lbl">Cities Across KSA & UAE</div>
    </div>
  </div>

  <div class="hero-scroll-hint" aria-hidden="true">
    <span>Scroll</span>
    <div class="scroll-line"></div>
  </div>
</section>


<!-- ===== ABOUT ===== -->
<section id="about" class="section-pad">
  <div class="container">
    <div class="about-grid">
      <div class="about-image-wrap reveal">
        <div class="about-gold-bar"></div>
        <div class="about-badge-float">
          <div class="about-badge-num">#1</div>
          <div class="about-badge-txt">KSA<br>Rated</div>
        </div>
        <img
          class="about-img-main"
          src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&q=85&fit=crop&crop=top"
          alt="Professional fitness trainer in action"
          loading="lazy"
        />
        <img
          class="about-img-accent"
          src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?w=600&q=85&fit=crop"
          alt="Gym weight training equipment"
          loading="lazy"
        />
      </div>

      <div class="about-text">
        <div class="section-label reveal">
          <span>About AlQuwwa</span>
          <span class="section-label-ar">عن القوة</span>
        </div>
        <h2 class="section-h2 reveal reveal-delay-1">
          Born From the<br>
          <em>Spirit of Arabia</em>
        </h2>
        <p class="section-desc reveal reveal-delay-2" style="margin: 22px 0 0;">
          AlQuwwa (القوة — "The Strength") was founded with one mission: to elevate the health and performance of every Saudi and Gulf national who walks through our doors. We blend world-class training methodology with a deep respect for Saudi values, culture, and community.
        </p>
        <p class="section-desc reveal reveal-delay-3" style="margin-top: 14px;">
          From Riyadh's modern skyline to Jeddah's coastal energy and Dubai's ambition — we are where champions are built.
        </p>

        <div class="about-list reveal reveal-delay-4">
          <div class="about-list-item">
            <div class="about-list-icon">🏆</div>
            <div>
              <div class="about-list-title">Certified Elite Coaches</div>
              <div class="about-list-desc">NASM, ISSA & ACE certified trainers with international experience</div>
            </div>
          </div>
          <div class="about-list-item">
            <div class="about-list-icon">🕌</div>
            <div>
              <div class="about-list-title">Culturally Conscious</div>
              <div class="about-list-desc">Schedules respect prayer times, Ramadan, and Saudi traditions</div>
            </div>
          </div>
          <div class="about-list-item">
            <div class="about-list-icon">📊</div>
            <div>
              <div class="about-list-title">Data-Driven Results</div>
              <div class="about-list-desc">Body composition tracking, biometrics, and performance analytics</div>
            </div>
          </div>
          <div class="about-list-item">
            <div class="about-list-icon">🌴</div>
            <div>
              <div class="about-list-title">KSA & UAE Coverage</div>
              <div class="about-list-desc">6 locations across Riyadh, Jeddah, Dammam & Dubai</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ===== PROGRAMS ===== -->
<section id="programs" class="section-pad">
  <div class="container">
    <div class="programs-header">
      <div>
        <div class="section-label reveal">
          <span>Training Programs</span>
          <span class="section-label-ar">برامج التدريب</span>
        </div>
        <h2 class="section-h2 reveal reveal-delay-1">
          Programs Built<br>For <em>Champions</em>
        </h2>
      </div>
      <p class="section-desc reveal reveal-delay-2">
        Every program is customised to your body, lifestyle, and goals — structured around your schedule and Saudi cultural context.
      </p>
    </div>

    <div class="programs-grid reveal">
      <!-- Card 1 -->
      <div class="program-card">
        <img
          class="program-card-img"
          src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=600&q=80&fit=crop&crop=center"
          alt="Personal training one-on-one session"
          loading="lazy"
        />
        <div class="program-card-overlay">
          <div class="program-num">01</div>
          <div class="program-icon">💪</div>
          <span class="program-name-ar">التدريب الشخصي</span>
          <div class="program-name">Personal Training</div>
          <p class="program-desc">Dedicated 1-on-1 coaching sessions tailored to your unique physiology, goals, and schedule with full accountability.</p>
          <span class="program-tag">Most Popular</span>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="program-card">
        <img
          class="program-card-img"
          src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=600&q=80&fit=crop&crop=center"
          alt="Group fitness class training"
          loading="lazy"
        />
        <div class="program-card-overlay">
          <div class="program-num">02</div>
          <div class="program-icon">👥</div>
          <span class="program-name-ar">التدريب الجماعي</span>
          <div class="program-name">Group Classes</div>
          <p class="program-desc">High-energy small-group sessions that build community, competition, and camaraderie among KSA fitness enthusiasts.</p>
          <span class="program-tag">Community</span>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="program-card">
        <img
          class="program-card-img"
          src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=600&q=80&fit=crop&crop=center"
          alt="Nutrition coaching and meal planning"
          loading="lazy"
        />
        <div class="program-card-overlay">
          <div class="program-num">03</div>
          <div class="program-icon">🥗</div>
          <span class="program-name-ar">التغذية الصحية</span>
          <div class="program-name">Nutrition Coaching</div>
          <p class="program-desc">Certified nutritionists crafting halal-compliant meal plans that fuel performance and align with Saudi cuisine traditions.</p>
          <span class="program-tag">Halal Certified</span>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="program-card">
        <img
          class="program-card-img"
          src="https://images.unsplash.com/photo-1549476464-37392f717541?w=600&q=80&fit=crop&crop=center"
          alt="Elite athletic performance coaching"
          loading="lazy"
        />
        <div class="program-card-overlay">
          <div class="program-num">04</div>
          <div class="program-icon">⚡</div>
          <span class="program-name-ar">التدريب النخبة</span>
          <div class="program-name">Elite Performance</div>
          <p class="program-desc">Advanced athletic coaching for competitive athletes and executives seeking peak performance and elite body composition.</p>
          <span class="program-tag">Premium</span>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ===== TRAINERS ===== -->
<section id="trainers" class="section-pad">
  <div class="container">
    <div class="trainers-intro">
      <div>
        <div class="section-label reveal">
          <span>Meet the Team</span>
          <span class="section-label-ar">فريقنا</span>
        </div>
        <h2 class="section-h2 reveal reveal-delay-1">
          Your Coaches,<br>
          <em>Your Champions</em>
        </h2>
      </div>
      <div class="reveal reveal-delay-2">
        <p class="section-desc">
          Each AlQuwwa trainer is hand-selected through a rigorous process — certified internationally, culturally fluent, and deeply committed to your results. They are not just coaches; they are partners in your transformation.
        </p>
        <a href="#contact" class="btn-primary" style="margin-top: 24px; display: inline-flex;">
          <span>Train With Us</span>
        </a>
      </div>
    </div>

    <div class="trainers-grid">
      <!-- Trainer 1 -->
      <div class="trainer-card reveal">
        <div class="trainer-img-wrap">
          <img
            class="trainer-img"
            src="https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?w=600&q=80&fit=crop&crop=top"
            alt="Coach Omar Al-Rashidi"
            loading="lazy"
          />
          <span class="trainer-specialty">Strength & Power</span>
          <div class="trainer-social">
            <a href="#" aria-label="Instagram">📸</a>
            <a href="#" aria-label="Snapchat">👻</a>
          </div>
        </div>
        <div class="trainer-info">
          <span class="trainer-name-ar">عمر الراشدي</span>
          <div class="trainer-name">Omar Al-Rashidi</div>
          <div class="trainer-role">Head Strength Coach · NASM Certified</div>
          <div class="trainer-stats">
            <div>
              <div class="trainer-stat-val">9yr</div>
              <div class="trainer-stat-key">Exp.</div>
            </div>
            <div>
              <div class="trainer-stat-val">520+</div>
              <div class="trainer-stat-key">Clients</div>
            </div>
            <div>
              <div class="trainer-stat-val">4.9★</div>
              <div class="trainer-stat-key">Rating</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Trainer 2 -->
      <div class="trainer-card reveal reveal-delay-1">
        <div class="trainer-img-wrap">
          <img
            class="trainer-img"
            src="https://images.unsplash.com/photo-1594381898411-846e7d193883?w=600&q=80&fit=crop&crop=top"
            alt="Coach Sarah Al-Zahrani"
            loading="lazy"
          />
          <span class="trainer-specialty">Women's Fitness</span>
          <div class="trainer-social">
            <a href="#" aria-label="Instagram">📸</a>
            <a href="#" aria-label="TikTok">🎵</a>
          </div>
        </div>
        <div class="trainer-info">
          <span class="trainer-name-ar">سارة الزهراني</span>
          <div class="trainer-name">Sarah Al-Zahrani</div>
          <div class="trainer-role">Women's Specialist · ACE Certified</div>
          <div class="trainer-stats">
            <div>
              <div class="trainer-stat-val">7yr</div>
              <div class="trainer-stat-key">Exp.</div>
            </div>
            <div>
              <div class="trainer-stat-val">380+</div>
              <div class="trainer-stat-key">Clients</div>
            </div>
            <div>
              <div class="trainer-stat-val">5.0★</div>
              <div class="trainer-stat-key">Rating</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Trainer 3 -->
      <div class="trainer-card reveal reveal-delay-2">
        <div class="trainer-img-wrap">
          <img
            class="trainer-img"
            src="https://images.unsplash.com/photo-1567013127542-490d757e51fc?w=600&q=80&fit=crop&crop=top"
            alt="Coach Khalid Al-Ghamdi"
            loading="lazy"
          />
          <span class="trainer-specialty">Athletic Performance</span>
          <div class="trainer-social">
            <a href="#" aria-label="Instagram">📸</a>
            <a href="#" aria-label="YouTube">▶️</a>
          </div>
        </div>
        <div class="trainer-info">
          <span class="trainer-name-ar">خالد الغامدي</span>
          <div class="trainer-name">Khalid Al-Ghamdi</div>
          <div class="trainer-role">Performance Coach · ISSA Certified</div>
          <div class="trainer-stats">
            <div>
              <div class="trainer-stat-val">11yr</div>
              <div class="trainer-stat-key">Exp.</div>
            </div>
            <div>
              <div class="trainer-stat-val">640+</div>
              <div class="trainer-stat-key">Clients</div>
            </div>
            <div>
              <div class="trainer-stat-val">4.9★</div>
              <div class="trainer-stat-key">Rating</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ===== GALLERY ===== -->
<section id="gallery">
  <div class="container">
    <div class="gallery-header">
      <div class="section-label reveal">
        <span>Our World</span>
        <span class="section-label-ar">عالمنا</span>
      </div>
      <h2 class="section-h2 reveal reveal-delay-1">
        Inside <em>AlQuwwa</em>
      </h2>
    </div>
  </div>
  <div class="gallery-grid reveal">
    <div class="gallery-item g1">
      <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=900&q=80&fit=crop" alt="Luxury gym interior" loading="lazy"/>
      <div class="gallery-item-overlay">+</div>
    </div>
    <div class="gallery-item g2">
      <img src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1?w=700&q=80&fit=crop" alt="Trainer coaching client" loading="lazy"/>
      <div class="gallery-item-overlay">+</div>
    </div>
    <div class="gallery-item g3">
      <img src="https://images.unsplash.com/photo-1547919307-1ecb10702e6f?w=600&q=80&fit=crop" alt="Desert athletics training" loading="lazy"/>
      <div class="gallery-item-overlay">+</div>
    </div>
    <div class="gallery-item g4">
      <img src="https://images.unsplash.com/photo-1577221084712-45b0445d2b00?w=700&q=80&fit=crop" alt="Fitness equipment" loading="lazy"/>
      <div class="gallery-item-overlay">+</div>
    </div>
    <div class="gallery-item g5">
      <img src="https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=600&q=80&fit=crop" alt="Sports performance" loading="lazy"/>
      <div class="gallery-item-overlay">+</div>
    </div>
    <div class="gallery-item g6">
      <img src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=800&q=80&fit=crop" alt="Modern gym facility" loading="lazy"/>
      <div class="gallery-item-overlay">+</div>
    </div>
    <div class="gallery-item g7">
      <img src="https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?w=800&q=80&fit=crop" alt="Cardio training" loading="lazy"/>
      <div class="gallery-item-overlay">+</div>
    </div>
    <div class="gallery-item g8">
      <img src="https://images.unsplash.com/photo-1576678927484-cc907957088c?w=800&q=80&fit=crop" alt="Weight training" loading="lazy"/>
      <div class="gallery-item-overlay">+</div>
    </div>
  </div>
</section>


<!-- ===== TESTIMONIALS ===== -->
<section id="testimonials" class="section-pad">
  <div class="container">
    <div style="text-align:center; margin-bottom: 52px;">
      <div class="section-label reveal" style="justify-content:center;">
        <span>Client Stories</span>
        <span class="section-label-ar">قصص عملائنا</span>
      </div>
      <h2 class="section-h2 reveal reveal-delay-1" style="margin-top:14px;">
        Real People, <em>Real Results</em>
      </h2>
    </div>

    <div class="testi-slider reveal">
      <div class="testi-track" id="testiTrack">

        <div class="testi-slide">
          <div class="testi-card">
            <div class="testi-quote-mark">"</div>
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"AlQuwwa completely changed my relationship with fitness. Coach Omar understood my schedule around prayer times and built a program I could actually stick to. In six months, I lost 22kg and gained confidence I didn't know I had."</p>
            <div class="testi-author">
              <img class="testi-avatar" src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?w=100&q=80&fit=crop&crop=face" alt="Abdullah M."/>
              <div>
                <div class="testi-author-name">Abdullah M.</div>
                <div class="testi-author-title">Riyadh · Business Executive</div>
              </div>
            </div>
          </div>
        </div>

        <div class="testi-slide">
          <div class="testi-card">
            <div class="testi-quote-mark">"</div>
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"As a Saudi woman, finding a coach who respected my values while pushing me to be my best was everything. Sarah's women's program is world-class. I competed in my first fitness event after just one year of training here."</p>
            <div class="testi-author">
              <img class="testi-avatar" src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=100&q=80&fit=crop&crop=face" alt="Noura K."/>
              <div>
                <div class="testi-author-name">Noura K.</div>
                <div class="testi-author-title">Jeddah · Fitness Competitor</div>
              </div>
            </div>
          </div>
        </div>

        <div class="testi-slide">
          <div class="testi-card">
            <div class="testi-quote-mark">"</div>
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text">"I've worked with trainers in Dubai, London, and New York. AlQuwwa stands above them all. Khalid's performance methodology is elite — he understood exactly what my body needed to reach the next athletic level. Exceptional quality."</p>
            <div class="testi-author">
              <img class="testi-avatar" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=100&q=80&fit=crop&crop=face" alt="Faisal A."/>
              <div>
                <div class="testi-author-name">Faisal A.</div>
                <div class="testi-author-title">Dubai · Professional Athlete</div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="testi-controls">
        <button class="testi-nav" id="testiPrev" aria-label="Previous">←</button>
        <div class="testi-dot active" data-index="0"></div>
        <div class="testi-dot" data-index="1"></div>
        <div class="testi-dot" data-index="2"></div>
        <button class="testi-nav" id="testiNext" aria-label="Next">→</button>
      </div>
    </div>
  </div>
</section>


<!-- ===== CTA ===== -->
<section id="cta">
  <div class="cta-bg">
    <img
      src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=1920&q=80&fit=crop&crop=center"
      alt="Dubai city skyline at dusk"
      loading="lazy"
    />
  </div>

  <!-- Islamic Geometric left/right -->
  <svg class="cta-geo-left" viewBox="0 0 300 300" fill="none" aria-hidden="true">
    <g stroke="#C6A84B" stroke-width="0.8">
      <circle cx="150" cy="150" r="140"/>
      <circle cx="150" cy="150" r="100"/>
      <circle cx="150" cy="150" r="60"/>
      <polygon points="150,10 190,70 250,70 210,110 230,170 150,130 70,170 90,110 50,70 110,70" fill="none"/>
      <polygon points="150,10 190,70 250,70 210,110 230,170 150,130 70,170 90,110 50,70 110,70" transform="rotate(36 150 150)" fill="none"/>
      <polygon points="150,10 190,70 250,70 210,110 230,170 150,130 70,170 90,110 50,70 110,70" transform="rotate(72 150 150)" fill="none"/>
    </g>
  </svg>
  <svg class="cta-geo-right" viewBox="0 0 300 300" fill="none" aria-hidden="true">
    <g stroke="#C6A84B" stroke-width="0.8">
      <circle cx="150" cy="150" r="140"/>
      <circle cx="150" cy="150" r="100"/>
      <circle cx="150" cy="150" r="60"/>
      <polygon points="150,10 190,70 250,70 210,110 230,170 150,130 70,170 90,110 50,70 110,70" fill="none"/>
      <polygon points="150,10 190,70 250,70 210,110 230,170 150,130 70,170 90,110 50,70 110,70" transform="rotate(36 150 150)" fill="none"/>
    </g>
  </svg>

  <div class="container cta-content reveal">
    <span class="cta-ar">ابدأ رحلتك اليوم</span>
    <h2 class="cta-h2">
      Your First Session<br>
      is <em>On Us</em>
    </h2>
    <p class="cta-sub">
      Book your complimentary 60-minute assessment session. No commitment, no pressure — just results.
    </p>
    <div class="cta-actions">
      <a href="#contact" class="btn-primary" style="font-size:0.82rem; padding: 18px 44px;">
        <span>Book Free Session</span>
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 13L13 1M13 1H5M13 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
      </a>
      <a href="tel:+966112345678" class="btn-outline">
        📞 +966 11 234 5678
      </a>
    </div>
  </div>
</section>


<!-- ===== CONTACT ===== -->
<section id="contact" class="section-pad">
  <div class="container">
    <div class="contact-grid">
      <div>
        <div class="section-label reveal">
          <span>Reach Us</span>
          <span class="section-label-ar">تواصل معنا</span>
        </div>
        <h2 class="section-h2 reveal reveal-delay-1">
          Locations<br>Across the <em>Kingdom</em>
        </h2>
        <p class="section-desc reveal reveal-delay-2" style="margin-top:16px;">
          We operate across six premium locations in Saudi Arabia and the UAE. Walk in, or book online to secure your session.
        </p>

        <div class="contact-cities reveal reveal-delay-3">
          <div class="city-card">
            <div class="city-flag">🇸🇦</div>
            <div>
              <div class="city-name">Riyadh <span class="city-name-ar">الرياض</span></div>
              <div class="city-address">King Fahd Road, Al Olaya District, Riyadh 12211</div>
            </div>
          </div>
          <div class="city-card">
            <div class="city-flag">🇸🇦</div>
            <div>
              <div class="city-name">Jeddah <span class="city-name-ar">جدة</span></div>
              <div class="city-address">Al Andalus Mall Complex, Jeddah 23421</div>
            </div>
          </div>
          <div class="city-card">
            <div class="city-flag">🇸🇦</div>
            <div>
              <div class="city-name">Dammam <span class="city-name-ar">الدمام</span></div>
              <div class="city-address">Prince Mohammed Bin Fahd Road, Dammam 32211</div>
            </div>
          </div>
          <div class="city-card">
            <div class="city-flag">🇦🇪</div>
            <div>
              <div class="city-name">Dubai <span class="city-name-ar">دبي</span></div>
              <div class="city-address">Dubai Marina, Sheikh Zayed Road, Dubai</div>
            </div>
          </div>
        </div>
      </div>

      <div class="contact-form-wrap reveal reveal-delay-2">
        <div class="form-title">Book Your Free Session</div>
        <div class="form-sub">Fill out the form and we'll confirm your slot within 2 hours.</div>
        <form id="bookingForm" onsubmit="handleFormSubmit(event)">
          <div class="form-row">
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" id="firstName" placeholder="Ahmad" required>
            </div>
            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" placeholder="Al-Saud" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" placeholder="ahmad@example.com" required>
          </div>
          <div class="form-group">
            <label for="phone">WhatsApp / Phone</label>
            <input type="tel" id="phone" placeholder="+966 5X XXX XXXX">
          </div>
          <div class="form-group">
            <label for="location">Preferred Location</label>
            <select id="location">
              <option value="">Select a city</option>
              <option>Riyadh — Al Olaya</option>
              <option>Jeddah — Al Andalus</option>
              <option>Dammam — Prince Mohammed Rd</option>
              <option>Dubai Marina</option>
            </select>
          </div>
          <div class="form-group">
            <label for="goal">Your Primary Goal</label>
            <select id="goal">
              <option value="">Select your goal</option>
              <option>Weight Loss & Body Fat</option>
              <option>Muscle Building</option>
              <option>Athletic Performance</option>
              <option>General Health & Wellness</option>
              <option>Post-Injury Rehabilitation</option>
              <option>Women's Fitness</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message">Additional Notes (Optional)</label>
            <textarea id="message" placeholder="Tell us about any injuries, preferences, or questions..."></textarea>
          </div>
          <button type="submit" class="form-submit">
            Confirm My Free Session →
          </button>
        </form>
      </div>
    </div>
  </div>
</section>


<!-- ===== FOOTER ===== -->
<footer>
  <div class="container">
    <div class="footer-top">
      <div>
        <span class="footer-brand-ar">القوة</span>
        <span class="footer-brand-en">AlQuwwa Elite Fitness</span>
        <p class="footer-tagline">
          Saudi Arabia's most trusted personal training and fitness coaching brand — built on heritage, excellence, and results.
        </p>
        <div class="footer-social">
          <a href="#" aria-label="Instagram">📸</a>
          <a href="#" aria-label="Snapchat">👻</a>
          <a href="#" aria-label="TikTok">🎵</a>
          <a href="#" aria-label="Twitter/X">✕</a>
          <a href="#" aria-label="YouTube">▶</a>
        </div>
      </div>

      <div>
        <div class="footer-col-title">Quick Links</div>
        <ul class="footer-links">
          <li><a href="#about">About AlQuwwa</a></li>
          <li><a href="#programs">Training Programs</a></li>
          <li><a href="#trainers">Meet the Coaches</a></li>
          <li><a href="#gallery">Our Facility</a></li>
          <li><a href="#contact">Book a Session</a></li>
        </ul>
      </div>

      <div>
        <div class="footer-col-title">Programs</div>
        <ul class="footer-links">
          <li><a href="#">Personal Training</a></li>
          <li><a href="#">Group Classes</a></li>
          <li><a href="#">Nutrition Coaching</a></li>
          <li><a href="#">Elite Performance</a></li>
          <li><a href="#">Online Coaching</a></li>
          <li><a href="#">Ramadan Program</a></li>
        </ul>
      </div>

      <div>
        <div class="footer-col-title">Contact</div>
        <ul class="footer-links">
          <li><a href="tel:+966112345678">+966 11 234 5678</a></li>
          <li><a href="mailto:info@alquwwa.sa">info@alquwwa.sa</a></li>
          <li><a href="#">WhatsApp Us</a></li>
          <li style="margin-top:14px; color: rgba(198,168,75,0.6); font-size:0.7rem;">
            Sat–Thu: 5:30am – 11pm<br>
            Fri: 2pm – 11pm
          </li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p class="footer-copy">
        © <?= date('Y') ?> <strong>AlQuwwa Elite Fitness</strong> · All Rights Reserved · المملكة العربية السعودية
      </p>
      <p class="footer-credits">Images courtesy of Unsplash · Built with passion in KSA</p>
    </div>
  </div>

  <!-- Decorative Islamic geometric -->
  <svg class="footer-geo" viewBox="0 0 400 400" fill="none" aria-hidden="true">
    <g stroke="#C6A84B" stroke-width="0.6">
      <circle cx="200" cy="200" r="190"/>
      <circle cx="200" cy="200" r="150"/>
      <circle cx="200" cy="200" r="100"/>
      <polygon points="200,10 240,90 320,90 260,140 280,220 200,170 120,220 140,140 80,90 160,90" fill="none"/>
      <polygon points="200,10 240,90 320,90 260,140 280,220 200,170 120,220 140,140 80,90 160,90" transform="rotate(36 200 200)" fill="none"/>
      <polygon points="200,10 240,90 320,90 260,140 280,220 200,170 120,220 140,140 80,90 160,90" transform="rotate(72 200 200)" fill="none"/>
      <polygon points="200,10 240,90 320,90 260,140 280,220 200,170 120,220 140,140 80,90 160,90" transform="rotate(108 200 200)" fill="none"/>
      <polygon points="200,10 240,90 320,90 260,140 280,220 200,170 120,220 140,140 80,90 160,90" transform="rotate(144 200 200)" fill="none"/>
    </g>
  </svg>
</footer>


<!-- ===== JAVASCRIPT (UI Logic) ===== -->
<script>
// ----- Scroll: header + reveal -----
const header = document.getElementById('header');
const reveals = document.querySelectorAll('.reveal');

function onScroll() {
  // Header
  if (window.scrollY > 60) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }

  // Reveal
  reveals.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight * 0.88) {
      el.classList.add('visible');
    }
  });
}
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

// ----- Testimonial Slider -----
const track = document.getElementById('testiTrack');
const dots  = document.querySelectorAll('.testi-dot');
let current = 0;
const total = dots.length;

function goTo(idx) {
  current = (idx + total) % total;
  track.style.transform = `translateX(-${current * 100}%)`;
  dots.forEach((d, i) => d.classList.toggle('active', i === current));
}
document.getElementById('testiNext').addEventListener('click', () => goTo(current + 1));
document.getElementById('testiPrev').addEventListener('click', () => goTo(current - 1));
dots.forEach(d => d.addEventListener('click', () => goTo(+d.dataset.index)));

// Auto advance
let autoSlide = setInterval(() => goTo(current + 1), 6000);
track.parentElement.addEventListener('mouseenter', () => clearInterval(autoSlide));
track.parentElement.addEventListener('mouseleave', () => {
  autoSlide = setInterval(() => goTo(current + 1), 6000);
});

// Touch swipe
let touchStartX = 0;
track.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
track.addEventListener('touchend', e => {
  const diff = touchStartX - e.changedTouches[0].clientX;
  if (Math.abs(diff) > 50) goTo(diff > 0 ? current + 1 : current - 1);
});

// ----- Smooth anchor scroll -----
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const target = document.querySelector(a.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

// ----- Hamburger Overlay Menu -----
const menuToggle = document.getElementById('menuToggle');
const navLinks   = document.querySelector('.nav-links');

menuToggle.addEventListener('click', function () {
  const isOpen = navLinks.classList.toggle('open');
  menuToggle.classList.toggle('active', isOpen);
});

// Close mobile menu on link click
navLinks.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    navLinks.classList.remove('open');
    menuToggle.classList.remove('active');
  });
});

// ----- Form Submit -----
function handleFormSubmit(e) {
  e.preventDefault();
  const btn = e.target.querySelector('.form-submit');
  btn.textContent = '✓ Session Booked! We\'ll confirm shortly.';
  btn.style.background = '#2A8A4A';
  btn.style.color = '#fff';
  e.target.reset();
  setTimeout(() => {
    btn.textContent = 'Confirm My Free Session →';
    btn.style.background = '';
    btn.style.color = '';
  }, 5000);
}

// ----- Counter animation on hero stats -----
function animateCounters() {
  const nums = document.querySelectorAll('.hero-stat-num');
  nums.forEach(el => {
    const text = el.textContent;
    const match = text.match(/[\d,]+/);
    if (!match) return;
    const target = parseInt(match[0].replace(',', ''));
    const prefix = text.includes('+') ? '+' : '';
    let count = 0;
    const step = Math.ceil(target / 60);
    const timer = setInterval(() => {
      count = Math.min(count + step, target);
      el.textContent = count.toLocaleString() + prefix;
      if (count >= target) clearInterval(timer);
    }, 25);
  });
}
// Trigger when hero stats visible
const statsObs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { animateCounters(); statsObs.disconnect(); } });
}, { threshold: 0.5 });
const statsEl = document.querySelector('.hero-stats');
if (statsEl) statsObs.observe(statsEl);
</script>

<!-- ===== THREE.JS 3D ANIMATIONS ===== -->
<script type="module">
import * as THREE from 'three';

// ======================================================================
// HERO 3D PARTICLE DUMBBELL SYSTEM
// Creates a morphing dumbbell shape from gold particles that reacts to
// mouse movement with energy trails — gym-themed and premium.
// ======================================================================

(function initHeroThreeJS() {
  const canvas = document.getElementById('three-hero-canvas');
  const heroSection = document.getElementById('hero');
  if (!canvas || !heroSection) return;

  // --- Renderer ---
  const renderer = new THREE.WebGLRenderer({
    canvas,
    alpha: true,
    antialias: true,
    powerPreference: 'high-performance'
  });
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  renderer.setClearColor(0x000000, 0);

  // --- Scene & Camera ---
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(60, 1, 0.1, 100);
  camera.position.set(0, 0, 6);

  // --- Mouse tracking ---
  const mouse = { x: 0, y: 0, targetX: 0, targetY: 0 };
  window.addEventListener('mousemove', (e) => {
    mouse.targetX = (e.clientX / window.innerWidth) * 2 - 1;
    mouse.targetY = -(e.clientY / window.innerHeight) * 2 + 1;
  }, { passive: true });

  // --- Generate shape positions ---
  const PARTICLE_COUNT = 4000;
  const dumbbellPositions = [];
  const kettlebellPositions = [];
  const islamicStarPositions = [];
  const pulsePositions = [];

  for (let i = 0; i < PARTICLE_COUNT; i++) {
    // 1. DUMBBELL (Detailed cylinder handle + multi-tiered plates + end collars)
    {
      let x, y, z;
      if (i < 600) {
        // Central handle bar
        x = ((i / 600) - 0.5) * 2.4;
        const angle = Math.random() * Math.PI * 2;
        const r = 0.08 + Math.random() * 0.01;
        y = Math.cos(angle) * r;
        z = Math.sin(angle) * r;
      } else if (i < 3600) {
        // 6 plates: 3 on left (x in [-1.6, -1.0]), 3 on right (x in [1.0, 1.6])
        const plateIndex = Math.floor((i - 600) / 500); // 0 to 5
        let pX, pR;
        if (plateIndex === 0) { pX = -1.15; pR = 0.8; }
        else if (plateIndex === 1) { pX = -1.35; pR = 0.68; }
        else if (plateIndex === 2) { pX = -1.55; pR = 0.55; }
        else if (plateIndex === 3) { pX = 1.15; pR = 0.8; }
        else if (plateIndex === 4) { pX = 1.35; pR = 0.68; }
        else { pX = 1.55; pR = 0.55; }
        
        // Sample flat plate caps or circular cylinder edge
        const tPlate = Math.random();
        const angle = Math.random() * Math.PI * 2;
        if (tPlate < 0.4) {
          // Plate outer cylinder edge
          x = pX + (Math.random() - 0.5) * 0.15;
          y = Math.cos(angle) * pR;
          z = Math.sin(angle) * pR;
        } else {
          // Plate flat face
          x = pX + (Math.random() < 0.5 ? -0.075 : 0.075);
          const r = Math.sqrt(Math.random()) * pR; // uniform disk
          y = Math.cos(angle) * r;
          z = Math.sin(angle) * r;
        }
      } else {
        // Collars
        const side = i % 2 === 0 ? -0.95 : 0.95;
        x = side + (Math.random() - 0.5) * 0.08;
        const angle = Math.random() * Math.PI * 2;
        const r = 0.18 + Math.random() * 0.03;
        y = Math.cos(angle) * r;
        z = Math.sin(angle) * r;
      }
      dumbbellPositions.push(x, y, z);
    }

    // 2. KETTLEBELL (Base sphere + vertical arch handle)
    {
      let x, y, z;
      if (i < 2600) {
        // Bottom bell sphere (radius 0.9, shifted down)
        const phi = Math.random() * Math.PI * 2;
        const theta = Math.acos(2 * Math.random() - 1);
        const r = 0.9 + Math.random() * 0.05;
        x = r * Math.sin(theta) * Math.cos(phi);
        y = r * Math.sin(theta) * Math.sin(phi) - 0.55;
        z = r * Math.cos(theta);
        if (y < -1.3) y = -1.3; // flatten bottom
      } else {
        // Torus handle arch (upper half torus)
        const handleAngle = ((i - 2600) / 1400) * Math.PI; // 0 to pi (arch)
        const handleRadius = 0.65;
        const ringPhi = Math.random() * Math.PI * 2;
        const ringRadius = 0.1 + Math.random() * 0.02;
        
        x = (handleRadius + ringRadius * Math.cos(ringPhi)) * Math.cos(handleAngle);
        y = (handleRadius + ringRadius * Math.cos(ringPhi)) * Math.sin(handleAngle) + 0.35;
        z = ringRadius * Math.sin(ringPhi);
      }
      kettlebellPositions.push(x, y, z);
    }

    // 3. ISLAMIC STAR (3D Extruded 8-Pointed Star matching geometric patterns)
    {
      const step = Math.floor(Math.random() * 8);
      const angle1 = (step * Math.PI) / 4;
      const angle2 = ((step + 1) * Math.PI) / 4;
      const blend = Math.random();
      const targetAngle = angle1 + (angle2 - angle1) * blend;
      const baseR = 1.6;
      const innerR = 0.8;
      const factor = Math.abs(Math.cos(4 * targetAngle));
      const r = (innerR * (1 - factor) + baseR * factor) * (0.8 + Math.random() * 0.2); // fill towards center
      const x = Math.cos(targetAngle) * r;
      const y = Math.sin(targetAngle) * r;
      const z = (Math.random() - 0.5) * 0.3 * (1.6 - r);
      islamicStarPositions.push(x, y, z);
    }

    // 4. DNA PERFORMANCE DOUBLE HELIX
    {
      let x, y, z;
      if (i < 1600) {
        // Strand 1
        const t = ((i / 1600) - 0.5) * 4.4; // x from -2.2 to 2.2
        const angle = t * Math.PI * 2.0; // 2 full turns
        const r = 0.8;
        const ringPhi = Math.random() * Math.PI * 2;
        const thickness = 0.05;
        
        x = t;
        y = r * Math.sin(angle) + Math.cos(ringPhi) * thickness;
        z = r * Math.cos(angle) + Math.sin(ringPhi) * thickness;
      } else if (i < 3200) {
        // Strand 2 (180 degrees phase shift)
        const t = (((i - 1600) / 1600) - 0.5) * 4.4;
        const angle = t * Math.PI * 2.0 + Math.PI;
        const r = 0.8;
        const ringPhi = Math.random() * Math.PI * 2;
        const thickness = 0.05;
        
        x = t;
        y = r * Math.sin(angle) + Math.cos(ringPhi) * thickness;
        z = r * Math.cos(angle) + Math.sin(ringPhi) * thickness;
      } else {
        // Rungs (connecting bars)
        const rungIndex = i - 3200; // 0 to 799
        const segment = Math.floor(rungIndex / 40); // 20 rungs
        const blend = (rungIndex % 40) / 40; // blend between strand 1 and 2
        
        const t = (segment / 20 - 0.5) * 4.0;
        const angle = t * Math.PI * 2.0;
        const r = 0.8;
        
        const x1 = t;
        const y1 = r * Math.sin(angle);
        const z1 = r * Math.cos(angle);
        
        const x2 = t;
        const y2 = r * Math.sin(angle + Math.PI);
        const z2 = r * Math.cos(angle + Math.PI);
        
        x = x1 + (x2 - x1) * blend;
        y = y1 + (y2 - y1) * blend + (Math.random() - 0.5) * 0.03;
        z = z1 + (z2 - z1) * blend + (Math.random() - 0.5) * 0.03;
      }
      pulsePositions.push(x, y, z);
    }
  }

  // --- Particle Geometry ---
  const geometry = new THREE.BufferGeometry();
  const positions = new Float32Array(PARTICLE_COUNT * 3);
  const targetPositions = new Float32Array(PARTICLE_COUNT * 3);
  const velocities = new Float32Array(PARTICLE_COUNT * 3);
  const sizes = new Float32Array(PARTICLE_COUNT);
  const alphas = new Float32Array(PARTICLE_COUNT);
  const randomOffsets = new Float32Array(PARTICLE_COUNT);

  for (let i = 0; i < PARTICLE_COUNT; i++) {
    positions[i * 3]     = dumbbellPositions[i * 3];
    positions[i * 3 + 1] = dumbbellPositions[i * 3 + 1];
    positions[i * 3 + 2] = dumbbellPositions[i * 3 + 2];
    targetPositions[i * 3]     = dumbbellPositions[i * 3];
    targetPositions[i * 3 + 1] = dumbbellPositions[i * 3 + 1];
    targetPositions[i * 3 + 2] = dumbbellPositions[i * 3 + 2];
    sizes[i] = 2.0 + Math.random() * 3.0;
    alphas[i] = 0.3 + Math.random() * 0.7;
    randomOffsets[i] = Math.random() * Math.PI * 2;
  }

  geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
  geometry.setAttribute('aSize', new THREE.BufferAttribute(sizes, 1));
  geometry.setAttribute('aAlpha', new THREE.BufferAttribute(alphas, 1));
  geometry.setAttribute('aOffset', new THREE.BufferAttribute(randomOffsets, 1));

  // --- Custom Shader Material ---
  const material = new THREE.ShaderMaterial({
    uniforms: {
      uTime: { value: 0 },
      uPixelRatio: { value: renderer.getPixelRatio() },
      uMouse: { value: new THREE.Vector2(0, 0) },
      uOpacity: { value: 0.85 },
      uColor1: { value: new THREE.Color('#C6A84B') },   // gold
      uColor2: { value: new THREE.Color('#E8C96E') },   // light gold
      uColor3: { value: new THREE.Color('#FDFAF4') },   // white
    },
    vertexShader: `
      attribute float aSize;
      attribute float aAlpha;
      attribute float aOffset;
      uniform float uTime;
      uniform float uPixelRatio;
      uniform vec2 uMouse;
      varying float vAlpha;
      varying float vColorMix;

      void main() {
        vec3 pos = position;

        // Organic floating motion
        float wave = sin(uTime * 0.8 + aOffset) * 0.06;
        pos.x += wave;
        pos.y += cos(uTime * 0.6 + aOffset * 1.3) * 0.04;
        pos.z += sin(uTime * 0.5 + aOffset * 0.7) * 0.03;

        // Mouse vortex swirl force (gravitational vortex around cursor)
        vec3 mouseWorld = vec3(uMouse.x * 3.5, uMouse.y * 2.5, 0.0);
        vec3 toMouse = mouseWorld - pos;
        float dist = length(toMouse);
        if (dist < 2.0) {
          float force = (1.0 - dist / 2.0) * 0.6;
          // Perpendicular vector for swirling in xy-plane
          vec3 swirl = vec3(-toMouse.y, toMouse.x, 0.0);
          pos += normalize(swirl) * force * 0.35;
          // Pull slightly toward mouse center
          pos += normalize(toMouse) * force * 0.12;
        }

        vec4 modelPosition = modelMatrix * vec4(pos, 1.0);
        vec4 viewPosition = viewMatrix * modelPosition;
        vec4 projectedPosition = projectionMatrix * viewPosition;
        gl_Position = projectedPosition;

        // Size attenuation (16.0 instead of 280.0 makes the particles elegant gold dust)
        float sizeAtten = aSize * uPixelRatio * (16.0 / -viewPosition.z);
        
        // Double pulse heartbeat size modulation (130 BPM = 2.16 Hz, multiply by 2 * PI = 13.6 rad/s)
        float heartbeat = sin(uTime * 13.6) * 0.14 + 0.09 * sin(uTime * 6.8);
        sizeAtten *= (1.0 + heartbeat + sin(uTime * 2.0 + aOffset * 3.0) * 0.1);
        gl_PointSize = sizeAtten;

        vAlpha = aAlpha * (0.6 + sin(uTime * 1.5 + aOffset) * 0.4);
        vColorMix = sin(uTime * 0.3 + aOffset * 2.0) * 0.5 + 0.5;
      }
    `,
    fragmentShader: `
      uniform vec3 uColor1;
      uniform vec3 uColor2;
      uniform vec3 uColor3;
      uniform float uOpacity;
      varying float vAlpha;
      varying float vColorMix;

      void main() {
        // Circular particle with soft edge
        float dist = distance(gl_PointCoord, vec2(0.5));
        if (dist > 0.5) discard;

        float alpha = smoothstep(0.5, 0.1, dist) * vAlpha * uOpacity;

        // Mix between gold tones with occasional white sparkle
        vec3 color = mix(uColor1, uColor2, vColorMix);
        if (vColorMix > 0.92) {
          color = mix(color, uColor3, (vColorMix - 0.92) / 0.08);
        }

        // Glow core (reduced intensity for elegant holographic specks)
        float glow = smoothstep(0.5, 0.0, dist) * 0.22;
        color += glow * uColor2;

        gl_FragColor = vec4(color, alpha);
      }
    `,
    transparent: true,
    depthWrite: false,
    blending: THREE.AdditiveBlending,
  });

  const particles = new THREE.Points(geometry, material);
  scene.add(particles);

  // --- Energy Ring (rotating torus of particles around dumbbell) ---
  const ringCount = 600;
  const ringGeo = new THREE.BufferGeometry();
  const ringPos = new Float32Array(ringCount * 3);
  const ringSizes = new Float32Array(ringCount);
  const ringAlphas = new Float32Array(ringCount);
  const ringOffsets = new Float32Array(ringCount);

  for (let i = 0; i < ringCount; i++) {
    const angle = (i / ringCount) * Math.PI * 2;
    const radius = 2.4 + Math.random() * 0.3;
    ringPos[i * 3]     = Math.cos(angle) * radius;
    ringPos[i * 3 + 1] = (Math.random() - 0.5) * 0.15;
    ringPos[i * 3 + 2] = Math.sin(angle) * radius;
    ringSizes[i] = 1.0 + Math.random() * 2.0;
    ringAlphas[i] = 0.15 + Math.random() * 0.35;
    ringOffsets[i] = Math.random() * Math.PI * 2;
  }

  ringGeo.setAttribute('position', new THREE.BufferAttribute(ringPos, 3));
  ringGeo.setAttribute('aSize', new THREE.BufferAttribute(ringSizes, 1));
  ringGeo.setAttribute('aAlpha', new THREE.BufferAttribute(ringAlphas, 1));
  ringGeo.setAttribute('aOffset', new THREE.BufferAttribute(ringOffsets, 1));

  const ringMat = material.clone();
  const ring = new THREE.Points(ringGeo, ringMat);
  scene.add(ring);

  // --- Ambient dust particles ---
  const dustCount = 400;
  const dustGeo = new THREE.BufferGeometry();
  const dustPos = new Float32Array(dustCount * 3);
  const dustSizes = new Float32Array(dustCount);
  const dustAlphas = new Float32Array(dustCount);
  const dustOffsets = new Float32Array(dustCount);

  for (let i = 0; i < dustCount; i++) {
    dustPos[i * 3]     = (Math.random() - 0.5) * 12;
    dustPos[i * 3 + 1] = (Math.random() - 0.5) * 8;
    dustPos[i * 3 + 2] = (Math.random() - 0.5) * 6;
    dustSizes[i] = 0.5 + Math.random() * 1.5;
    dustAlphas[i] = 0.05 + Math.random() * 0.15;
    dustOffsets[i] = Math.random() * Math.PI * 2;
  }

  dustGeo.setAttribute('position', new THREE.BufferAttribute(dustPos, 3));
  dustGeo.setAttribute('aSize', new THREE.BufferAttribute(dustSizes, 1));
  dustGeo.setAttribute('aAlpha', new THREE.BufferAttribute(dustAlphas, 1));
  dustGeo.setAttribute('aOffset', new THREE.BufferAttribute(dustOffsets, 1));

  const dustMat = material.clone();
  const dust = new THREE.Points(dustGeo, dustMat);
  scene.add(dust);

  // --- Morphing state ---
  let morphProgress = 0;
  let morphDirection = 1;
  const morphSpeed = 0.005; // Slightly faster transition
  const shapes = [dumbbellPositions, kettlebellPositions, islamicStarPositions, pulsePositions];
  let currentShape = 0;
  let nextShape = 1;
  const morphTimer = 6000; // 6 seconds display time
  let lastMorph = Date.now();

  function updateMorph() {
    const now = Date.now();
    if (now - lastMorph > morphTimer && morphProgress <= 0) {
      currentShape = nextShape;
      nextShape = (nextShape + 1) % shapes.length;
      morphProgress = 0;
      morphDirection = 1;
      lastMorph = now;
    }

    if (morphDirection === 1) {
      morphProgress = Math.min(morphProgress + morphSpeed, 1);
      if (morphProgress >= 1) {
        morphDirection = 0;
      }
    }

    const from = shapes[currentShape];
    const to = shapes[nextShape];
    const posAttr = geometry.attributes.position;

    for (let i = 0; i < PARTICLE_COUNT; i++) {
      // Elastic/Cubic easing transition
      const eased = morphProgress < 0.5
        ? 4 * morphProgress * morphProgress * morphProgress
        : 1 - Math.pow(-2 * morphProgress + 2, 3) / 2;

      posAttr.array[i * 3]     = from[i * 3]     + (to[i * 3]     - from[i * 3])     * eased;
      posAttr.array[i * 3 + 1] = from[i * 3 + 1] + (to[i * 3 + 1] - from[i * 3 + 1]) * eased;
      posAttr.array[i * 3 + 2] = from[i * 3 + 2] + (to[i * 3 + 2] - from[i * 3 + 2]) * eased;
    }
    posAttr.needsUpdate = true;
  }

  // --- Resize handler (width-change locked to optimize mobile scroll performance) ---
  let lastWidth = window.innerWidth;
  function resize() {
    const w = window.innerWidth;
    const h = window.innerHeight;
    
    // Ignore height resizes on mobile scrolls (triggered by address bar collapse)
    if (w === lastWidth && w < 900) return;
    lastWidth = w;

    renderer.setSize(w, h);
    camera.aspect = w / h;
    camera.updateProjectionMatrix();
    canvas.style.width = w + 'px';
    canvas.style.height = h + 'px';

    // Responsive positioning and opacity dimming
    if (w > 900) {
      // Desktop: shift to the right to leave space for text
      particles.position.x = 1.8;
      ring.position.x = 1.8;
      material.uniforms.uOpacity.value = 0.85;
      ringMat.uniforms.uOpacity.value = 0.45;
    } else {
      // Mobile: center but make very dim/faint
      particles.position.x = 0.0;
      ring.position.x = 0.0;
      material.uniforms.uOpacity.value = 0.28;
      ringMat.uniforms.uOpacity.value = 0.15;
    }
  }
  window.addEventListener('resize', resize);
  resize();

  // --- Animation loop ---
  const clock = new THREE.Clock();
  let animFrameId;

  function animate() {
    animFrameId = requestAnimationFrame(animate);

    const elapsed = clock.getElapsedTime();

    // Smooth mouse
    mouse.x += (mouse.targetX - mouse.x) * 0.05;
    mouse.y += (mouse.targetY - mouse.y) * 0.05;

    // Update uniforms
    material.uniforms.uTime.value = elapsed;
    material.uniforms.uMouse.value.set(mouse.x, mouse.y);
    ringMat.uniforms.uTime.value = elapsed;
    ringMat.uniforms.uMouse.value.set(mouse.x, mouse.y);
    dustMat.uniforms.uTime.value = elapsed;

    // Morphing
    updateMorph();

    // Gentle rotation
    particles.rotation.y = elapsed * 0.08 + mouse.x * 0.3;
    particles.rotation.x = mouse.y * 0.15;

    // Ring rotation
    ring.rotation.y = -elapsed * 0.2;
    ring.rotation.x = Math.sin(elapsed * 0.15) * 0.2;

    // Dust floating
    const dustAttr = dustGeo.attributes.position;
    for (let i = 0; i < dustCount; i++) {
      dustAttr.array[i * 3 + 1] += Math.sin(elapsed + i) * 0.0008;
      if (dustAttr.array[i * 3 + 1] > 4) dustAttr.array[i * 3 + 1] = -4;
    }
    dustAttr.needsUpdate = true;

    // Only render when hero is visible
    const heroRect = heroSection.getBoundingClientRect();
    if (heroRect.bottom > 0 && heroRect.top < window.innerHeight) {
      renderer.render(scene, camera);
    }
  }

  // Start with a brief delay for page load
  setTimeout(() => {
    animate();
  }, 200);

  // Cleanup on page unload
  window.addEventListener('beforeunload', () => {
    cancelAnimationFrame(animFrameId);
    renderer.dispose();
  });
})();

</script>

</body>
</html>
