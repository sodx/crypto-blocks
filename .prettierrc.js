module.exports = {
    ...require( '@wordpress/prettier-config' ),
    useTabs: false,
    overrides: [
        {
            files: [ '*.json', '*.yml' ],
            options: {
                tabWidth: 2,
            },
        }
    ],
};
