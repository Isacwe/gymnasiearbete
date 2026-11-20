<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <title>Lokal Chatt - gjord av AI för förståelse</title>
</head>
<body>

  <div id="meddelanden"></div>

  <form id="chatt-form">
    <input type="text" id="text-input" placeholder="Skriv ett meddelande..." required>
    <button type="submit">Skicka</button>
  </form>

  <script>
    const form = document.getElementById('chatt-form');
    const input = document.getElementById('text-input');
    const meddelandeLista = document.getElementById('meddelanden');
    const kanal = new BroadcastChannel('min_chatt');

    function visaMeddelande(text) {
      const p = document.createElement('p');
      p.textContent = text;
      meddelandeLista.appendChild(p);
    }

    form.addEventListener('submit', function(event) {
      event.preventDefault();
      
      visaMeddelande("Jag: " + input.value);
      
      kanal.postMessage(input.value);
      
      input.value = '';
    });

    kanal.onmessage = function(event) {
      visaMeddelande("Kompis: " + event.data);
    };
  </script>

</body>
</html>