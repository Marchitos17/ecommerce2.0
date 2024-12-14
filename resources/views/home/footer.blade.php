<footer class="footer">
    <p>© 2024 FitPro. Tutti i diritti riservati.</p>
</footer>
</body>
<script src="script.js"></script>
<script>
    // Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
      });
    }
  });
});

</script>