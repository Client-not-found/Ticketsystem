new Vue({
    el: '#app',
    methods: {
        login() {
            location.href = '/dashboard';
        },

        //Ticket Events
        newTicket() {
            location.href = '/newticket';
        },

        ticketDetails(id) {
            location.href = '/ticket/' + id;
        },
        //User Events
        newUser() {
            location.href = '/newuser';
        },

        //Category Events
        newCategory() {
            location.href = '/newcategory';
        },
    }
});