new Vue({
    el: '#app',
    methods: {
        login() {
            location.href = '/dashboard';
        },

        newTicket() {
            location.href = '/newticket';
        },

        ticketDetails(id) {
            location.href = '/ticket/' + id;
        },
    }
});