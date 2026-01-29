// animations.js — placeholder for GSAP/scroll animations

/* Add GSAP or IntersectionObserver animations here */

// FAQ Accordion Animation
document.addEventListener('DOMContentLoaded', function() {
  const faqItems = document.querySelectorAll('.faq-item');
  
  faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    const answer = item.querySelector('.faq-answer');
    const iconVertical = item.querySelector('.icon-line-vertical');
    
    question.addEventListener('click', () => {
      const isOpen = item.classList.contains('active');
      
      // Close all other FAQ items
      faqItems.forEach(otherItem => {
        if (otherItem !== item && otherItem.classList.contains('active')) {
          const otherAnswer = otherItem.querySelector('.faq-answer');
          const otherIconVertical = otherItem.querySelector('.icon-line-vertical');
          
          gsap.to(otherAnswer, {
            height: 0,
            duration: 0.4,
            ease: 'power2.inOut'
          });
          
          gsap.to(otherIconVertical, {
            rotation: 0,
            duration: 0.4,
            ease: 'power2.inOut'
          });
          
          otherItem.classList.remove('active');
        }
      });
      
      // Toggle current item
      if (isOpen) {
        // Close
        gsap.to(answer, {
          height: 0,
          duration: 0.4,
          ease: 'power2.inOut'
        });
        
        gsap.to(iconVertical, {
          rotation: 0,
          duration: 0.4,
          ease: 'power2.inOut'
        });
        
        item.classList.remove('active');
      } else {
        // Open
        gsap.set(answer, { height: 'auto' });
        gsap.from(answer, {
          height: 0,
          duration: 0.4,
          ease: 'power2.inOut'
        });
        
        gsap.to(iconVertical, {
          rotation: 90,
          duration: 0.4,
          ease: 'power2.inOut'
        });
        
        item.classList.add('active');
      }
    });
  });
});
