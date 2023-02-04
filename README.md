<p align="center">
  <a href="https://github.com/JavierMantecon/country_checker_kata">
    <img alt="World composed of countries" src="https://freesvg.org/img/World-Flags-Globe.png" width="200px" height="200pxpx"/>
  </a>
</p>

<p align="center">A country REST API which checks certain criterias giving a certain amount of data</p>

## Usage with Docker

Just run from the root directory of the project:

```
docker-compose up -d
```

Then go to `http://localhost:8080/health-check` to check all is ok.


## Configuration

You can modify and add environment variables to the .env file at root directory for deploying docker containers.\
Obviously **DON'T commit your .env** file to your repository with production credentials. It has been made with academic purposes  

Currently there are only a few variables such as PROJECT_NAME, PHP_PORT, NGINX_PORT.If you want to costumize configuration, you must change it accordingly with the values of **/etc/infraestructure** files.

**TODO:** The project should run without the needing of composer in local machine.

