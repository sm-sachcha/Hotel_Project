<script>
    document.querySelectorAll('.toggle-text').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.closest('p');
            const shortText = parent.querySelector('.short-text');
            const fullText = parent.querySelector('.full-text');

            if(shortText.style.display === 'none') {
                shortText.style.display = 'inline';
                fullText.style.display = 'none';
                this.textContent = 'See More';
            } else {
                shortText.style.display = 'none';
                fullText.style.display = 'inline';
                this.textContent = 'See Less';
            }
        });
    });
</script>