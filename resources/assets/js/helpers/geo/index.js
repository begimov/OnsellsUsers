export default {
    distance (p1, p2) {
        const R = 6371e3;
        const ps1 = this.toRadians(p1.lat);
        const ps2 = this.toRadians(p2.lat);
        const dp = this.toRadians(p2.lat - p1.lat);
        const dl = this.toRadians(p2.lng - p1.lng);

        const a = Math.sin(dp / 2) * Math.sin(dp / 2) +
            Math.cos(ps1) * Math.cos(ps2) *
            Math.sin(dl / 2) * Math.sin(dl / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

        return R * c;
    },
    toRadians (ang) {
        return (Math.PI * ang) / 180
    }
}
