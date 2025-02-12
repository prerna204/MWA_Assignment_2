// Wrap every letter in a span
var textWrapper = document.querySelector('.ml3');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

// Make sure the text is visible when the page loads
textWrapper.style.opacity = 1;

// Start the animation after 2 minutes (120,000 milliseconds)
setTimeout(() => {
    // Animation using Anime.js
    anime.timeline({loop: true})
      .add({
        targets: '.ml3 .letter',
        opacity: [0, 1],  // Fade in letters from opacity 0 to 1
        easing: "easeInOutQuad",
        duration: 2000,  // Duration for each letter fade-in
        delay: (el, i) => 200 * (i+1)  // Delay for each letter
      })
      .add({
        targets: '.ml3',
        opacity: 0,  // Fade out the whole text
        duration: 50,  // Duration for fade-out
        easing: "easeOutExpo",
        delay: 500  // Delay before fading out
      });
}, 0);  // 120000ms = 2 minutes
