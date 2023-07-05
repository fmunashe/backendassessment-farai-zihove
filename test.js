const prompts = require('prompts');
const replace = require('replace-in-file');
var shell = require('shelljs');

const { stdout, stderr, code } = shell.exec('docker exec app wp core download --path=wp', { silent: false });