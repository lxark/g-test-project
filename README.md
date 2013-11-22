g-test-project
==============

Test project for a client

Installation
------------

For Debian based:


1. Clone recursively to fetch symfony 1.4 as well

```
git clone --recursive
```

2. Create a database manually and configure for your application

```
cp config/databases.yml.dist config/databases.yml
vi config/databases.yml
```



3. Install sfDoctrineGuardPlugin (see http://www.symfony-project.org/plugins/sfDoctrineGuardPlugin)

```
php symfony plugin:install sfDoctrineGuardPlugin
```

4. Insert users test data

```
php symfony doctrine:build --all --and-reload
```

5. Install assets

```
php symfony plugin:publish-assets
```


6. Configure virtual host

7. Configure hosts

```
vi /etc/hosts
```