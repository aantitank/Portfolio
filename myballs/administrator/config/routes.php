<?php

return array(
//    // Управление товарами:
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление категориями:
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление заказами:
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Управление пользователями:
    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
    'admin/user/create' => 'adminUser/createAdmin',
    'admin/user' => 'adminUser/index',
    // Управление коментариями:
    'admin/comment/create' => 'adminComment/create',
    'admin/comment/update/([0-9]+)' => 'adminComment/update/$1',
    'admin/comment/delete/([0-9]+)' => 'adminComment/delete/$1',
    'admin/comment/([0-9]+)' => 'adminComment/user/$1',
    'admin/comment/([a-z]+)' => 'adminComment/index/$1',
// Галлерея у товаров
    'admin/image/update/([0-9]+)' => 'adminImage/update/$1',
    'admin/image/delete/([0-9]+)' => 'adminImage/delete/$1',
    'admin/image/create' => 'adminImage/create',
    'admin/image' => 'adminImage/index',
//    // Админпанель:
    'admin' => 'admin/index',
);
