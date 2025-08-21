import { cycleTheme, setupThemeWatcher } from './actions/theme';
import { toggleFullscreen, setupFullscreenWatcher } from './actions/fullscreen';
import { tootleAside,closeAside } from './actions/aside';

// Gắn xử lý hành vi theo data-action
document.addEventListener('DOMContentLoaded', () => {
    setupThemeWatcher();
    setupFullscreenWatcher();
    document.body.addEventListener('click', (e) => {
        const action = e.target.closest('[data-action]')?.dataset.action;
        if (!action) return;
        console.log(action)
        switch (action) {
            case 'toggleAside':
                tootleAside();
                break;
            case 'closeAside':
                closeAside();
                break;
            case 'toggleFullscreen':
                toggleFullscreen();
                break;
            case 'cycleTheme':
                cycleTheme();
                break;
        }
    });
});
