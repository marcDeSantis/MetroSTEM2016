# Creating an Angular web application with FountainJS

You can view the code that this walk through creates in [this repository](https://github.com/marcDeSantis/fountain_metro)

###Get your machine ready

1. Install nodejs and npm [with these directions](https://docs.npmjs.com/getting-started/installing-node)
2. Install [yeoman](http://yeoman.io/) and [fountainjs](http://fountainjs.io/) globally on your machine by running this command: `npm install -g yo generator-fountain-webapp`

###Generate your starter web app

1. Create a new directory (folder) on your machine
2. Invoke the fountainjs generator by running `yo fountain-webapp` in this directory
3. Choose the following options:

  ```
? Which JavaScript framework do you want? Angular 1
? Which module management do you want? Webpack with NPM
? Which JS preprocessor do you want? ES2015 today with Babel
? Which CSS preprocessor do you want? Less
? Which Continuous Integration platform do you want? (Leave blank)
? Do you want a sample app? Just a Hello World
? Would you like a router? None
  ```
  
4. Your app should now look [like this](https://github.com/marcDeSantis/fountain_metro/tree/c0ef296ebb302b9e0c64cd7067f188cd5676af1d)
5. You should be able to run your app now by running `gulp serve`

### Add Bootstrap Styling

Follow the commits in [this Pull Request](https://github.com/marcDeSantis/fountain_metro/pull/2/commits) to add Bootstrap dependencies, navbar and styling to your project.

Click on each commit to see the file changes related to each step.
