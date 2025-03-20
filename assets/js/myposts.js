function showSection(sectionId) {
    const sections = ['my-posts', 'my-likes', 'my-friends', 'favourites'];
    sections.forEach(id => {
        document.getElementById(id).classList.add('hidden');
    });
    document.getElementById(sectionId).classList.remove('hidden');
}