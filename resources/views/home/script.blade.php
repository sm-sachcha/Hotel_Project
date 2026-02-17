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

    <style>
         td {
            white-space: normal; /* allow multiple lines */
            overflow: visible;
            text-overflow: unset;
            }
     </style>

    <style>
        /* Light Background */
            body {
                background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            }

            /* Glass Card */
            .booking-glass.light {
                background: rgba(255, 255, 255, 0.65);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                border-radius: 16px;
                padding: 30px;
                border: 1px solid rgba(255, 255, 255, 0.4);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
                transition: transform 0.4s ease, box-shadow 0.4s ease;
            }

            /* Card Hover */
            .booking-glass.light:hover {
                transform: translateY(-6px) scale(1.02);
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.18);
            }

            .box-title {
                text-align: center;
                margin-bottom: 25px;
                color: #333;
                font-weight: 600;
            }

            /* Labels */
            .form-group label {
                color: #444;
                font-size: 14px;
                margin-bottom: 6px;
                display: block;
            }

            /* Glass Inputs */
            .glass-input {
                background: rgba(255, 255, 255, 0.8);
                border: 1px solid rgba(0, 0, 0, 0.15);
                color: #333;
                border-radius: 10px;
                height: 45px;
                transition: all 0.3s ease;
            }

            .glass-input:focus {
                background: #fff;
                border-color: #00c6ff;
                box-shadow: 0 0 10px rgba(0, 198, 255, 0.4);
            }

            /* Full-width Button */
            .book-btn {
                width: 100%;
                height: 50px;
                border-radius: 12px;
                background: linear-gradient(135deg, #00c6ff, #0072ff);
                border: none;
                color: #fff;
                font-size: 17px;
                font-weight: 600;
                letter-spacing: 1px;
                transition: all 0.35s ease;
                box-shadow: 0 10px 25px rgba(0, 114, 255, 0.4);
            }

            /* Button Hover */
            .book-btn:hover {
                transform: translateY(-3px) scale(1.03);
                box-shadow: 0 18px 40px rgba(0, 114, 255, 0.6);
            }

            /* Button Click */
            .book-btn:active {
                transform: scale(0.97);
            }
    </style>