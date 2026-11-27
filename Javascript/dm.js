const form = document.getElementById('chatt-form');
const input = document.getElementById('text-input');
const meddelandeLista = document.getElementById('meddelanden');
const counter = document.getElementById('charCount');
const limit = 4001;
const textLimit = document.getElementById('text-limit');
let textTimeout;

function renderMessage(sender, messageText) {
    const messageRow = document.createElement('div');
    messageRow.className = 'message';

    if (sender === CURRENT_USER) {
        messageRow.classList.add('own-message');
    }

    const pfp = document.createElement('div');
    pfp.className = 'pfp';

    const content = document.createElement('div');
    content.className = 'message-content';

    const header = document.createElement('div');
    header.className = 'message-header';

    const username = document.createElement('span');
    username.className = 'cloud-text';
    username.textContent = sender;

    const timestamp = document.createElement('span');
    timestamp.className = 'timestamp';
    timestamp.textContent = new Date().toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
    });

    header.appendChild(username);
    header.appendChild(timestamp);

    const text = document.createElement('p');
    text.className = 'message-text';
    text.textContent = messageText;

    content.appendChild(header);
    content.appendChild(text);
    messageRow.appendChild(pfp);
    messageRow.appendChild(content);
    meddelandeLista.appendChild(messageRow);

    meddelandeLista.scrollTop = meddelandeLista.scrollHeight;
}

form.addEventListener('submit', function(event) {
    event.preventDefault();
    const text = input.value.trim();
    if (!text) return;

    renderMessage(CURRENT_USER, text);

    input.value = '';
    counter.textContent = `0 / ${limit}`;
    counter.style.color = '';
});

input.addEventListener('keydown', function(event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        form.requestSubmit();
    }
});

input.addEventListener('input', () => {
    if (input.value.length > limit) {
        input.value = input.value.slice(0, limit);
    }
    counter.textContent = `${input.value.length} / ${limit}`;
    counter.style.color = input.value.length >= limit ? '#dc3545' : '';
});

const settingsBtn = document.getElementById('settings-btn');
const settingsDropdown = document.getElementById('settings-dropdown');
const colorPicker = document.getElementById('bg-color-picker');
const opacitySlider = document.getElementById('bg-opacity-slider');
const chatContainer = document.querySelector('.chat-container');

function updateChatBackground(hex, alpha) {
  const r = parseInt(hex.slice(1, 3), 16);
  const g = parseInt(hex.slice(3, 5), 16);
  const b = parseInt(hex.slice(5, 7), 16);
  chatContainer.style.backgroundColor = `rgba(${r}, ${g}, ${b}, ${alpha})`;
  localStorage.setItem('chatBgColor', hex);
  localStorage.setItem('chatBgOpacity', alpha);
}

const savedColor = localStorage.getItem('chatBgColor');
const savedOpacity = localStorage.getItem('chatBgOpacity');
if (savedColor && savedOpacity !== null) {
  colorPicker.value = savedColor;
  opacitySlider.value = savedOpacity;
  updateChatBackground(savedColor, savedOpacity);
}

settingsBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  settingsDropdown.classList.toggle('hidden');
});

document.addEventListener('click', (e) => {
  if (!settingsDropdown.contains(e.target) && e.target !== settingsBtn) {
    settingsDropdown.classList.add('hidden');
  }
});

colorPicker.addEventListener('input', () => {
  updateChatBackground(colorPicker.value, opacitySlider.value);
});

opacitySlider.addEventListener('input', () => {
  updateChatBackground(colorPicker.value, opacitySlider.value);
});
