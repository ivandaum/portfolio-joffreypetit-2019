import Highway from '@dogstudio/highway'
import anime from 'animejs'

const TRANSLATE_X = 250
const DURATION = 500
export default class SingleRenderer extends Highway.Renderer {
  onEnter() { 
    this.imgs = Array.from(document.querySelectorAll('.project-content__group-picture img'))
    this.navArrow = Array.from(document.querySelectorAll('.project-content__navigation button'))
    this.galeries = Array.from(document.querySelectorAll('.project-content__group-picture'))
    this.currentGalery = 0

    this.imgs.map( img => {
      img.addEventListener('mouseenter', () => {
        this.imgs.map( i => i.style.zIndex = 1)
        img.style.zIndex = 10
      })
    })

    this.navArrow.map( arrow => {
      arrow.addEventListener('click', () => this.nextGalery(parseInt(arrow.dataset.direction)))
    })
  }

  nextGalery(direction) {
    let nextGaleryIndex = this.currentGalery + direction

    if(nextGaleryIndex < 0) nextGaleryIndex = this.galeries.length - 1
    if(nextGaleryIndex > this.galeries.length - 1) nextGaleryIndex = 0

    this.hideGalery(this.currentGalery, direction)
    this.showGalery(nextGaleryIndex, direction)
  }

  showGalery(index, from) {
    let galery = this.galeries[index]
    let translate = from * TRANSLATE_X
    anime({
      targets: galery,
      translateX: [`${translate}px`,0],
      opacity: [0,1],
      duration:DURATION,
      easing:'easeOutExpo',
      complete: () => galery.style.zIndex = 10,
    })

    this.currentGalery = index
  }

  hideGalery(index, to) {
    let galery = this.galeries[index]
    let translate = to * TRANSLATE_X
    anime({
      targets: galery,
      translateX: [0,`-${translate}px`],
      opacity: [1,0],
      duration:DURATION,
      easing:'easeOutExpo',
      complete: () => galery.style.zIndex = 3,
    })
  }

  onLeave() {
    
  }
  onEnterCompleted() {
    
  }
  onLeaveCompleted() {
    
  }
}