export default {
  $container:null,
  imgs: [],
  toLoad: [],
  loaded: 0,
  load: function ($container, callback) {
    this.$container = $container
    this.callback = callback
    this.imgs = Array.from(this.$container.querySelectorAll('img, *[data-src]')),

    this.imgs.map( img => {
      let image = new Image()
      image.onload = this.onLoad.bind(this)
      image.onerror = this.onLoad.bind(this)
      image.src = img.src || img.dataset.src
      this.toLoad.push(image)
    })
  },

  onLoad: function() {
    this.loaded++

    const percent = this.loaded / this.toLoad.length * 100
    if(percent >= 100) {
      if(typeof this.callback == 'function') this.callback()
    }
  },
}