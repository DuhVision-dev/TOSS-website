document.addEventListener('DOMContentLoaded', () => {

  const navItems = document.querySelectorAll('.nav-item.has-dropdown');

  navItems.forEach(navItem => {

    const link = navItem.querySelector('.nav-link');
    const dropdown = navItem.querySelector('.dropdown');

    if (!link || !dropdown) return;

    let closeTimeout = null;

    function positionDropdown() {
      const linkRect = link.getBoundingClientRect();
      const dropdownRect = dropdown.getBoundingClientRect();

      const linkCenter = linkRect.left + linkRect.width / 2;
      let left = linkCenter - dropdownRect.width / 2;

      // Prevent viewport overflow
      const padding = 24;
      const maxLeft = window.innerWidth - dropdownRect.width - padding;
      left = Math.max(padding, Math.min(left, maxLeft));

      dropdown.style.left = `${left}px`;
      dropdown.style.top = `${linkRect.bottom + 0}px`;
    }

    navItem.addEventListener('mouseenter', () => {
      // Clear any pending close timeout
      if (closeTimeout) {
        clearTimeout(closeTimeout);
        closeTimeout = null;
      }
      navItem.classList.add('is-open');
      positionDropdown();
    });

    navItem.addEventListener('mouseleave', () => {
      // Add delay before closing
      closeTimeout = setTimeout(() => {
        navItem.classList.remove('is-open');
      }, 300);
    });

    window.addEventListener('resize', () => {
      if (navItem.classList.contains('is-open')) {
        positionDropdown();
      }
    });
    
    // For mobile, add click
    link.addEventListener('click', (e) => {
      if (window.innerWidth <= 767) {
        e.preventDefault();
        navItem.classList.toggle('is-open');
        positionDropdown();
      }
    });

  });








// Accordion for Router dropdown
document.querySelectorAll('.accordion').forEach(accordion => {

  const items = accordion.querySelectorAll('.accordion-item');

  items.forEach(item => {
    const trigger = item.querySelector('.accordion-trigger');

    trigger.addEventListener('click', () => {

      // Close all other items
      items.forEach(i => {
        if (i !== item) {
          i.classList.remove('is-open');
        }
      });

      // Toggle current
      item.classList.toggle('is-open');
    });
  });

});










// Mobile Menu Toggle
const menuToggle = document.querySelector('.menu-toggle');
const navMenu = document.querySelector('.nav-menu');

if (menuToggle && navMenu) {
  menuToggle.addEventListener('click', () => {
    navMenu.classList.toggle('nav-open');
  });

  // Close menu when clicking a link
  navMenu.addEventListener('click', (e) => {
    if (e.target.classList.contains('nav-link')) {
      navMenu.classList.remove('nav-open');
    }
  });
}

// Toggle alt-mobile-nav on menu-toggle click
const altMobileNav = document.querySelector('.alt-mobile-nav');
const menuToggleBtn = document.querySelector('.menu-toggle');

if (menuToggleBtn && altMobileNav) {
  menuToggleBtn.addEventListener('click', () => {
    const isOpen = altMobileNav.classList.contains('alt-mobile-nav--open');
    
    if (isOpen) {
      // Close menu - get current height first for smooth transition
      altMobileNav.style.height = altMobileNav.scrollHeight + 'px';
      // Force reflow to ensure the browser registers the height
      altMobileNav.offsetHeight;
      // Now transition to 0
      altMobileNav.style.height = '0';
      altMobileNav.style.overflow = 'hidden';
      altMobileNav.classList.remove('alt-mobile-nav--open');
    } else {
      // Open menu
      altMobileNav.classList.add('alt-mobile-nav--open');
      // Set height to scrollHeight for transition
      altMobileNav.style.height = altMobileNav.scrollHeight + 'px';
      altMobileNav.style.overflow = 'hidden';
      
      // After transition completes, set height to auto and overflow to visible
      const handleTransitionEnd = () => {
        if (altMobileNav.classList.contains('alt-mobile-nav--open')) {
          altMobileNav.style.height = 'auto';
          altMobileNav.style.overflow = 'visible';
        }
        altMobileNav.removeEventListener('transitionend', handleTransitionEnd);
      };
      
      altMobileNav.addEventListener('transitionend', handleTransitionEnd);
    }
  });
}

// Toggle individual alt-mobile-dropdown menus
const altMobileDropdowns = document.querySelectorAll('.alt-mobile-dropdown');

altMobileDropdowns.forEach(dropdown => {
  const toggleBtn = dropdown.querySelector('.alt-mobile-dropdown-toggle');
  const menu = dropdown.querySelector('.alt-mobile-dropdown-menu');
  
  if (!toggleBtn || !menu) return;
  
  toggleBtn.addEventListener('click', () => {
    const isOpen = dropdown.classList.contains('is-open');
    
    if (isOpen) {
      // Close dropdown
      menu.style.height = menu.scrollHeight + 'px';
      // Force reflow
      menu.offsetHeight;
      menu.style.height = '0';
      menu.style.overflow = 'hidden';
      dropdown.classList.remove('is-open');
    } else {
      // Open dropdown
      dropdown.classList.add('is-open');
      menu.style.overflow = 'hidden';
      
      // Use requestAnimationFrame to ensure browser calculates scrollHeight
      requestAnimationFrame(() => {
        const height = menu.scrollHeight;
        menu.style.height = height + 'px';
        
        // After transition, set to auto and visible
        const handleTransitionEnd = () => {
          if (dropdown.classList.contains('is-open')) {
            menu.style.height = 'auto';
            menu.style.overflow = 'visible';
          }
          menu.removeEventListener('transitionend', handleTransitionEnd);
        };
        
        menu.addEventListener('transitionend', handleTransitionEnd);
      });
    }
  });
});










// Featured Products Carousel with GSAP
const carouselTrack = document.querySelector('.carousel-track');
const carouselCards = document.querySelectorAll('.carousel-card');
const prevBtn = document.querySelector('.carousel-btn-prev');
const nextBtn = document.querySelector('.carousel-btn-next');

if (carouselTrack && carouselCards.length > 0 && prevBtn && nextBtn) {
  let currentIndex = 0;
  let isAnimating = false;
  const totalCards = carouselCards.length;
  
  // Clone cards for infinite scroll
  const cloneCards = () => {
    carouselCards.forEach(card => {
      const cloneBefore = card.cloneNode(true);
      const cloneAfter = card.cloneNode(true);
      carouselTrack.insertBefore(cloneBefore, carouselTrack.firstChild);
      carouselTrack.appendChild(cloneAfter);
    });
  };
  
  cloneCards();
  
  const getCardWidth = () => {
    return carouselCards[0].offsetWidth + 24; // card width + gap
  };
  
  // Set initial position (start at first real card, after clones)
  const setInitialPosition = () => {
    const cardWidth = getCardWidth();
    gsap.set(carouselTrack, {
      x: -(totalCards * cardWidth)
    });
  };
  
  setInitialPosition();
  
  // Move carousel
  const moveCarousel = (direction) => {
    if (isAnimating) return; // Prevent rapid clicks
    
    isAnimating = true;
    const cardWidth = getCardWidth();
    currentIndex += direction;
    
    const newPosition = -((totalCards + currentIndex) * cardWidth);
    
    gsap.to(carouselTrack, {
      x: newPosition,
      duration: 0.6,
      ease: "power2.out",
      onComplete: () => {
        // Reset position for infinite scroll
        if (currentIndex >= totalCards) {
          currentIndex = 0;
          gsap.set(carouselTrack, { x: -(totalCards * cardWidth) });
        } else if (currentIndex < 0) {
          currentIndex = totalCards - 1;
          gsap.set(carouselTrack, { x: -((totalCards * 2 - 1) * cardWidth) });
        }
        isAnimating = false; // Allow next click
      }
    });
  };
  
  // Button event listeners
  nextBtn.addEventListener('click', () => moveCarousel(1));
  prevBtn.addEventListener('click', () => moveCarousel(-1));
  
  // Recalculate on window resize
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      const cardWidth = getCardWidth();
      gsap.set(carouselTrack, {
        x: -((totalCards + currentIndex) * cardWidth)
      });
    }, 250);
  });
}

