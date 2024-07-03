import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import RenderNewsFeedBlock from './render-news-feed-block';

const Edit = ( { attributes, setAttributes } ) => {
    const { numberOfPosts } = attributes;

    return (
        <div { ...useBlockProps() }>
            <InspectorControls>
                <PanelBody title={ __( 'Settings', 'my-plugin' ) }>
                    <RangeControl
                        label={ __( 'Number of Posts', 'my-plugin' ) }
                        value={ numberOfPosts }
                        onChange={ ( value ) =>
                            setAttributes( { numberOfPosts: value } )
                        }
                        min={ 1 }
                        max={ 20 }
                    />
                </PanelBody>
            </InspectorControls>
            <RenderNewsFeedBlock numberOfPosts={ numberOfPosts } />
        </div>
    );
};

export default Edit;
