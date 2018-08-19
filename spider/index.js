const controller = require('./logic/controller.js');

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
            command = argv[0];
        }
    }
}
if (!command) {
    console.log('no command!');
    process.exit(0);
}

(function (e) {
    var t;
    for (t in e) {
        return ;
    }
    console.log('no argvs!');
    process.exit(0);
}(params));


switch (command) {
    case 'controller':
        controller.run(params);
        break;
    default:
        console.log('invalid command !');
}
