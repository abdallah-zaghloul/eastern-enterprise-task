<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1>Eastern Enterprise Task</h1>

<h2>Live Demo</h2>
<strong>Please watch this video 👇</strong>

[![Live Demo](https://img.youtube.com/vi/ySjCobG8LcI/0.jpg)](https://www.youtube.com/watch?v=ySjCobG8LcI)

<h2>Task Description</h2>

<pre>
<strong>Assignment:</strong>
------------------------------

1) Create a web application which allows users
    to do the following:
   - Create an account.
   - Log into the system and add a company.
     Details which need to be added at least:
     logo, name, description and address.

   - Show the company details on a page accessible
     for non-authenticated users.

   - Also show some company financial details
     as well as their real-time stock value 
      on NASDAQ coming from an open API source
     (use a well-known company for which information
      is widely available).

2) Ensure that we can run the code and see 
   a working application
   (github repo, zip file).

 
<strong>Mandatory requirements:</strong>
------------------------------
1) Use Laravel 10 with liveWire and Tailwind.
   - Other Laravel / composer packages are 
     allowed to be used.

2) Use hexagonal or onion architecture with
   screaming architecture.

3) Test case coverage should be sufficient.

4) Needs to include a readme with installation
    instructions that uses docker.

a) Ideally the installation should be 
   as simple as docker-compose up (or Sail up)

5) Domain driven design approach 
   is a bonus (but please no event sourcing)

Time: 3 days max.
</pre>


<h2>Project Infra Structure</h2>
<ul>
<li>

<pre>The Project is a Decoupled Modular Monolithic
App (more advanced than DDD Domain Driven Design):
</pre>
<pre>
   - HMVC Repository-Service Based Decoupled Modules
     (you can turn on/off each module and
     republish/reuse it at another project)
     with separated/attached dependencies.

    - example (Persona Module):
      composer require zaghloul-soft/persona-module
      it will install it at Modules folder not the
      vendor so you can edit it.

    - if tommorrow you ask me to implement 
      (Food Delivery App) and need to utilize
      the current Persona (admin/user) data
      we can do it easly.
    
    - DDD : doesn't separate dependencies like 
            composer.json , NPM/Vite Depencies
            but this design do.
            the similarities here is 
            Modules/Domains/Packages
            but in this design all decoupled 
            and reusable using package manager.

    - Separated Fron-End Build Modules Dependencies :
      public/persona-build
      public/finance-build
      each one with separated vite config 
       so one can use Bootstrap other can use Tailwind

    - to separate/drop module for microservice purpose
      you will do the following:
 
      php artisan module:disable ModuleName
      php artisan module:enable ModuleName

      to add module dependency to your root project
      php artisan module:update ModuleName

      to run module test separately
      php artisan module:test ModuleName
</pre>
    

<li> Module Structure (Repository Design Pattern)
<p>
<a target="_blank" href="https://drive.google.com/uc?export=view&id=1_CTRCCiZ0X4nG06_xTv48y6MH5vBb1gx">
<img src="https://drive.google.com/uc?export=view&id=1_CTRCCiZ0X4nG06_xTv48y6MH5vBb1gx" width="400" height="200">
</a>
</p>

<li> Separated/Attached Tests
<p>
<a target="_blank" href="https://drive.google.com/uc?export=view&id=11hd7ACMLYU9WcTXBD5Eo_7mOBdM20I6M">
<img src="https://drive.google.com/uc?export=view&id=11hd7ACMLYU9WcTXBD5Eo_7mOBdM20I6M">
</a>
</p>
</ul>

<h2>Solution Implementation</h2>
<strong> Database Choice (PostgreSQL): </strong>
<table>

<th></th>
<th>PostgreSQL</th>
<th>MySQL</th>
<th>MariaDB</th>

<tr>
<td>UUID datatype</td>
<td>Built-in</td>
<td>Not supported</td>
<td>Supported at last version</td>
</tr>

<tr>
<td>JSON datatype</td>
<td>JSONB</td>
<td>JSON</td>
<td>Long Text</td>
</tr>

<tr>
<td>ENUMs</td>
<td>Checks & Enums</td>
<td>Enums</td>
<td>Enums</td>
</tr>

</table>
<pre>
  * PostgreSQL: is the most suitable because of :
  * UUID needed for extra (security - scalability)
  - UUID Support as PK as a built-in datatype instead of :
     * MySQL: deals with it as string or string-to-binary
       conversion <a href="https://forums.mysql.com/read.php?24,700512,700514">Bad Performance</a>
     * MariaDB: support UUID data-type at last version
     * only with no support for JSON
  - JSONB (JSON Binary): support processing on JSON
    and array indexes (if needed later on to store
    some schemaless data like responses/logs)
  - Checks (Check Constrains) : 
    is the best to be used for Scalability because :
    * better than multiple Joins
    * no needs/risks to alter schema as with ENUM
    * <a href="https://making.close.com/posts/native-enums-or-check-constraints-in-postgresql">scalable - more performant</a>
</pre>

<strong> How to Query ?</strong>

- Repository Design Pattern => for complex queries

- skip invalid query params

- query run acc to count of params
   ex : (1 => where, +1 =>whereIn)

- rely on Checks (described above) for well-defined values
   as currency, provider status, providers

- separated Query layer called (Criteria) :
   single responsibility & re-usability & remove tight coupling

- use eloquent builder instead of ORM

- use Joins instead of whereHas('run exists query')

- use cursorPagination (rely on PHP generators):
  can afford large database streaming & avoid memory leak

<strong> Cache Layer</strong>
- cache can be enabled and disabled using the config
- each cached repo implements CacheableInterface
- you can use ready implemented Cache Trait
- redis cache based


<strong>Docker</strong>

- app is dockerized using laravel sail


<strong>Criteria Benefits</strong>
- scalable: you can add any filter at anytime on the same query
- maintainable & re-usable
- fluent builder design pattern for easy chaining
- you can skip it and call another one
- it can be passed from module to another

<strong>Notes</strong>
- I worked on it 1.75 day due I were very busy.
- You don't give me an api source, so I write a
  pseudocode for it at show method service
  like using Guzzle/Guzzle Client which
  accept parallel requests at same time at
  $companyService->show()

<h3>How To Run The Project Locally</h3>
<pre>
Requirements 
(all can be installed automatically using docker desktop):
---------------
- PHP 8.2
- Run Docker Desktop
- PostgreSQL
- SQL lite PHP Extension
- Redis
<hr>
Run the following at the project root dir Terminal
---------------
<ul>
<li>Download Vendor folder
composer install

<li>Make Sail alias
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

<li>Generate .env file from .env.decrypted:
php artisan env:decrypt --key={key}

key here is :
base64:JZA0QmNP7SJ/DmnZGH1QPe7fCkngLYt6ex6sChhtucY=

<li>Laravel Sail install
php artisan sail:install

<li>Run Your local server up:
sail up -d

<li>Run Your local server down:
sail down

<li>To Run Unit/Feature Tests but configure your test
with xdebug 

sail php artisan test --testsuite={Modules or ModuleName}
</ul>

if you have an issue you can see <a href="https://laravel.com/docs/10.x/sail">Laravel Sail</a>
</pre>

