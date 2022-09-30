const logout = document.querySelector('logoutBtn');
if (logout) {
    logout.addEventListener('click', (e) => {
        e.preventDefault();
        const form = document.getElementById('logoutForm').submit();
    });
}