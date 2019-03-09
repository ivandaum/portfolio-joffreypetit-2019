/* eslint-disable */
import './polyfill/array-from'
import './polyfill/remove'
import Highway from '@dogstudio/highway';
import HomeRenderer from './renderer/home'
import PageRenderer from './renderer/page'
import SingleRenderer from './renderer/single'
import DefaultTransition from './transition/default';
// import HomeTransition from './transition/home';
// import SingleTransition from './transition/single';
import Loader from './loader/Loader'

document.addEventListener('DOMContentLoaded', () => {
  Loader.load( document.body, () => new Highway.Core({
    renderers: {
      home: HomeRenderer,
      page: PageRenderer,
      single: SingleRenderer,
    },
    transitions: {
      default: DefaultTransition,
      // home: HomeTransition,
      // single: SingleTransition,
    }
  }))
})
