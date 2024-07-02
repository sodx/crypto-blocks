import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import Candlestick from '../../components/candlestick';

const Edit = ( { attributes, setAttributes } ) => {
    const { source, pair, interval } = attributes;

    const params = { source, pair, interval };
    return (
        <div>
            <InspectorControls>
                <PanelBody title="Settings">
                    <SelectControl
                        label="Source"
                        value={ source }
                        options={ [
                            { label: 'OKX', value: 'okx' },
                            { label: 'MEXC', value: 'mexc' },
                            { label: 'Kraken', value: 'kraken' },
                            { label: 'Bybit', value: 'bybit' },
                            { label: 'Kucoin', value: 'kucoin' },
                        ] }
                        onChange={ ( value ) =>
                            setAttributes( { source: value } )
                        }
                    />
                    <SelectControl
                        label="Pair"
                        value={ pair }
                        options={ [
                            { label: 'BTC/USDT', value: 'BTC/USDT' },
                            { label: 'SOL/USDT', value: 'SOL/USDT' },
                            { label: 'ETH/USDT', value: 'ETH/USDT' },
                            { label: 'TON/USDT', value: 'TON/USDT' },
                            { label: 'PEPE/USDT', value: 'PEPE/USDT' },
                        ] }
                        onChange={ ( value ) =>
                            setAttributes( { pair: value } )
                        }
                    />
                    <SelectControl
                        label="Interval"
                        value={ interval }
                        options={ [
                            { label: '1m', value: '1m' },
                            { label: '5m', value: '5m' },
                            { label: '15m', value: '15m' },
                            { label: '30m', value: '30m' },
                            { label: '1h', value: '1h' },
                            { label: '4h', value: '4h' },
                            { label: '1d', value: '1d' },
                        ] }
                        onChange={ ( value ) =>
                            setAttributes( { interval: value } )
                        }
                    />
                </PanelBody>
            </InspectorControls>
            <div>
                <Candlestick params={ params }></Candlestick>
            </div>
        </div>
    );
};

export default Edit;
