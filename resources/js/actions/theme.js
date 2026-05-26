const themeList = ['light', 'dark', 'system'];
const themeIcons = {
    light: '☀',
    dark: '🌙',
    system: '🖥'
};

let theme = localStorage.getItem('theme') || 'system';

function setupThemeSettingStore() {
    document.addEventListener('alpine:init', () => {
        if (!window.Alpine) return;

        Alpine.store('themeSetting', {
            open: false,
            show() {
                this.open = true;
            },
            hide() {
                this.open = false;
            },
            toggle() {
                this.open = !this.open;
            },
        });
    });
}

function applyTheme(themeValue) {
    if (themeValue === 'dark') {
        document.documentElement.classList.add('dark');
    } else if (themeValue === 'light') {
        document.documentElement.classList.remove('dark');
    } else {
        const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        document.documentElement.classList.toggle('dark', isDark);
    }

    const iconEl = document.getElementById('themeToggleIcon');
    if (iconEl) iconEl.textContent = themeIcons[themeValue];
}

function cycleTheme() {
    const currentIndex = themeList.indexOf(theme);
    theme = themeList[(currentIndex + 1) % themeList.length];
    localStorage.setItem('theme', theme);
    applyTheme(theme);
}

function setupThemeWatcher() {
    applyTheme(theme);
    if (theme === 'system') {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            applyTheme('system');
        });
    }
}

export { cycleTheme, setupThemeWatcher, setupThemeSettingStore };
