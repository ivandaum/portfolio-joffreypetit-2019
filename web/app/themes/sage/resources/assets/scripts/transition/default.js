import Highway from '@dogstudio/highway'

export default class DefaultTransition extends Highway.Transition {

  in({ from, to, done }) {
    from.remove()
    to.style.opacity = 1
    done()
  }

  out({ from, done }) {
    from.style.opacity = 0
    done()
  }
}
