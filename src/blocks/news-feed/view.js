import { render } from '@wordpress/element';
import RenderNewsFeedBlock from './render-news-feed-block';

document.addEventListener( 'DOMContentLoaded', () => {
    const elements = document.querySelectorAll(
        '.wp-block-crypto-blocks-news-feed'
    );
    elements.forEach( ( el ) => {
        const numberOfPosts = el.getAttribute( 'data-number-of-posts' );
        render( <RenderNewsFeedBlock numberOfPosts={ numberOfPosts } />, el );
    } );
} );
