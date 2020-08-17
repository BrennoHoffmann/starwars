const path = require('path')
const src = path.resolve(__dirname, '../resources');
const build = path.resolve(__dirname, '../dist');

module.exports = {
    src: src,
    build: build,
    entries: {
        'main': src + '/js/main.js'
    },
    filesToCopy: [
        {
            from: src + '/img',
            to: 'img',
            ignore: ['*.DS_Store'],
            cache: true
        }
    ]
}

