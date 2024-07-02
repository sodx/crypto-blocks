import { useEffect, useState } from '@wordpress/element';
import ReactApexChart from 'react-apexcharts';
import { getCryptoData } from '../utils/getData';
import Spinner from './spinner';

const CandlestickChart = ( { params } ) => {
    const { source, pair, interval } = params;
    const [ chartData, setChartData ] = useState( [] );
    const [ isLoading, setIsLoading ] = useState( true );

    useEffect( () => {
        async function fetchData() {
            setIsLoading( true );
            const ohlcv = await getCryptoData( source, pair, interval );
            const formattedData = ohlcv.map(
                ( [ timestamp, open, high, low, close ] ) => ( {
                    x: new Date( timestamp ),
                    y: [ open, high, low, close ],
                } )
            );
            setChartData( formattedData );
            setIsLoading( false );
        }

        fetchData();
    }, [ source, pair, interval ] );

    const series = [
        {
            data: chartData,
        },
    ];

    const options = {
        chart: {
            type: 'candlestick',
            height: 350,
            toolbar: true,
            zoom: {
                enabled: true,
                autoScaleYaxis: true,
            },
        },
        toolbar: {
            show: true,
            tools: {
                selection: true,
                zoom: true,
                zoomin: true,
            },
        },
        plotOptions: {
            candlestick: {
                colors: {
                    upward: '#34c38f',
                    downward: '#f46a6a',
                },
            },
        },
        xaxis: {
            type: 'datetime',
        },
        yaxis: {
            tooltip: {
                enabled: true,
            },
        },
    };

    return isLoading ? (
        <Spinner />
    ) : (
        <ReactApexChart
            series={ series }
            options={ options }
            type="candlestick"
            height={ 310 }
            id="candlestick-chart"
            className="apex-charts"
        />
    );
};

export default CandlestickChart;
