<?php
function getCategories(): array
{
    return [
        1 => [
            'id' => '1',
            'name' => 'Политика',
            'slug' => 'politics'
        ],
        2 => [
            'id' => '2',
            'name' => 'Спорт',
            'slug' => 'sport'
        ]
    ];
}
function getPosts(): array
{
    return [
        1 => [
                'id' => 1,
                'category_id' => '1',
                'title' => 'Пост 1',
                'text' => 'Текст поста 1',
            ],
        2 => [
                'id' => 2,
                'category_id' => '1',
                'title' => 'Пост 2',
                'text' => 'Текст поста 2',
            ],
        3 => [
                'id' => 3,
                'category_id' => '2',
                'title' => 'Пост 3',
                'text' => 'Текст поста 3',
            ],
        4 => [
                'id' => 4,
                'category_id' => '2',
                'title' => 'Пост 4',
                'text' => 'Текст поста 4',
            ],
    ];
}
function getPost(?string $id):  ?array
{
    if($id === null || $id === '') {
        return null;
    }

    $posts = getPosts();
   
    foreach($posts as $post){
        if((string)$post['id'] === $id)
        {
            return $post;
        }
    }
    return null;
}
function postsByIdCategory(?string $id) : ?array
{
    if($id === null || $id === '') {
        return null;
    }

    $posts = getPosts();
    $result = [];

    foreach($posts as $post)
    {
        if((string)$post['category_id'] === $id){
            $result[] = $post;
        }
    }
    return $result;
}
function nameCategoryByIdCategory(?string $id): ?string
{
    if($id === null || $id === '') {
        return null;
    }

    $categories = getCategories();

    foreach($categories as $category)
    {
        if((string)$category['id'] === $id) {
            return $category['name'];
        }
    }
    return null;
}
function nameCategoryByIdPost(?string $id): ?string
{
    if($id === null || $id === '') {
        return null;
    }

    $post = getPost($id);
    
    if(empty($post)) {
        return null;
    }

    return nameCategoryByIdCategory($post['category_id']);
}





