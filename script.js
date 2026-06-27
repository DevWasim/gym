// ============================================
// JEXA FITNESS — Interactive Script
// Language Toggle, Animations, Interactions
// ============================================

document.addEventListener('DOMContentLoaded', () => {
  lucide.createIcons();
  initNavbar();
  initCountUp();
  initScrollReveal();
  initParticles();
  initTouchSwipe();
  initMobileOptimizations();
});

// ==================== LANGUAGE TOGGLE ====================
let currentLang = 'en';

function toggleLanguage() {
  currentLang = currentLang === 'en' ? 'ar' : 'en';
  
  const html = document.documentElement;
  const langLabel = document.getElementById('langLabel');
  
  if (currentLang === 'ar') {
    html.setAttribute('dir', 'rtl');
    html.setAttribute('lang', 'ar');
    langLabel.textContent = 'English';
    langLabel.style.fontFamily = "'Inter', sans-serif";
  } else {
    html.setAttribute('dir', 'ltr');
    html.setAttribute('lang', 'en');
    langLabel.textContent = 'عربي';
    langLabel.style.fontFamily = "'Cairo', sans-serif";
  }
  
  // Update all translatable elements
  document.querySelectorAll('[data-en]').forEach(el => {
    const text = el.getAttribute(`data-${currentLang}`);
    if (text) {
      if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
        el.placeholder = text;
      } else {
        el.textContent = text;
      }
    }
  });
  
  // Re-init icons after text content change
  lucide.createIcons();
}

// ==================== NAVBAR ====================
function initNavbar() {
  const navbar = document.getElementById('navbar');
  
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
  
  // Smooth scroll for nav links
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const targetId = link.getAttribute('href');
      if (targetId === '#') return;
      
      e.preventDefault();
      const target = document.querySelector(targetId);
      if (target) {
        const navHeight = navbar.offsetHeight;
        const targetPosition = target.offsetTop - navHeight - 20;
        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
        
        // Close mobile menu if open
        const navLinks = document.getElementById('navLinks');
        const mobileBtn = document.getElementById('mobileMenuBtn');
        navLinks.classList.remove('active');
        mobileBtn.classList.remove('active');
      }
    });
  });
}

// ==================== MOBILE MENU ====================
function toggleMobileMenu() {
  const navLinks = document.getElementById('navLinks');
  const mobileBtn = document.getElementById('mobileMenuBtn');
  navLinks.classList.toggle('active');
  mobileBtn.classList.toggle('active');
}

// ==================== COUNT UP ANIMATION ====================
function initCountUp() {
  const counters = document.querySelectorAll('[data-count]');
  let counted = false;
  
  const countUp = () => {
    if (counted) return;
    
    const heroStats = document.querySelector('.hero-stats');
    if (!heroStats) return;
    
    const rect = heroStats.getBoundingClientRect();
    if (rect.top < window.innerHeight && rect.bottom > 0) {
      counted = true;
      
      counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const update = () => {
          current += step;
          if (current < target) {
            counter.textContent = Math.floor(current).toLocaleString();
            requestAnimationFrame(update);
          } else {
            counter.textContent = target.toLocaleString();
          }
        };
        
        requestAnimationFrame(update);
      });
    }
  };
  
  window.addEventListener('scroll', countUp);
  countUp(); // Check on load
}

// ==================== SCROLL REVEAL ====================
function initScrollReveal() {
  const elements = document.querySelectorAll('[data-aos]');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const delay = entry.target.getAttribute('data-aos-delay') || 0;
        setTimeout(() => {
          entry.target.classList.add('revealed');
        }, parseInt(delay));
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.15,
    rootMargin: '0px 0px -50px 0px'
  });
  
  elements.forEach(el => observer.observe(el));
}

// ==================== PRICING TOGGLE ====================
let isYearly = false;

function togglePricing() {
  isYearly = !isYearly;
  
  const toggle = document.getElementById('pricingToggle');
  const monthlyLabel = document.getElementById('monthlyLabel');
  const yearlyLabel = document.getElementById('yearlyLabel');
  
  toggle.classList.toggle('active', isYearly);
  monthlyLabel.classList.toggle('active', !isYearly);
  yearlyLabel.classList.toggle('active', isYearly);
  
  // Toggle price display
  document.querySelectorAll('.monthly-price').forEach(el => {
    el.style.display = isYearly ? 'none' : 'inline';
  });
  document.querySelectorAll('.yearly-price').forEach(el => {
    el.style.display = isYearly ? 'inline' : 'none';
  });
}

// ==================== REVIEWS CAROUSEL ====================
let reviewIndex = 0;

function scrollReviews(direction) {
  const track = document.getElementById('reviewsTrack');
  const cards = track.querySelectorAll('.review-card');
  const cardWidth = cards[0].offsetWidth + 24; // include gap
  
  // Calculate max scrollable cards based on viewport
  const visibleCards = window.innerWidth <= 768 ? 1 : window.innerWidth <= 1024 ? 2 : 3;
  const maxIndex = Math.max(0, cards.length - visibleCards);
  
  reviewIndex += direction;
  reviewIndex = Math.max(0, Math.min(reviewIndex, maxIndex));
  
  track.style.transform = `translateX(${-reviewIndex * cardWidth}px)`;
}

