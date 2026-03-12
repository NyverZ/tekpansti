import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';
import Chart from 'chart.js/auto';

window.Alpine = Alpine;
window.Chart = Chart;
window.safeFoodSkeletonTimeout = (fastMs = 900, slowMs = 2600) => {
    const connection = navigator.connection;
    const effectiveType = connection?.effectiveType;
    const isSlowNetwork = connection?.saveData || ['slow-2g', '2g', '3g'].includes(effectiveType);

    return isSlowNetwork ? slowMs : fastMs;
};

Alpine.start();
