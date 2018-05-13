## Apache Virtual Host Configuration

```apacheconfig
<VirtualHost iv-registration-form.net:80>
    ServerAdmin igorveremsky@gmail.com
    DocumentRoot "D:/xampp/vhosts/iv-registration-form.net/www"
    ServerName iv-registration-form.net
    ServerAlias iv-registration-form.net
    ErrorLog "D:/xampp/vhosts/iv-registration-form.net/logs/error.log"
    CustomLog "D:/xampp/vhosts/iv-registration-form.net/logs/custom.log" common

   <Directory "D:/xampp/vhosts/iv-registration-form.net/www">
        # AllowOverride All      # Deprecated
        # Order Allow,Deny       # Deprecated
        # Allow from all         # Deprecated

        AllowOverride All
        # --New way of doing it
        Require all granted
    </Directory>
</VirtualHost>
```