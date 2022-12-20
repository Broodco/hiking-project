let notification_transition_handler = (panel) => {
    setTimeout(() => {
        panel.classList.add('notification-enter');
        setTimeout(() => {
            panel.classList.remove('notification-enter');
            panel.classList.add('notification-leave');
            setTimeout(() => {
                panel.classList.add('hidden');
            }, 100)
        }, 5000)
    }, 300);

    panel.addEventListener('click', () => {
        panel.classList.remove('notification-enter');
        panel.classList.add('notification-leave');
        setTimeout(() => {
            panel.classList.add('hidden');
        }, 100)
    });
}

let notification_panel = document.querySelector('#notification-panel');

if (!!notification_panel) {
    notification_transition_handler(notification_panel);
}
