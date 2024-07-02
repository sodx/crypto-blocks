import { useBlockProps } from '@wordpress/block-editor';

const Save = ( { attributes } ) => {
    const { source, pair, interval } = attributes;
    return (
        <div { ...useBlockProps.save() }>
            <div
                className="candlestick-chart"
                data-source={ source }
                data-pair={ pair }
                data-interval={ interval }
            ></div>
        </div>
    );
};

export default Save;
