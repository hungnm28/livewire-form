import { cycleTheme, setupThemeWatcher } from './actions/theme';
import { toggleFullscreen, setupFullscreenWatcher } from './actions/fullscreen';
import { toggleAside, closeAside } from './actions/aside';

document.addEventListener('DOMContentLoaded', () => {
    setupThemeWatcher();
    setupFullscreenWatcher();

    document.body.addEventListener('click', (e) => {
        const action = e.target.closest('[data-action]')?.dataset.action;
        if (!action) return;

        switch (action) {
            case 'toggleAside':
                toggleAside();
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
