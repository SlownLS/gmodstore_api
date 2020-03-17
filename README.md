# GmodStore API
A simple php library for GmodStore API

# Installation 
To install this library use composer

# Wiki

List of collections
  - Users
  - Teams
  - Addons
  - Addon\Coupons
  - Addon\Purchases
  - Addon\Reviews
  - Addon\Stats
  - Addon\Versions
  
## To use collection :

~~~ PHP
use SlownLS\GmodStore\Client;

$gmodstore = new Client("gmodstore_token");

$collection = $gmodstore->GetCollection("Users")
~~~

## Users collection

~~~ PHP
$collection->GetAPIOwner() // Used to retrieve the user from the API
$collection->GetAddons(string steamid64) // Used to retrieve a user's addons
$collection->GetPurchases(string steamid64) // Used to retrieve a user's purchases
$collection->GetTeams(string steamid64) // Used to retrieve the teams of a user
$collection->GetBans(string steamid64) // Used to retrieve a user's banns
$collection->GetBadges(string steamid64) // Used to retrieve a user's badges   
~~~

## Teams collection

~~~ PHP
$collection->GetById(int teamId) // Used to retrieve team information
$collection->GetUsers(int teamId) // Used to retrieve users from a team
~~~

## Addons collection

~~~ PHP
$collection->GetAll() // Use to retrieve user addons
$collection->GetById(int $addonId) // Use to retrieve a specific addon from the user
~~~

## Addons - Coupons collection

~~~ PHP
$collection->GetAll(int $addonId) // Used to retrieve coupons from an addon
$collection->Create(int $addonId, array $params) // Use to add a coupon for an addon
$collection->Update(int $addonId, int $couponId, array $params) // Used to modify a coupon of an addon
$collection->GetById(int $addonId, int $couponId) // Used to retrieve information from a coupon
$collection->Destroy(int $addonId, int $couponId) // Use to delete a coupon
~~~

## Addons - Purchases collection

~~~ PHP
$collection->GetAll(int $addonId) // Used to retrieve the purchases of an addon
$collection->Create(int $addonId, array $params) // Use to create a purchase for an addon
$collection->GetById(int $addonId, int $purchaseId) // Used to retrieve a purchase of an addon
$collection->Revoke(int $addonId, int $purchaseId) // Use to delete a purchase
~~~

## Addons - Reviews collection

~~~ PHP
$collection->GetAll(int $addonId) // Used to retrieve all notices of an addon
$collection->GetById(int $addonId, int $reviewId) // Used to retrieve an addon review
~~~

## Addons - Stats collection

~~~ PHP
$collection->GetAll(int $addonId) // Use to get the stats of an addon
~~~

## Addons - Versions collection

~~~ PHP
$collection->GetAll(int $addonId) // Used to get the versions of an addon
$collection->GetById(int $addonId, int $versionId) // Use to get a version of an addon
$collection->Download(int $addonId) // Use to create a download link for an addon
~~~