// Certificates Carousel with GSAP
const certificatesCarouselTrack = document.querySelector('.certificates-carousel-track');
const certificatesCarouselCards = document.querySelectorAll('.certificates-carousel-card');
const certificatesPrevBtn = document.querySelector('.certificates-carousel-btn-prev');
const certificatesNextBtn = document.querySelector('.certificates-carousel-btn-next');

if (certificatesCarouselTrack && certificatesCarouselCards.length > 0 && certificatesPrevBtn && certificatesNextBtn) {
  let certificatesCurrentIndex = 0;
  let certificatesIsAnimating = false;
  const certificatesTotalCards = certificatesCarouselCards.length;
  
  // Clone cards for infinite scroll
  const cloneCertificatesCards = () => {
    certificatesCarouselCards.forEach(card => {
      const cloneBefore = card.cloneNode(true);
      const cloneAfter = card.cloneNode(true);
      certificatesCarouselTrack.insertBefore(cloneBefore, certificatesCarouselTrack.firstChild);
      certificatesCarouselTrack.appendChild(cloneAfter);
    });
  };
  
  cloneCertificatesCards();
  
  const getCertificatesCardWidth = () => {
    const track = certificatesCarouselTrack;
    const gap = parseFloat(getComputedStyle(track).gap) || 0;
    return certificatesCarouselCards[0].offsetWidth + gap;
  };
  
  // Set initial position (start at first real card, after clones)
  const setCertificatesInitialPosition = () => {
    const cardWidth = getCertificatesCardWidth();
    gsap.set(certificatesCarouselTrack, {
      x: -(certificatesTotalCards * cardWidth)
    });
  };
  
  setCertificatesInitialPosition();
  
  // Move carousel
  const moveCertificatesCarousel = (direction) => {
    if (certificatesIsAnimating) return; // Prevent rapid clicks
    
    certificatesIsAnimating = true;
    const cardWidth = getCertificatesCardWidth();
    certificatesCurrentIndex += direction;
    
    const newPosition = -((certificatesTotalCards + certificatesCurrentIndex) * cardWidth);
    
    gsap.to(certificatesCarouselTrack, {
      x: newPosition,
      duration: 0.6,
      ease: "power2.out",
      onComplete: () => {
        // Reset position for infinite scroll
        if (certificatesCurrentIndex >= certificatesTotalCards) {
          certificatesCurrentIndex = 0;
          gsap.set(certificatesCarouselTrack, { x: -(certificatesTotalCards * cardWidth) });
        } else if (certificatesCurrentIndex < 0) {
          certificatesCurrentIndex = certificatesTotalCards - 1;
          gsap.set(certificatesCarouselTrack, { x: -((certificatesTotalCards * 2 - 1) * cardWidth) });
        }
        certificatesIsAnimating = false; // Allow next click
      }
    });
  };
  
  // Button event listeners
  certificatesNextBtn.addEventListener('click', () => moveCertificatesCarousel(1));
  certificatesPrevBtn.addEventListener('click', () => moveCertificatesCarousel(-1));
  
  // Recalculate on window resize
  let certificatesResizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(certificatesResizeTimer);
    certificatesResizeTimer = setTimeout(() => {
      const cardWidth = getCertificatesCardWidth();
      gsap.set(certificatesCarouselTrack, {
        x: -((certificatesTotalCards + certificatesCurrentIndex) * cardWidth)
      });
    }, 250);
  });
}

