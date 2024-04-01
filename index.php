<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>BTC Prices</title>
    <style>
        /* Additional styles for customization */
        main {
            padding: 20px;
        }
        .crypto-price {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="container-fluid">
        <ul>
            <li><strong>BTC Prices</strong></li>
        </ul>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#" role="button">Contact</a></li>
        </ul>
    </nav>
    <main class="container">
        <div class="grid">
            <section>
                <hgroup>
                    <h2>BTC</h2>
                    <h3>Real-time Data</h3>
                </hgroup>
                <div id="cryptoPrices" class="crypto-price"></div>
            </section>
        </div>
    </main>
    <footer class="container">
        <small><a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a></small>
    </footer>

    <script>
        async function fetchCryptoPrices() {
            try {
                const response = await fetch('https://api.coindesk.com/v1/bpi/currentprice.json');
                const data = await response.json();
                const currencies = ['USD', 'GBP', 'EUR'];
                let content = '<ul>';
                currencies.forEach(currency => {
                    content += `<li>${currency}: ${data.bpi[currency].rate} ${data.bpi[currency].description}</li>`;
                });
                content += '</ul>';
                document.getElementById('cryptoPrices').innerHTML = content;
            } catch(error) {
                console.error('Fetching crypto prices failed:', error);
                document.getElementById('cryptoPrices').innerText = 'Failed to load crypto prices.';
            }
        }

        fetchCryptoPrices();
    </script>
</body>
</html>
