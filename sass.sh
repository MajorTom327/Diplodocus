#!/bin/zsh
while :
do
	sleep 1
	./node_modules/.bin/node-sass --output-style compressed src/assets/scss/main.scss > src/assets/css/main.css
done
