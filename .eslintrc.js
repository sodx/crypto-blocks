const config = {
    extends: [ 'plugin:@wordpress/eslint-plugin/recommended' ],
    parserOptions: {
        requireConfigFile: false,
        babelOptions: {
            presets: [ require.resolve( '@wordpress/babel-preset-default' ) ],
        },
    },
    env: {
        browser: true,
    },
    ignorePatterns: [ 'build' ],
    rules: {
        indent: [ 'error', 4 ],
    },
};

module.exports = config;
