/* eslint-disable */
import './polyfill/array-from'
import './polyfill/remove'
import Highway from '@dogstudio/highway';
import HomeRenderer from './renderer/home'
import DefaultTransition from './transition/default';


document.addEventListener('DOMContentLoaded', () => {
  const H = new Highway.Core ({
    renderers: {
      home: HomeRenderer,
      page: HomeRenderer,
      single: HomeRenderer,
    },
    transitions: {
      default: DefaultTransition
    }
  })
})
