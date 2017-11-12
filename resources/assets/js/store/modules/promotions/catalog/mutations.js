export default {
    updateSearchQuery (state, value) {
        state.searchQuery = value
    },
    updatePromotions (state, promotions) {
        state.promotions = promotions
    },
    setIsDisplayingMiniCards (state, value) {
        state.isDisplayingMiniCards = value
    },
}
