# Reproducing a problem of using Actor in Cest DataProvider

## Initial problem
After the PR in [codeception](https://github.com/Codeception/Codeception/pull/6696) we have ability to use Actor in 
Cest tests in data providers. When we attempt to access the module's methods, we encounter the error: Service dispatcher is not defined and can't be accessed from a test.

## Suggestion to solve the problem

- Provide to loader additional data from suite manager: di, dispatcher, modules
- Use them to preconfigure the actor during fetching the data from the data provider
- Draft to solve the problem locates in directory `fix`

## Run sample in Docker
### Install dependencies
```bash
docker-compose run --rm php composer install -v
```

### Run test to reproduce the issue

Run the following commands:
```bash
docker-compose run --rm php composer du -v --no-dev
docker-compose run --rm php ./vendor/bin/codecept run
```

After running the test, you will get the following output:
```
In Metadata.php line 157:
                                                                       
  Service dispatcher is not defined and can't be accessed from a test
```

### Run suggested solution
```bash
docker-compose run --rm php composer du -v
docker-compose run --rm php ./vendor/bin/codecept run
```

