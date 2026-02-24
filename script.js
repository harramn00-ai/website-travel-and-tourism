

// ===== 1. Welcome Message Only on Home Page =====
if (window.location.pathname.includes("HOME.html")) {
    console.log("Welcome to Explore Pakistan Website!");
}

// ===== 2. Stop Marquee on Hover =====
document.querySelectorAll("marquee").forEach(marquee => {
    marquee.addEventListener("mouseover", () => marquee.stop());
    marquee.addEventListener("mouseout", () => marquee.start());
});

// ===== 3. Highlight Current Page in Navigation =====
let links = document.querySelectorAll(".links a");
links.forEach(link => {
    if (link.href === window.location.href) {
        link.style.color = "#ffdd00";
        link.style.textDecoration = "underline";
    }
});


// ===== 4. Contact Form Validation =====
function validateForm() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let message = document.getElementById("message").value.trim();

    if (name === "" || email === "" || phone === "" || message === "") {
        alert("⚠ Please fill in all fields.");
        return false;
    }

    // Email must include @ and .
    if (!email.includes("@") || !email.includes(".")) {
        alert("⚠ Please enter a valid email address.");
        return false;
    }

    // Phone number must be numeric and 11 digits
    if (phone.length !== 11 || isNaN(phone)) {
        alert("⚠ Phone number must be 11 digits and numeric.");
        return false;
    }

    alert("✅ Form Submitted Successfully!");
    return true;
}
// ===== Explore Button Popup =====
const btn = document.getElementById("exploreBtn");
if (btn) {
  btn.addEventListener("click", function () {
    alert("🇵🇰 Pakistan is waiting for you! Visit the Gallery or Packages section to begin your dream journey.");
  });
}


// Access YouTube iframe
var player;

function onYouTubeIframeAPIReady() {
  player = new YT.Player('youtubeVideo');
}

function playVideo() {
  player.playVideo();
}

function pauseVideo() {
  player.pauseVideo();
}

function makeBig() {
  document.getElementById("youtubeVideo").width = 700;
  document.getElementById("youtubeVideo").height = 400;
}

function makeSmall() {
  document.getElementById("youtubeVideo").width = 400;
  document.getElementById("youtubeVideo").height = 250;
}

function makeNormal() {
  document.getElementById("youtubeVideo").width = 560;
  document.getElementById("youtubeVideo").height = 315;
}

// Load YouTube IFrame API
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
document.body.appendChild(tag);

//booking
function openBookingForm(destinationId, pricePerPerson){
    document.getElementById('bookingForm').style.display = 'flex';
    document.getElementById('destination_id').value = destinationId;
    document.getElementById('pricePerPerson').innerText = pricePerPerson;
    document.getElementById('num_travelers').value = 1;
    document.getElementById('totalAmount').innerText = pricePerPerson;
    document.getElementById('discountInfo').innerText = ""; // initially empty

    const numInput = document.getElementById('num_travelers');
    const totalAmountInput = document.getElementById('total_amount');

    numInput.oninput = function(){
        let num = parseInt(numInput.value);
        let discountPercent = 0;

        if(num === 2) discountPercent = 2;
        else if(num >= 3 && num <= 5) discountPercent = 7;
        else if(num >= 6 && num <= 7) discountPercent = 10;
         else if(num >= 8 && num <= 9) discountPercent = 12;
        else if(num >= 10) discountPercent = 15;

        let total = pricePerPerson * num;
        let discountAmount = total * (discountPercent / 100);
        let finalTotal = total - discountAmount;

        document.getElementById('totalAmount').innerText = finalTotal.toLocaleString();
        totalAmountInput.value = finalTotal;

        if(discountPercent > 0){
            document.getElementById('discountInfo').innerText = 
                `🎉 Group Discount: ${discountPercent}% off applied for ${num} travelers!`;
        } else {
            document.getElementById('discountInfo').innerText = "";
        }
    }

    totalAmountInput.value = pricePerPerson;
}

function closeBookingForm(){
    document.getElementById('bookingForm').style.display = 'none';
}




//home image
const hero = document.querySelector('.hero');
const images = [
  'https://png.pngtree.com/background/20230611/original/pngtree-beautiful-tropical-island-with-trees-and-blue-water-picture-image_3151060.jpg',
  'https://i.pinimg.com/736x/5f/7a/84/5f7a84bd4d79712e080ef221d2597dc5--french-beach-pakistan-travel.jpg',
  'https://www.tripfore.com/wp-content/uploads/2019/01/Faisal-Mosque-Lonely-Planet-1024x694.jpg',
  'https://wpassets.graana.com/blog/wp-content/uploads/2023/08/dusk-at-sunehra-beach.jpeg',
  'https://wallpaperaccess.com/full/2763858.jpg',
  'https://www.tripfore.com/wp-content/uploads/2019/01/Mizar-e-Qauid-Karachi-Flickr.jpg'
  
  
];
let current = 0;

// Initial background
hero.style.backgroundImage = `url('${images[current]}')`;

setInterval(() => {
  current = (current + 1) % images.length;
  hero.style.backgroundImage = `url('${images[current]}')`;
}, 3000); // Change image every 2 seconds

//date after  future
window.addEventListener('DOMContentLoaded', () => {
    const dateInputs = document.querySelectorAll('.future-date');
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    const minDate = `${yyyy}-${mm}-${dd}`;

    dateInputs.forEach(input => {
        input.setAttribute('min', minDate);
    });
});
// Achievements / Stats Counter Section 

  const counters = document.querySelectorAll('.stat-number');
  let started = false;

  function startCounter() {
    if (started) return;
    let sectionPos = document.querySelector('.stats-section').getBoundingClientRect().top;
    let screenPos = window.innerHeight;

    if (sectionPos < screenPos) {
      counters.forEach(counter => {
        let target = +counter.getAttribute('data-target');
        let count = 0;
        let speed = target / 200;

        let updateCount = setInterval(() => {
          if (count < target) {
            count += speed;
            counter.textContent = Math.floor(count);
          } else {
            counter.textContent = target;
            clearInterval(updateCount);
          }
        }, 10);
      });
      started = true;
    }
  }

  window.addEventListener('scroll', startCounter);

