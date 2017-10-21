export default {
  getLocations(radius) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/locations`, {
        params: {
          radius,
          lat: 59.9307772,
          lng: 30.3276762,
          category: 0
        }
      }).then(res => {
        resolve(res)
      })
    })
  }
}
