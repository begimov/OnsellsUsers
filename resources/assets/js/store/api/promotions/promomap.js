export default {
  getLocations(data) {
    return new Promise((resolve, reject) => {
      axios.get(`/webapi/locations`, {
        params: {
          radius: data.radius,
          lat: data.center.lat,
          lng: data.center.lng,
          category: 0,
          searchQuery: data.searchQuery
        }
      }).then(res => {
        resolve(res)
      })
    })
  }
}
