ساختار اصلی پروژه  :
/project-root
│── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── API
│   │   │   │   ├── ArticleController.php
│   │   │   │   ├── AuthController.php
│   │   │   ├── Web
│   │   │   │   ├── HomeController.php
│   │   │   │   ├── ArticleController.php
│   │   ├── Middleware
│   │   ├── Requests
│   │   │   ├── Article
│   │   │   │   ├── StoreArticleRequest.php
│   │   │   │   ├── UpdateArticleRequest.php
│   ├── Models
│   │   ├── Article.php
│   │   ├── User.php
│   ├── Services
│   │   ├── ArticleService.php
│   ├── Repositories
│   │   ├── Interfaces
│   │   │   ├── ArticleRepositoryInterface.php
│   │   ├── Eloquent
│   │   │   ├── ArticleRepository.php
│   ├── DTOs
│   │   ├── ArticleDTO.php
│   ├── Policies
│   │   ├── ArticlePolicy.php
│   ├── Events
│   │   ├── ArticlePublished.php
│   ├── Listeners
│   │   ├── SendArticlePublishedNotification.php
│── bootstrap
│── config
│── database
│   ├── factories
│   ├── migrations
│   ├── seeders
│── public
│── resources
│   ├── views
│   │   ├── articles
│   │   │   ├── index.blade.php
│   │   │   ├── show.blade.php
│   │   ├── layouts
│   │   │   ├── app.blade.php
│   ├── js
│   ├── css
│── routes
│   ├── api.php
│   ├── web.php
│── storage
│── tests
│   ├── Feature
│   │   ├── ArticleTest.php
│   ├── Unit
│   │   ├── ArticleServiceTest.php
│── .env
│── composer.json
│── package.json
│── artisan
│── README.md

