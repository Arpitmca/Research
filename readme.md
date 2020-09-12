

## About ResearchFund

ResearchFund is web based application build over Laravel whose aim is to gather funds for under-funded research projects and promote research in our country.

## Minimum System Requirements

-   PHP >= 7.1.3
-   BCMath PHP Extension
-   Ctype PHP Extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension

## How to Install on CentOS 

The server must contains Apache Webserver and composer preinstalled.
Clone the repo from the github source:
 

       git clone https://github.com/Arpitmca/Research
    
Move into the Research directory by running

    cd Research
   Pull dependencies through composer by running
   

    composer update
Make sure to put correct credentials in .env file and App/Helpers/PayTM file for proper working.
## Demo
You can check out deployed version at
[researchfund.cartme.ga](https://researchfund.cartme.ga)

## License
This is project is exclusively built for presentation on AMUHacks 1.0. The code base should not be used in any commercial project without the prior permissions of **all the contributors**.