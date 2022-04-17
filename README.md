# Test task for LSI Software

# Notes
Normally I would add node_modules directory to .gitignore, however I decided to make an exception in this case for convenience purposes.
There's also a little mess in commits - I accidentally removed migrations directory at some point :).

The task took me about 5.5 hours to complete. Final tests, bug fixes and description took 1 more hour.

# Setup
1. In project root run:
```
composer install
```
2. Create a new postgresql database and modify .env file with your connection credentials
3. Update database schema:
```
php bin/console doctrine:schema:update --force
```
4. Load test data into database:
```
php bin/console doctrine:fixtures:load
```
5. Launch application:
```
symfony server:start
```
      
# Possible improvements

1. Replace html form with symfony form class
2. Create a separate entity for lokals
3. Make dates random generation within specified limits
4. Add locales for different languages + localize months in jquery datepicker
