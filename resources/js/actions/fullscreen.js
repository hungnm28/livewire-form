function toggleFullscreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
}

function setupFullscreenWatcher() {
    document.addEventListener('fullscreenchange', () => {
        const isFullscreen = !!document.fullscreenElement;
        const label = document.getElementById('fullscreenLabel');
        const icon = document.getElementById('fullscreenIcon');

        if (label) {
            label.textContent = isFullscreen ? 'Thoát toàn màn hình' : 'Toàn màn hình';
        }

        if (icon) {
            icon.classList.toggle('rotate-180', isFullscreen);
        }
    });
}

export { toggleFullscreen, setupFullscreenWatcher };
