# Symfony UX DataTable

Hey thanks to be here, this repo is to show you a small POC for a new dataTable Symfony UX component. 
So feel free to open a PR or an issue to improve or tell me what you think about it.


# Installation

requirements: make sure to have php8 installed locally

- clone the project
- composer install
- yarn install
- docker-compose up (this is just for the db)
- symfony console doctrine:migration:migrate
- symfony console doctrine:fixtures:load

Here we are in the / you should see a beautiful table!

# How does it's work

In your controller:
```php

 $table = $this->dataTableBuilder
            ->setColumns(['id', 'firstName', 'lastName', 'age'])
            ->setProvider(UserTableProvider::class)
            ->setPageSize(5)
            ->withPagination(true)
            ->getDataTable()
        ;

 return $this->render('index.html.twig', [
        'table' => $table,
 ]);

```

In your template:
```php
{{ dataTable(table) }}
```

And just like that, you have a working table with pagination filled by users from your Database.

But you can do even simpler and create this table directly into your template
```html
  {{ component('dataTable', {column: [...], data: [...]})
```

#What's next

This is just a small POC but there are a lot of cool features to add:
- Dynamic Column
- Caching Pagination Page
- Event on the front and on the back
- options to add class on the table tr td...
And more...

PS: if there are no tests it's because I am still in the reflection step
