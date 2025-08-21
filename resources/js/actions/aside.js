function tootleAside(){
    document.body.toggleAttribute('data-show-aside');
}

function closeAside(){
    document.body.removeAttribute('data-show-aside');
}

export {tootleAside,closeAside}
