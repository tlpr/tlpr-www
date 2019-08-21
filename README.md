# tlpr-www
## Internet radio website that prioritizes web standards, simplicity, accessibility and freedom.
---
### Development roadmap:
+ **(In progress)** Very basic properly functioning website with HTML5 player.
	- **(Nearly done)** Index page - take longer than the rest, other pages will base on it
	- **(Scheduled)** About subpage
	- **(Scheduled)** Community subpage
	- **(Scheduled)** Contact subpage
	- **(Scheduled)** Donations page
+ **(Done)** ~~Multilanguage support.~~
+ **(Done)** ~~Support for browsers on mobile devices.~~
+ **(Done)** ~~Support for multiple audio streams.~~
+ **(In progress)** Displaying current song from the Icecast API and album cover.
+ **(Scheduled)** Playback history in the sidebar
+ **(Scheduled)** User accounts and like/dislike song function.
+ **(Scheduled)** Website administration panel
+ **(Scheduled)** Embedded KiwiIRC client with similar positioning to Facebook's chat.
+ **(Scheduled)** Text-only website for hardcore backward compatibility.
+ **(Delayed)** *Fancy, lightweight, optional JavaScript player.*

Development roadmap may be a subject to change.
To propose a new feature, improvement, report a bug or contribute code, please see CONTRIBUTIONS.md

### Deploying:
- Clone the repository (git clone https://github.com/tlpr/tlpr-www)
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