// Mobile Category Dropdown Toggle (Products Page) with GSAP
const mobileCategoryToggle = document.querySelector('.mobile-category-toggle');
const mobileCategoryDropdown = document.querySelector('.mobile-category-dropdown');
const mobileCategoryNavbar = document.querySelector('.mobile-category-navbar');
const mobileCategoryScroll = document.querySelector('.mobile-category-scroll');

if (mobileCategoryToggle && mobileCategoryDropdown) {
  let isDropdownOpen = false;
  
  // Function to position navbar right after header
  function positionNavbarAfterHeader() {
    const siteHeader = document.querySelector('.site-header');
    if (siteHeader && mobileCategoryNavbar) {
      const headerHeight = siteHeader.offsetHeight;
      mobileCategoryNavbar.style.top = headerHeight + 'px';
      
      // Position dropdown below navbar
      if (mobileCategoryDropdown) {
        const navbarHeight = mobileCategoryNavbar.offsetHeight;
        mobileCategoryDropdown.style.top = (headerHeight + navbarHeight) + 'px';
      }
    }
  }
  
  // Position on load
  positionNavbarAfterHeader();
  
  // Reposition on window resize
  window.addEventListener('resize', positionNavbarAfterHeader);
  
  // Set initial state
  gsap.set(mobileCategoryDropdown, { height: 0, overflow: 'hidden' });
  
  mobileCategoryToggle.addEventListener('click', () => {
    if (isDropdownOpen) {
      // Close dropdown
      gsap.to(mobileCategoryDropdown, {
        height: 0,
        duration: 0.4,
        ease: 'power2.out',
        onComplete: () => {
          mobileCategoryDropdown.classList.remove('active');
        }
      });
      isDropdownOpen = false;
    } else {
      // Open dropdown
      mobileCategoryDropdown.classList.add('active');
      
      // Get the natural height
      gsap.set(mobileCategoryDropdown, { height: 'auto' });
      const naturalHeight = mobileCategoryDropdown.offsetHeight;
      gsap.set(mobileCategoryDropdown, { height: 0 });
      
      // Animate to natural height
      gsap.to(mobileCategoryDropdown, {
        height: naturalHeight,
        duration: 0.4,
        ease: 'power2.out',
        onComplete: () => {
          gsap.set(mobileCategoryDropdown, { height: 'auto' });
        }
      });
      isDropdownOpen = true;
    }
  });
  
  // Close dropdown when clicking a category link
  const dropdownLinks = mobileCategoryDropdown.querySelectorAll('a');
  dropdownLinks.forEach(link => {
    link.addEventListener('click', () => {
      if (isDropdownOpen) {
        gsap.to(mobileCategoryDropdown, {
          height: 0,
          duration: 0.4,
          ease: 'power2.out',
          onComplete: () => {
            mobileCategoryDropdown.classList.remove('active');
          }
        });
        isDropdownOpen = false;
      }
    });
  });
}

// Scroll active category into view in mobile navbar
if (mobileCategoryScroll) {
  const activeCategory = mobileCategoryScroll.querySelector('.mobile-category-item.active');
  if (activeCategory) {
    // Scroll the active category into view on page load
    setTimeout(() => {
      activeCategory.scrollIntoView({
        behavior: 'smooth',
        block: 'nearest',
        inline: 'center'
      });
    }, 100);
  }
}

});