# tlpr-www
## Internet radio website that prioritizes web standards, simplicity, accessibility and freedom.
---
### Development roadmap:
+ **(In progress)** Very basic properly functioning website with HTML5 player.
+ **(Done)** ~~Support for browsers on mobile devices.~~
+ **(In progress)** Displaying current song from the Icecast API and album cover.
+ **(In progress)** Support for multiple audio streams.
+ **(Scheduled)** Fancy, lightweight, optional JavaScript player.
+ **(Scheduled)** Open and easy to use API for external requests. (https://github.com/tlpr/tlpr-api)
+ **(Scheduled)** User accounts and like/dislike song function.
+ **(Scheduled)** Embedded KiwiIRC client with similar positioning to Facebook's chat.
+ **(Scheduled)** Text-only website for hardcore backward compatibility.

Development roadmap may be a subject to change.

### Deploying:
- Clone the repository (git clone https://github.com/noskla/project-canterlot-www.git)
- Remove the following files and directories:
	* .git
	* README.md
	* CONTRIBUTING.md
- Install web server and PHP, if you haven't. Recommended web servers are Apache2 and Nginx.
- Install composer from your package manager repositories or getcomposer.org
- Install dependencies using composer: ``composer install`` or ``php composer.phar install``
- Move all the files and directories to the web server root directory and you're done.

### Third-party packages and content
This software is using "parsedown" package made by erusev.
It is open-source software licensed under the MIT License
and copyrighted by Emanuil Rusev, erusev.com.
https://github.com/erusev/parsedown

Layout of this website is using Goodlight open font by dalerms
licensed under the SIL Open Font License 1.1
https://www.dafont.com/goodlight.font
