#Achiefments
A Master Chief Achievement Browser.

The Master Chief Collection has far too many achievements and no easy way to browse them, so I started writing this.

##Working

* Filter achievements by game
* Only shows non-unlocked achievements
* Include achievement artwork

## To-Do

* Filter by type (skulls, terminals, score, time etc)
* Toggle showing unlocked
* Be prettier
* Add other Halo games
* Handle achievement artwork better
* Sorting

## Using It

You can view my latest version at http://ajb.im/achiefments. It's a bit rough at the moment though and you need to manually supply it with your Xbox User ID (XUID). You can get this by going to http://ajb.im/achiefments/getxuid.php?gamertag= (add your gamertag to the end) which will give you a link with your XUID in place for you.

## API Limits

I use [XboxAPI](https://xboxapi.com) to get achievement information. There is a limit on the number of requests per hour. If you see errors, I might be hitting the limits. I do not include my API key here. If you clone, you'll need to generate your own one.

## Credit
* [Microsoft](https://xbox.com)
* [XboxAPI](https://xboxapi.com)
* [HTTPful](http://phphttpclient.com)
* [Bootstrap](https://getbootstrap.com)
