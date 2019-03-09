import Highway from '@dogstudio/highway'
// import anime from 'animejs';
// import Loader from '../loader/Loader'

export default class HomeTransition extends Highway.Transition {

  in({ from, to, done }) {
    from.remove()
    to.style.opacity = 1

    done()
  }

  out({ from, done }) {
    from.style.opacity = 0
    done()
    // anime({
    //   targets:from,
    //   opacity:[1,0],
    //   transformY:[0,'100px'],
    //   complete: () => done(),
    // })
  }
}
