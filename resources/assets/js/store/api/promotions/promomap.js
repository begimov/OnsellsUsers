export default {
  getLocations(params) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/locations?lat=59.9307772&lng=30.3276762&radius=10000&category=0`, { params }).then(res => {
        resolve(res)
      })
    })
  }
}
