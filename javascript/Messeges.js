// Sample chat data for demonstration purposes
const chatData = {
  group1: {
      name: "Group Chat 1",
      messages: [
          { sender: "Alice", text: "Hey everyone!" },
          { sender: "Bob", text: "Hello!" },
          { sender: "John", text: "What's up?" }
      ]
  },
  group2: {
      name: "Group Chat 2",
      messages: [
          { sender: "Charlie", text: "Are we still on for the meeting?" },
          { sender: "John", text: "Yes, at 3 PM." }
      ]
  },
  group3: {
      name: "Group Chat 3",
      messages: [
          { sender: "Diana", text: "Looking forward to the party!" },
          { sender: "John", text: "Me too!" }
      ]
  },
  contact1: {
      name: "Contact 1",
      messages: [
          { sender: "Contact 1", text: "Hi John!" },
          { sender: "John", text: "Hello!" }
      ]
  },
  contact2: {
      name: "Contact 2",
      messages: [
          { sender: "Contact 2", text: "How are you?" },
          { sender: "John", text: "I'm good, thanks!" }
      ]
  },
  contact3: {
      name: "Contact 3",
      messages: [
          { sender: "Contact 3", text: "Let's catch up soon." },
          { sender: "John", text: "Absolutely!" }
      ]
  }
};

// Function to open chat window
function openChat(chatId) {
  // Get the chat data based on the chatId
  const chat = chatData[chatId];

  // Update the chat header
  const chatHeader = document.querySelector('.user-info h2');
  chatHeader.textContent = chat.name;

  // Clear previous messages
  const messagesContainer = document.getElementById('messages');
  messagesContainer.innerHTML = '';

  // Display the messages for the selected chat
  chat.messages.forEach(message => {
      const messageElement = document.createElement('div');
      messageElement.textContent = `${message.sender}: ${message.text}`;
      messagesContainer.appendChild(messageElement);
  });
}

// Add event listeners to chat links
document.querySelectorAll('.chat-link').forEach(link => {
  link.addEventListener('click', e => {
      e.preventDefault(); // Prevent default link behavior
      const chatId = link.dataset.chat; // Get the chat ID from data attribute
      openChat(chatId); // Call the function to open the chat
  });
});