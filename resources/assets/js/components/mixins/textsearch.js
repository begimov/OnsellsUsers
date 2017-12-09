export default {
    methods: {
        textSearch() {
            clearTimeout(this.timer);
            this.timer = setTimeout(
                function () {
                    this.instaTextSearch();
                }.bind(this),
                1000
            );
        }
    },
}