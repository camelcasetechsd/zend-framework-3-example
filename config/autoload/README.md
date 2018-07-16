About this directory:
=====================

This application is configured to load all configs in
`./config/autoload/{,*.}{global,{APPLICATION_ENV},local}.php`.

This structure is explained in Zend Framework document here:
https://docs.zendframework.com/tutorials/advanced-config/#environment-specific-application-configuration

Doing this provides a location for a developer to drop in configuration override
files provided by modules, as well as cleanly provide individual,
application-wide config files for things like database connections, etc.
