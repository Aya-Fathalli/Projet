document.getElementById("registrationForm").addEventListener("submit", function(event) {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;

    // Check if passwords match
    if (password !== confirm_password) {
        alert("Les mots de passe ne correspondent pas");
        event.preventDefault(); // Prevent form submission
        return; // Exit the function
    }

    // Check if name fields contain only letters
    if (!isAlphabetic(nom) || !isAlphabetic(prenom)) {
        alert("Le nom et le prénom ne doivent contenir que des lettres");
        event.preventDefault(); // Prevent form submission
    }
});

function isAlphabetic(str) {
    return /^[a-zA-ZÀ-ÿ\-]+$/.test(str);
}
S