# Running
- Make sure you have [Docker for Mac](https://docs.docker.com/docker-for-mac/) installed. (You can find the installer [here](https://store.docker.com/editions/community/docker-ce-desktop-mac))
- Once Docker is installed, make sure it's running (the Docker icon will appear in your system menubar)
- Clone this repository
- In a terminal, run `cd` to the directory you cloned the repository to, and run `docker-compose up`
- It will take a few minutes to provision. When you see `Laravel development server started: <http://0.0.0.0:3000>`, you can load the app at http://localhost:3000/

# Usage
- Upon first loading the app, you will see some (empty) tables of recent fights and top robots. 
- Click register in the upper-right to create an account.
- Once you have registered, you will see your username in the upper-right. Click on your username to show a menu. 
- From this menu, you can access the list of your robots (where you can create, edit and import robots) and the "Start a Fight" page.
- Before you start a fight, you'll need to create a robot(and probably another user with some robots to fight against).
- You can click on the name of the app in upper-left at any time to return to the tables of recent fights and top robots.
 ## Importing Robots
 - You can import robots via CSV, but the CSV must be formatted correctly.
 - Please include a header row containing `name`, `power`, `weight` and `speed`.
 
 # API
 - The app provides two api endpoints that supply the same data as the tables on the homepage.
 - `/api/fights/recent` will retrieve the list of fights (with the attacker and defender robots' data eager-loaded. The `winner` and `loser` properties are only the IDs of the robots, but you can match them with the data from `attacker` and `defender`).
 - `/api/robots/top` will return the current top five best robots, calculated by number of wins.
 - Neither endpoint requires authentication.
 
 # Notes
 - This project uses a slightly modified version of the [Bitnami Laravel Development Container](https://github.com/bitnami/bitnami-docker-laravel) (Released under the [Apache License](http://www.apache.org/licenses/LICENSE-2.0)). I've made a few small changes to the entrypoint script, Dockerfile and docker-compose.yml to use MySQL rather than MariaDB.
 - This should use pagination when listing user's robots, and possibly some way of lazy-loading the list of potential opponent robots on the fight page - if there were a significant number of robots, those pages would slow down considerably. I didn't have time to implement these features before the time limit, and they seemed less important given that this app will never see production.
 - There are two controller methods which are a little more complex than I'd like them to be - `FightController@createFight` and `RobotController@importRobots`. Ideally some of the logic in these methods (mostly the fighting algorithm and the CSV parsing) would be split off into other classes in interest of keeping as much business logic out of the controllers as possible. However, at the size this app is, I felt that creating more files to hold that logic would ultimately create more overall complexity and make it harder to understand, rather than easier, so I chose to keep the logic in the controllers. If this project were to continue to grow, those methods would be early candidates for refactoring.
 - There are several string literals throughout the project, in template names, route names, policy names, etc. In general, I would try to stay away from these as much as possible by creating constants to store the string values and using the constants in place of the literals. I didn't do that here simply because I didn't have time.
