## Archistar Test

This test requires the following artisan commands to be run:
- $ ./artisan migrate
- $ ./artisan test

## $ ./artisan migrate

The following tables are created:
- properties - seeded with data from spreadsheet
- analytics_types - seeded with data from spreadsheet
- property_analytics - seeded with data from spreadsheet
- property_suburb_report - CreatePropertySuburbReports job is dispatched and generated report data is saved.

## $ ./artisan test

The following tests are run:
- Tests\Feature\PropertyTest
- Tests\Unit\PropertyTest

## Tests\Feature\PropertyTest

- testAddProperty() - this posts data to the /api/properties/add api endpoint to add a property, and then dispatches the CreatePropertySuburbReport job for this specific suburb
- testAddPropertyFails() - this posts invalid data to the /api/properties/add api endpoint
- testAddEditPropertyAnalytic() - this posts data to the /api/properties/analytic/add to add or edit a property analytic, and  then dispatches the CreatePropertySuburbReport job for this specific suburb
- testAddEditPropertyAnalyticFails() - this posts invalid data to the /api/properties/analytic/add

## Tests\Unit\PropertyTest

- testCreateSuburbReport() - this tests that the object returned from PropertyRepository getCreateSuburbReport() function is an instance of PropertySuburbReport 

## API Endpoints

These are the additional api endpoints:

- properties/property-summary/{guid} - retrieves and displays the property and property analytics data from the database
- properties/suburb-summary/{suburb} - retrieves and displays the suburb summary from cache if exists, or else from the database
- properties/state-summary/{state} - retrieves and displays the state summary from cache if exists, or else from the database
- properties/country-summary/{country} - retrieves and displays the country summary from cache if exists, or else from the database

## Jobs

- CreatePropertySuburbReports - retrieves all distinct suburbs from the database and foreach suburb dispatches the CreatePropertySuburbReport job
- CreatePropertySuburbReport - generates and saves summary report data for the suburb the caches the data for its suburb, state and country
