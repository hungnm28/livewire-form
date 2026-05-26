function toggleAside() {
    document.body.toggleAttribute('data-show-aside');
}

function closeAside() {
    document.body.removeAttribute('data-show-aside');
}

const tootleAside = toggleAside;

export { toggleAside, tootleAside, closeAside };
