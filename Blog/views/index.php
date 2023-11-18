<?= $render->render('header') ?>

<h1>Bienvenu sue le blog</h1>

<ul><li>Blog</li> <a href="<?= $router->genrateUri('blog.show', ['slug' => 'zazeaze0-7aze']) ;?>">Article 1 </ul>



<?= $render->render('footer') ?>