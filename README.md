# php-football library for Roanuz Football API
php-football library for using Roanuz Football API in any website or web-app written in php. Easy to install and simple way to access all Roanuz Football API. Its a Php library for showing Live Football Score, Football Match Schedule and Statistics.

## Get Started
1. A) Clone the php-football Github project by using `https://github.com/roanuz/php-football.git`
<p align="center">
(Or)
</p>
   B) Install the php-football using Composer. Follow the below instructions.

   i)  Download and install Composer by following the [official instructions.](https://getcomposer.org/download/)   
   ii) Create a composer.json defining your dependencies inside your project root directory. 
   ```rust
   // Copy this content into your composer.json file.

   {
    "repositories": [
        {
            "url": "https://github.com/roanuz/php-football.git",
            "type": "git"
        }
    ],
      "minimum-stability" : "dev",
      "prefer-stable" : true,
      "require-dev": {
        "roanuz/php-football": "dev-master"
      }
   }
   ```

   iii) Run Composer: `composer require --dev roanuz/php-football`

   iv)  You can find the php-football library`(roanuz/php-football)` inside the vendor folder.


2. Create a Football API APP here [My APP Login](https://www.footballapi.com/)

3. Pass the required app credentials as below.
   
   ## Config Section
   ```rust
   // Create a new php file under your root directory. Inside that use this code.
   
   require_once __DIR__ . '/vendor/autoload.php';

   $phpFootball = new PhpFootball\PhpFootballLib('YOUR_ACCESS_KEY', 'YOUR_SECRET_KEY', 'YOUR_APP_ID', 'UNIQUE_DEVICE_ID');

   ```  
4. After Completing Authentication you can successfully access the API's.
   
   ## Example
   ```rust
      
    // For getting particular match details.
    $getMatch = $phpFootball->getMatch('MATCH_KEY');
    echo json_encode($getMatch);//Return Match Information in JSON format

   // For getting schedule details
   $getSchedule = $phpFootball->getSchedule('2018-05'); //To get the schedules of month May, 2018.
   echo json_encode($getSchedule); // Return Schedule Information in JSON format
   ```  
  
  To get the Live Score updates, you need to purchase the plan on [FootballAPI Website](https://www.footballapi.com/)
  
### Need More Code reference ?
   
   Dive in to this file. [Example Code to Access Roanuz Football API](https://github.com/roanuz/php-football/blob/master/example.php)

### Here is List of Roanuz Football API's

* [Match API](https://www.footballapi.com/)
* [Tournament API](https://www.footballapi.com/)
* [Tournament Team API](https://www.footballapi.com/)
* [Tournament Round API](https://www.footballapi.com/)
* [Tournament Stats API](https://www.footballapi.com/)
* [Tournament Team Stats API](https://www.footballapi.com/)
* [Tournament Player Stats API](https://www.footballapi.com/)
* [Schedule API](https://www.footballapi.com/)
* [Tournament Schedule API](https://www.footballapi.com/)
* [Recent Tournaments API](https://www.footballapi.com/)
* [Round Matches API](https://www.footballapi.com/)
* [Recent Tournament Matches API](https://www.footballapi.com/)
* [Tournament Standings API](https://www.footballapi.com/)

## Roanuz Football API
This Library uses the Roanuz Football API for fetching football scores and stats. Feel free to contact their amazing support team, if you fave any query or doubt.

### Support
If you any question, feel free to contact us at - support@cricketapi.com