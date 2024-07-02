import ccxt from 'ccxt';

export async function getCryptoData( source, pair, interval ) {
    const exchange = new ccxt[ source ]();
    return await exchange.fetchOHLCV( pair, interval, null, 100 );
}
