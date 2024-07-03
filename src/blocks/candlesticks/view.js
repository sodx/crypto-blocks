import { render } from '@wordpress/element';
import Candlestick from '../../components/candlestick';

document.addEventListener( 'DOMContentLoaded', function () {
    const charts = document.querySelectorAll( '.candlestick-chart' );

    charts.forEach( ( chart ) => {
        const source = chart.getAttribute( 'data-source' );
        const pair = chart.getAttribute( 'data-pair' );
        const interval = chart.getAttribute( 'data-interval' );

        render( <Candlestick params={ { source, pair, interval } } />, chart );
    } );
} );
