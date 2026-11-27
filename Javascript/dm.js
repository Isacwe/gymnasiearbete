const form = document.getElementById('chatt-form');
const input = document.getElementById('text-input');
const meddelandeLista = document.getElementById('meddelanden');

form.addEventListener('submit', function(event) {
  event.preventDefault();
  if (!input.value.trim()) return;

  const messageRow = document.createElement('div');
  messageRow.className = 'message';

  const pfp = document.createElement('div');
  pfp.className = 'pfp';

  const content = document.createElement('div');

  const username = document.createElement('div');
  username.className = 'cloud-text';
  username.textContent = CURRENT_USER;

  const text = document.createElement('p');
  text.className = 'message-text';
  text.textContent = input.value;

  content.appendChild(username);
  content.appendChild(text);
  messageRow.appendChild(pfp);
  messageRow.appendChild(content);
  meddelandeLista.appendChild(messageRow);

  input.value = '';
  meddelandeLista.scrollTop = meddelandeLista.scrollHeight;
});

input.addEventListener('keydown', function(event) {
  if (event.key === 'Enter' && !event.shiftKey) {
    event.preventDefault();
    form.requestSubmit();
  }
});

const textarea = document.getElementById('text-input');
const counter = document.getElementById('charCount');
const limit = 4001;

textarea.addEventListener('input', () => {
    if(textarea.value.length > limit) {
        textarea.value = textarea.value.slice(0, limit);
    }
    counter.textContent = `${textarea.value.length} / ${limit}`;
});