<?php

include __DIR__ . '/../vendor/autoload.php';

$page = $_GET['page'] ?? 'index';

switch ($page) {
    case 'index':
        include __DIR__ . '/../views/index.phtml';
        break;

    case 'categories':
        $categories = getCategories();
        include __DIR__ . '/../views/categories/categories.phtml';
        break;

    case 'category':
        //$id категории
        $id = $_GET['id'] ?? null;
        $postsCategory = postsByIdCategory($id);
        $nameCategory = nameCategoryByIdCategory($id);
        include __DIR__ . '/../views/categories/category.phtml';
        break;

    case 'posts':
        $posts = getPosts();
        include __DIR__ . '/../views/posts/posts.phtml';
        break;

    case 'post':
        //$id поста
        $id = $_GET['id'] ?? null;
        $post = getPost($id);
        $nameCategoryByIdPost = nameCategoryByIdPost($id);
        include __DIR__ . '/../views/categories/posts/post.phtml';
        break;

    case 'about':
        include __DIR__ . '/../views/about.phtml';
        break;

    case 'contacts':
        include __DIR__ . '/../views/contacts.phtml';
        break;

    default:
        die("Нет такой страницы");
}