// ==================== CONTACT FORM ====================
function handleFormSubmit(e) {
  e.preventDefault();
  
  const form = e.target;
  const wrapper = form.closest('.contact-form-wrapper');
  
  // Show success message
  wrapper.innerHTML = `
    <div class="form-success">
      <div class="form-success-icon">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
      </div>
      <h3 data-en="Message Sent!" data-ar="تم إرسال الرسالة!">${currentLang === 'ar' ? 'تم إرسال الرسالة!' : 'Message Sent!'}</h3>
      <p data-en="We'll get back to you within 24 hours. Welcome to the JEXA family!" data-ar="بنرد عليك خلال 24 ساعة. أهلاً فيك في عائلة جيكسا!">${currentLang === 'ar' ? 'بنرد عليك خلال 24 ساعة. أهلاً فيك في عائلة جيكسا!' : "We'll get back to you within 24 hours. Welcome to the JEXA family!"}</p>
    </div>
  `;
}

// ==================== PARTICLES ====================
function initParticles() {
  const container = document.getElementById('heroParticles');
  if (!container) return;
  
  for (let i = 0; i < 30; i++) {
    const particle = document.createElement('div');
    particle.style.cssText = `
      position: absolute;
      width: ${Math.random() * 3 + 1}px;
      height: ${Math.random() * 3 + 1}px;
      background: rgba(0, 210, 106, ${Math.random() * 0.3 + 0.05});
      border-radius: 50%;
      left: ${Math.random() * 100}%;
      top: ${Math.random() * 100}%;
      animation: particleFloat ${Math.random() * 15 + 10}s linear infinite;
      animation-delay: ${Math.random() * 5}s;
    `;
    container.appendChild(particle);
  }
  
  // Add particle animation keyframes
  const style = document.createElement('style');
  style.textContent = `
    @keyframes particleFloat {
      0% { transform: translate(0, 0) scale(1); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translate(${Math.random() > 0.5 ? '' : '-'}${Math.random() * 200}px, -${Math.random() * 400 + 200}px) scale(0.5); opacity: 0; }
    }
  `;
  document.head.appendChild(style);
}

// ==================== RTL CAROUSEL FIX ====================
// Handle carousel direction in RTL
const originalScrollReviews = scrollReviews;
window.scrollReviews = function(direction) {
  if (document.documentElement.dir === 'rtl') {
    direction = -direction;
  }
  
  const track = document.getElementById('reviewsTrack');
  const cards = track.querySelectorAll('.review-card');
  const cardWidth = cards[0].offsetWidth + 24;
  
  const visibleCards = window.innerWidth <= 768 ? 1 : window.innerWidth <= 1024 ? 2 : 3;
  const maxIndex = Math.max(0, cards.length - visibleCards);
  
  reviewIndex += direction;
  reviewIndex = Math.max(0, Math.min(reviewIndex, maxIndex));
  
  const translateDir = document.documentElement.dir === 'rtl' ? '' : '-';
  track.style.transform = `translateX(${translateDir}${reviewIndex * cardWidth}px)`;
};

// ==================== TOUCH SWIPE FOR CAROUSEL ====================
function initTouchSwipe() {
  const carousel = document.getElementById('reviewsCarousel');
  if (!carousel) return;
  
  let startX = 0;
  let startY = 0;
  let isDragging = false;
  
  carousel.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
    startY = e.touches[0].clientY;
    isDragging = true;
  }, { passive: true });
  
  carousel.addEventListener('touchmove', (e) => {
    if (!isDragging) return;
    const diffX = Math.abs(e.touches[0].clientX - startX);
    const diffY = Math.abs(e.touches[0].clientY - startY);
    // If horizontal swipe is dominant, prevent default scroll
    if (diffX > diffY && diffX > 10) {
      e.preventDefault();
    }
  }, { passive: false });
  
  carousel.addEventListener('touchend', (e) => {
    if (!isDragging) return;
    isDragging = false;
    
    const endX = e.changedTouches[0].clientX;
    const diff = startX - endX;
    const threshold = 50; // minimum swipe distance
    
    if (Math.abs(diff) > threshold) {
      if (diff > 0) {
        // Swiped left → next
        window.scrollReviews(1);
      } else {
        // Swiped right → previous
        window.scrollReviews(-1);
      }
    }
  }, { passive: true });
}

// ==================== MOBILE OPTIMIZATIONS ====================
function initMobileOptimizations() {
  // Close mobile nav when tapping outside
  document.addEventListener('click', (e) => {
    const navLinks = document.getElementById('navLinks');
    const mobileBtn = document.getElementById('mobileMenuBtn');
    
    if (navLinks.classList.contains('active') && 
        !navLinks.contains(e.target) && 
        !mobileBtn.contains(e.target)) {
      navLinks.classList.remove('active');
      mobileBtn.classList.remove('active');
    }
  });
  
  // Fix iOS Safari 100vh issue using CSS custom property
  function setVH() {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  }
  
  setVH();
  window.addEventListener('resize', setVH);
  
  // Prevent 300ms click delay on mobile (modern browsers)
  document.documentElement.style.touchAction = 'manipulation';
  
  // Lazy load images with IntersectionObserver for performance
  const lazyImages = document.querySelectorAll('img[loading="lazy"]');
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          // Force image decode for smoother rendering
          if (img.decode) {
            img.decode().catch(() => {});
          }
          imageObserver.unobserve(img);
        }
      });
    }, { rootMargin: '100px' });
    
    lazyImages.forEach(img => imageObserver.observe(img));
  }
}
