# symphony-tmbundle

An experiment in creating a Textmate bundle from Symphony 2's code documentation. Nothing more than an experiment to teach myself how to write bundles.

## To build:

1. Get a copy of the API docs and put into the `_docs` folder. [Instructions on running PHPDoctor here](https://github.com/symphonycms/symphony-2/wiki/Creating-API-Documentation)
2. Run create.php
3. Rename `Symphony-tmbundle` to `Symphony.tmbundle` and install it as a bundle

## Usage:

### Create a new extension

1. Right click on your `/extensions` folder in Textmate and create a new directory with the correct name
2. Right click this new folder and select New File. Choose Symphony > Extension Driver and name the file `extension.driver.php`
3. Right click this new folder and select New File. Choose Symphony > Readme and name the file `readme.markdown`

### Delegate shortcuts

When subscribing to delegates in extensions, type `delegate` and you'll get a list of all possible delegates. Not very useful really.