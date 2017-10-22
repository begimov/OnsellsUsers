export default {
  getLocations(circleObj) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/locations`, {
        params: {
          radius: circleObj.radius,
          lat: circleObj.center.lat,
          lng: circleObj.center.lng,
          category: 0
        }
      }).then(res => {
        resolve(res)
      })
    })
  }
}
