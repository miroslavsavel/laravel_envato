# začnem týmito dvoma
https://www.parthpatel.net/laravel-tutorial-for-beginner/
https://www.youtube.com/watch?v=AGE3wRKljkw

a nasledne
https://www.youtube.com/watch?v=wDCY277XBh8

instalacia composer 6:29 vtedy sa spristupni command laravel
je mozna aj instalacia docker


Place ~/.composer/vendor/bin directory path in your environment variable PATH

nainstalujem laravel:
composer global require “laravel/installer”


Once installed, you can create project simply by

Going to desired folder
Shift + right click and select Open command prompt here
Execute -- laravel new projectname

teraz 
cd todo

composer install

php artisan key:generate
//vygenerovat nejake kluce pre aplikaciu??

php artisan serve
//spusti beziacu instanciu

kedze sme vytvorili uz laravel project, ideme nainstalovat auth modul

composer require laravel/jetstream
php artisan jetstream:install livewire

nainstalujem nodejs ktoreho sucastou je aj npm

npm install && npm run dev

toto ked idem cez proxy tak to zamrzne na 
\ idealTree:todo: sill idealTree buildDeps

idem cez dirty

--tu sa asi nieco dogabalo

# robim teraz video tutorial
https://www.youtube.com/watch?v=AGE3wRKljkw

subor web.php kde su vymenovane routy, tu som vpisal nove

php artisan make:controller HomeControler

# introducing layouts
vytvorim layout.blade.php
vlozim sem cely obsah about.blade.php

do layutu vlozim sekciu script, tento javascript chcem aby sa objavil iba na contact stranke

# working with static resources
/public/
vytvorim folder css
a v nom subor site.css

do tohto suboru vyberiem obsah style navigation v layout.blade.php
1:00:33 url function
url()

# generating url 
route() function
pomenujeme si jednotlive routes v subore web.php
a potom layout.blade.php si zmenim odkazy v navigacii

# organizing views
php artisan make:controller GuitarsController --resource
vytvori v zlozke HTTP/Controllers novy kontroler

resource - single type of data
CRUD methods for resource

here is resource guitar, resp. information about guitar

pozriem si vsetky CRUD metody, idem vytvorit view pre index metodu

v zlozke Views vytvorim priecinky podla controllerov, v tomto pripade guitars

v guitars controller musime zmenit index na guitars.index, lebo inak by vratilo hlavnu stranku
pridame routes v subore web.php

# blade directives
pracujeme iba so statickymi datami teraz

# showing and linking data
id = unique identifier ako parameter metody show
pracujeme v GuitarsController

vytvorim novy view v zlozke guitars s nazvom show.blade.php

upravim aj index.blade.php aby nazov gitary obsahoval hypertextovy odkaz

Missing required parameter for [Route: guitars.show] [URI: guitars/{guitar}] [Missing parameter: guitar]. (View:
- toto mi hovori, ze metoda show ma este dalsi parameter
zmenime teda v guitarscontrollery nazov parametru metody show z id na guitars

a nasledne upravime index.blade.php z <a href="{{route('guitars.show')}}">{{$guitar['name']}}</a>
na:
<a href="{{route('guitars.show', ['guitar' => $guitar['id']])}}">{{$guitar['name']}}</a>

???? route metoda

# Setting up the database
open .env file
create DB for this starter project called laravel_envato
now it is empty, but we will use artisan to generate tables

# creating migrations and models
migration ´=production tool, rollback changes in DB

creating migration
creating model ´this is the code that interact and works with data
php artisan make:migration --help
the name for model is Guitar = it is convention
//

php artisan make:model Guitar --migration

//inside the folder database/migrations  is created new migration
in the new file, we can define how should our table looks like
>> check documentation for avaible methods

before we run our migration look at our model
/app/Models/Guitar.php

php artisan migrate
//this will run all the migrations
//it will create tables in mysql DB as it was set in the .env file
// only the structure of database is made, without data of course

# Saving database records
we will implement create method in GuitarController

create creat.blade.php and paste html tags for form

>>also add css for the form into folder public/css/site.css
add use App\Model\Guitar;  into GuitarsController

next we are going to crrate a new instance of guitar -> implement method store in GuitarsController

# validating user input
add function strip_tags() into the GuitarsController store method
validate()

in the create.blade.php
add error output for displaying when user provide bad input
@error('year')
            <div class="form-error">
                {{$message}}
            </div>
        @enderror

we also edit css - site.css because we want red font for error

now when we enter only invalid year, we lost other right values - solution
special function that will get us old value fot that field
old()
create.blade.php

# Updating data
here we will be working on guitarscontroller.php

start with show method because it shows hardcoded data

for edit method we want display different view
edit view will be clone of create view
here we can use array syntax for value -> value="{{ $guitar['name]}}
but here we use object reference 
so replace the old() function

we have to change also route 
<form class="form bg-white p-6 border-1" method="POST" action="{{ route('guitars.update')}}">
and supply parameter what will be changed


# using type hints and requests classes
- removing duplicates from code, method findOrFail is used at theree places
Typehinting
type hint for parameter
https://stackoverflow.com/questions/37864772/can-someone-give-me-a-definition-of-type-hinting-for-laravel-5-framework

//try to debug this, look for update method parameter $guitar, it is object?

2:10:00
we can build our custom request used for handling guitar form requests

php artisan make:request GuitarFormRequest
this creates a new class for reauest, and we dont have to use strip function, but do validation in our new class for request
-> it cerates new folder inside app/http/Requests folder

change authorize() method to return true, 

we also implements another method inside GuitarFormRequest class
prepareForValidation(){ this will strip tml tags from our request

now we have to only import class into controller

difference between validate and validated method

we will alter the store and the update method

