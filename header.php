
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/index.php">Start Bootstrap</a>
               
                <ul class="navbar-nav" ng-controller="NavCtrl">
                    
                    <li class="nav-item" ng-class="navClass('home')">
                                          <a class="nav-link" href='/index.php'>Home  </a>
                     </li>
                     <li class="nav-item active">
                     <li class="nav-item" ng-class="navClass('admin')">
                        <a class="nav-link" href='/userauth.php'>Admin</a>
                     </li>
                     <li class="nav-item" ng-class="navClass('about')">
                          <a class="nav-link" href='/about.php'>About</a>
                     </li>
                     <li class="nav-item" ng-class="navClass('Contact')">
                           <a  class="nav-link" href='/contact.php'>Contact</a>
                     </li>
                 </ul>
            
                 </div> <!-- /container -->  
        </nav> <!-- /navigation -->  