import { __ } from '@wordpress/i18n';

const Article = ( { post } ) => {
    return (
        <article className="news-post" key={ post.id }>
            <header>
                <h3>{ post.title.rendered }</h3>
            </header>
            <div>
                <p
                    dangerouslySetInnerHTML={ {
                        __html: post?.crypto_news_summary,
                    } }
                />
            </div>
            <footer>
                <p>
                    { __( 'Sentiment Score', 'crypto-blocks' ) }{ ' ' }
                    { post?.crypto_news_sentiment }
                </p>
                <a
                    href={ post?.crypto_news_link }
                    target="_blank"
                    rel="noreferrer"
                    aria-label={
                        __( 'Read more about', 'crypto-blocks' ) +
                        ' ' +
                        post.title.rendered
                    }
                >
                    { __( 'Read More', 'crypto-blocks' ) }
                </a>
            </footer>
        </article>
    );
};

export default Article;
