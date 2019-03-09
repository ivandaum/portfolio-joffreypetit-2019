import Highway from '@dogstudio/highway'

export default class DefaultTransition extends Highway.Transition {

  in({ from, to, done }) {
    from.remove()
    to.style.opacity = 1
    to.style.transform = 'translateY(0)'
    done()
  }

  out({ from, done }) {
    from.style.opacity = 0
    from.style.transform = 'translateY(50px)'
    done()
  }
}
