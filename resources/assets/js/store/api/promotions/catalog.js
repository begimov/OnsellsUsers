export default {
  getPromotions(params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/promotions`, { params }).then(res => {
        resolve(res)
      })
    })
  }
}
