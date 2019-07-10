import Highway from '@dogstudio/highway'
// import anime from 'animejs';
// import Loader from '../loader/Loader'

export default class HomeTransition extends Highway.Transition {

  in({ from, to, done }) {
    from.remove()
    
    // to.style.opacity = 1
    
    // let projects = document.querySelectorAll('.projects-content__project')
    // let width = projects[0].offsetWidth * projects.length
    // anime({
    //   targets: '.projects-content__project',
    //   translateX: ['-100%',0],
    //   opacity:[0,1],
    //   duration: 1000,
    //   delay:500,
    //   easing:'easeOutQuart',
    // })

    done()
  }

  out({ from, done }) {
    // from.style.opacity = 0
    // anime({
    //   targets: from,
    //   translateY: [0,'300px'],
    //   opacity:[1,0],
    //   duration: 500,
    //   easing:'easeOutQuart',
    // })
    done()
  }
}
