import { loadFontAwesome } from './fontawesome.js';
import {
  HeaderNav,
  HeaderNavPillAnimation,
} from '../components/organisms/header-nav/header-nav.js';
import { FrogHead } from '../components/organisms/frog-head/frog-head.js';
import { Footer } from '../components/organisms/footer/footer.js';

// Essential tools linking
loadFontAwesome();

// Essential page elements rendering
document.querySelector('#header-nav').innerHTML = HeaderNav();
HeaderNavPillAnimation();
document.querySelector('#frog-head').innerHTML = FrogHead();
document.querySelector('#footer').innerHTML = Footer();
