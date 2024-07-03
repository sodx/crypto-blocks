import { useBlockProps } from '@wordpress/block-editor';

const Save = ( { attributes } ) => {
    const { numberOfPosts } = attributes;
    return (
        <div
            { ...useBlockProps.save() }
            data-number-of-posts={ numberOfPosts }
        />
    );
};

export default Save;
