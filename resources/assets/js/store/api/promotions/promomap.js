export default {
  getLocations(params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/locations?lat=1&lng=1&radius=100&category=1`, { params }).then(res => {
        resolve(res)
      })
    })
  }
}
