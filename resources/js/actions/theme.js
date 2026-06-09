const themeList = ['light', 'dark', 'system'];
const themeIcons = {
    light: 'ti-sun',
    dark: 'ti-moon',
    system: 'ti-device-desktop'
};
const themeLabels = {
    light: 'Light theme',
    dark: 'Dark theme',
    system: 'System theme'
};

function moduleName() {
    return document.documentElement.dataset.module || document.body.dataset.module || 'admin';
}

function cookieName(name) {
    return `${moduleName()}-${name}`;
}

function getCookie(name) {
    return document.cookie
        .split('; ')
        .find((row) => row.startsWith(`${name}=`))
        ?.split('=')
        .slice(1)
        .join('=') || null;
}

function setCookie(name, value) {
    document.cookie = `${name}=${encodeURIComponent(value)}; max-age=157680000; path=/; samesite=lax`;
}

function defaultTheme() {
    if (document.documentElement.classList.contains('dark')) return 'dark';
    if (document.documentElement.classList.contains('light')) return 'light';

    return 'system';
}

function normalizeTheme(themeValue) {
    return themeList.includes(themeValue) ? themeValue : defaultTheme();
}

let theme = normalizeTheme(decodeURIComponent(getCookie(cookieName('theme')) || defaultTheme()));

function applyTheme(themeValue) {
    if (themeValue === 'dark') {
        document.documentElement.classList.add('dark');
    } else if (themeValue === 'light') {
        document.documentElement.classList.remove('dark');
    } else {
        const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        document.documentElement.classList.toggle('dark', isDark);
    }

    document.querySelectorAll('[data-theme-toggle-icon]').forEach((iconEl) => {
        iconEl.classList.remove(...Object.values(themeIcons));
        iconEl.classList.add(themeIcons[themeValue]);
        iconEl.setAttribute('aria-label', themeLabels[themeValue]);
    });

    document.querySelectorAll('[data-action="cycleTheme"]').forEach((button) => {
        button.setAttribute('title', themeLabels[themeValue]);
        button.setAttribute('aria-label', themeLabels[themeValue]);
    });
}

function cycleTheme() {
    const currentIndex = themeList.indexOf(theme);
    theme = themeList[(currentIndex + 1) % themeList.length];
    setCookie(cookieName('theme'), theme);
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

export { cycleTheme, setupThemeWatcher };
