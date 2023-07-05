const prompts = require('prompts');
const replace = require('replace-in-file');
var shell = require('shelljs');

(async () => {
    const project = await prompts([
        {
            type: 'select',
            name: 'value',
            message: 'What project would you like to setup?',
            choices: [
                { title: 'WordPress', value: '/var/www/wp' },
                { title: 'Laravel', value: '/var/www/laravel/public' },
                { title: 'SimeplePHP', value: '/var/www/web' },
                { title: 'Vue', value: '/var/www/vue' },
                { title: 'React', value: '/var/www/react' },
            ],
        }
    ]);
    //console.log(project);
    
    const setup = await prompts([
        {
            type: 'select',
            name: 'value',
            message: 'Setup new or existing project?',
            choices: [
                { title: 'New', value: 'new' },
                { title: 'Existing', value: 'existing' }
            ],
        }
    ]);
    //console.log(setup);

    // Find out the Nginx path to set
    const path = await prompts({
        type: 'text',
        name: 'value',
        message: 'What would you like to set the path to?',
        initial: project.value,
        validate: value => (value === "") ? `Enter a root path:` : true
    });
    //console.log(path);
    
    const stringToReplace = new RegExp('root(.*)', 'i');
    const options = {
        files: 'nginx/conf.d/app.conf',
        from: stringToReplace,
        to: 'root ' + path.value + ';',
    };
    
    try {
        const results = await replace(options)
        //console.log('Replacement results:', results);        
    }
    catch (error) {
        //console.error('Error occurred:', error);
    }
    
    //shell.exec('npm run docker:launch');   
    const { stdout, stderr, code } = shell.exec('npm run docker:launch', { silent: false });

    if(setup.value === 'new'){
        if(project.value === '/var/www/wp'){
            const install = await prompts({
                type: 'text',
                name: 'value',
                message: 'Would you like to setup a fresh wp install?',
                initial: 'yes'
            });
            if (install.value === 'yes'){
                shell.exec('npm run setup:wp', { silent: false })
            }
        }
    }
})();