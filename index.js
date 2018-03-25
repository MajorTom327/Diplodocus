const validator = require('html-validator')
const options = {
 url: 'http://localhost:8080',
 format: 'text',
 ignore: 'Error: Stray end tag “div”.'
}

validator(options)
  .then((data) => {
    console.log(data)
  })
  .catch((error) => {
    console.error(error)
  })
