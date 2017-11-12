export default {
    strLimit (str, length) {
        if (!str) return "";
        str = str.toString();
        return length >= str.length ? str : str.substring(0, length) + '...';
    }
}
