<p align="center">
  <a href="https://github.com/JavierMantecon/country_checker_kata">
    <img alt="World composed of countries" src="https://freesvg.org/img/World-Flags-Globe.png" width="200px" height="200pxpx"/>
  </a>
</p>

<p align="center">A country REST API which checks certain criterias giving a certain amount of data</p>

## Getting started

Just run from the root directory of the project, after renaming the "**.env.example**" file to "**.env**"

1. Dependencies installation
```
composer install
```
2. Deploy docker containers locally. All the project necessary contents will be shared with containers through the volumes defined by compose.yml
```
docker-compose up -d
```

Then go to `http://localhost:8080/health-check` to check all is ok.


## Configuration

You can modify and add environment variables to the .env file at root directory for deploying docker containers.

Currently there are only a few variables such as PROJECT_NAME, PHP_PORT, NGINX_PORT. If you want to costumize configuration, you must change it accordingly with the values of **/etc/infraestructure** files.



## Usage

It is only needed to consume the url from below with a http client like Postman or with your favourite browser.  
```
http://localhost:8080/country-check?code=ES
```
The input code is in ISO 3166-1 alpha-2 format. If there are any errors like introducing a wrong code, it will return an error with HTTP Status 500.  

**TODOs:**
- [ ] The project should run without the needing of composer in local machine. (It seems that is disabled by docker for security reasons)
- [ ] Appropiate error handling with right HTTP Status.
- [ ] Refactoring primitives to Value Objects.
- [X] Acceptance / Functional tests
- [ ] Unit test
