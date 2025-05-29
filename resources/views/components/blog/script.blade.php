<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 10) {
            navbar.classList.remove('bg-transparent', 'text-white');
            navbar.classList.add('bg-white/80', 'backdrop-blur-2xl', 'backdrop-saturate-200');
        } else {
            navbar.classList.remove('bg-white/80', 'backdrop-blur-2xl', 'backdrop-saturate-200');
            navbar.classList.add('bg-transparent', 'text-white');
        }
    });
</script>
