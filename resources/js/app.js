import 'bootstrap';

import jQuery from 'jquery';
import sweetalert2 from 'sweetalert2'
import Popper from 'popper.js/dist/umd/popper.js';
import until from 'util';

window.$ = jQuery;
window.$.ajaxSetup({
    headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});
window.$wal = sweetalert2;
window.Popper = Popper;
