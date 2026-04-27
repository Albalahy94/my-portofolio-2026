import './bootstrap';
import intersect from '@alpinejs/intersect';
import Swal from 'sweetalert2';

window.Swal = Swal;

// Livewire 3 includes Alpine. 
// We need to register plugins. We handle both cases: if Alpine is already loaded, or if it loads later.
const registerPlugins = () => {
    window.Alpine.plugin(intersect);
};

if (window.Alpine) {
    registerPlugins();
} else {
    document.addEventListener('alpine:init', registerPlugins);
}
