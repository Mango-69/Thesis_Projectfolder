let page = 1; // Track the current page

// Function to load more content
function loadMoreContent() {
    const contentDiv = document.getElementById('content');

    // Simulate fetching new content
    for (let i = 0; i < 5; i++) {
        const newParagraph = document.createElement('p');
        newParagraph.textContent = `This is paragraph ${((page - 1) * 5) + (i + 1)}.`;
        contentDiv.appendChild(newParagraph);
    }

    page++;
}

// Load initial content
loadMoreContent();

// Infinite scroll event
window.addEventListener('scroll', () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
        loadMoreContent();
    }
});