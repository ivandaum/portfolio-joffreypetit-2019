import Highway from '@dogstudio/highway'
// import Flickity from 'flickity'
import { MOBILE_SIZE } from '../constants'

export default class extends Highway.Renderer {

  onEnter() {
    this.init()
  }

  init() {
    if(window.innerWidth < MOBILE_SIZE) return

    this.onScroll = this.onScroll.bind(this)
    this.render = this.render.bind(this)
    this.onDrag = this.onDrag.bind(this)
    this.onTouchStart = this.onTouchStart.bind(this)
    this.onTouchEnd = this.onTouchEnd.bind(this)

    this.translateX = 0
    this.touchStart = 0
    this.scroll = 0
    this.raf = null
    this.touchStart = false

    this.$container = document.querySelector('.projects-content')
    this.projects = document.querySelectorAll('.projects-content__project')
    this.projectsCount = this.projects.length

    window.addEventListener('wheel', this.onScroll)
    window.addEventListener('touchmove', this.onDrag)
    window.addEventListener('touchstart', this.onTouchStart)
    window.addEventListener('touchend', this.onTouchEnd)

    document.addEventListener('mousedown', this.onTouchStart)
    document.addEventListener('mousemove', this.onDrag)
    document.addEventListener('mouseup', this.onTouchEnd)
    this.render()
  }

  onTouchStart(e) {
    this.touchStart = e.clientX || e.changedTouches[0].clientX
  }
  
  onTouchEnd() {
    this.touchStart = false
    if(document.body.classList.contains('dragging')) {
      document.body.classList.remove('dragging')
    }
  }

  onDrag(e) {

    if(!this.touchStart) return

    if(!document.body.classList.contains('dragging')) {
      document.body.classList.add('dragging')
    }

    let scroll = e.clientX || e.changedTouches[0].clientX
    this.scroll -= (this.touchStart - scroll) * 1.5
    this.touchStart = scroll
  }
  onScroll(e) {
    this.scroll -= e.deltaY
  }

  onLeave() {
    window.removeEventListener('wheel', this.onScroll)
    window.removeEventListener('touchend', this.onDrag)
    window.removeEventListener('touchstart', this.onTouchStart)
    document.removeEventListener('mousedown', this.onTouchStart)
    document.removeEventListener('mousemove', this.onDrag)
    cancelAnimationFrame(this.raf)
  }

  getRealWidth() {
    const margin = parseInt(getComputedStyle(document.querySelector('.projects-content__project')).marginRight)
    const width = this.projects[0].offsetWidth
    return (width + margin) * this.projectsCount
  }
  render() {
    this.raf = requestAnimationFrame(this.render)

    this.translateX += (this.scroll - this.translateX) * 0.3


    if(this.scroll > 0) {
      this.scroll += (0 - this.scroll) * 0.5
    }

    const max = this.getRealWidth() - window.innerWidth + 160
    if(Math.abs(this.scroll) > max) {
      this.scroll += ( -max - this.scroll) * 0.5
    }

    this.$container.style.transform = `translateX(${this.translateX}px)`
  }

  onEnterCompleted() {
    
  }
  onLeaveCompleted() {
    
  }
}