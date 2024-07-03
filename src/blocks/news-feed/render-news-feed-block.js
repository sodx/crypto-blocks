import { useEffect, useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import { __ } from '@wordpress/i18n';
import Article from '../../components/article';

const RenderNewsFeedBlock = ( { numberOfPosts } ) => {
    const [ posts, setPosts ] = useState( [] );

    useEffect( () => {
        apiFetch( {
            path: `/wp/v2/crypto_news?per_page=${ numberOfPosts }`,
        } )
            .then( ( data ) => {
                setPosts( data );
            } )
            .catch( ( err ) => {
                console.error( 'Error fetching posts:', err );
            } );
    }, [ numberOfPosts ] );

    return (
        <section>
            { posts.length === 0 && (
                <p>{ __( 'No posts found', 'my-plugin' ) }</p>
            ) }
            { posts.map( ( post ) => (
                <Article post={ post } key={ post.id } />
            ) ) }
        </section>
    );
};

export default RenderNewsFeedBlock;
