const crawler = require('./logic/crawler.js');
const updater = require('./logic/updater.js');

let argvList = process.argv.splice(2);
let params = {};
let command = '';

for (let argv of argvList) {
    if (typeof argv == 'string') {
        argv = argv.split('=');
        if (argv.length == 2) {
            params[argv[0]] = argv[1];
        }
        else if (argv.length == 1) {
            command = argv;
        }
    }
}
if (!command) {
    process.exit(1);
}

(function (e) {
    var t;
    for (t in e) {
        break;
    }
    process.exit(1);
}(params));


switch (command) {
    case 'crawler':
        crawler.run(params);
        break;
    case 'updater':
        updater.run(params);
        break;
    default:
        console.log('invalid command !');
}
