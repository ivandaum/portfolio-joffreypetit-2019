import Highway from '@dogstudio/highway'

export default class extends Highway.Renderer {

  onEnter() { 
    document.body.classList.add('page')
  }
  onLeave() {
    document.body.classList.remove('page')
  }
  onEnterCompleted() {
    
  }
  onLeaveCompleted() {
    
  }
}