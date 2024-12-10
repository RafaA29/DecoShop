function animateCard(card) {
    card.style.transform = "scale(1.05)";
    card.style.boxShadow = "0 8px 20px rgba(0, 0, 0, 0.2)";
}

function resetCard(card) {
    card.style.transform = "scale(1)";
    card.style.boxShadow = "0 4px 10px rgba(0, 0, 0, 0.1)";
}
