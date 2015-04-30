OAuth2 Validate
===============

To inject the OAuth2 server into your class in order to verify 
the OAuth2 request is valid, possibly using Scope based permissions,
implement OAuth2ValidateInterface.

Include in your config 
```php
    'service_manager' => array(
        'delegators' => array(
            'ZF\OAuth2\Validate\OAuth2ValidateInterface' => 
                'ZF\OAuth2\Factory\OAuth2ValidateDelegatorFactory',
        ),
    ),    
```
