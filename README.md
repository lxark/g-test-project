g-test-project
==============

Test project for a client

Installation
------------

For Debian based:


Clone recursively to fetch symfony 1.4 as well

```
git clone --recursive
```

Create a database manually and configure for your application

```
cp config/databases.yml.dist config/databases.yml
vi config/databases.yml
```



Install sfDoctrineGuardPlugin (see http://www.symfony-project.org/plugins/sfDoctrineGuardPlugin)
Add admin user as super admin

```
php symfony plugin:install sfDoctrineGuardPlugin
php symfony guard:create-user admin@gtest.com admin admin
php symfony guard:promote admin
php symfony plugin:publish-assets
```


Configure hosts

```
vi /etc/hosts
```