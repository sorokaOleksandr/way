<?php

return array(

    'product/([0-9]+)' => 'product/view/$1',

   // 'category' => 'catalog/index',

    'category/([0-9]+)' => 'catalog/category/$1',

    'category/page/([0-9]+)' => 'catalog/page/$1',

    'about' => 'about/about',

    'contacts' => 'contacts/contacts',

    'admin' => 'admin/login',

    'out' => 'admin/logout',

    'panel' => 'panel/panel',

    'user' => 'user/order',

    'delete' => 'delete/delete/$1',

    'add' => 'add/add',

    'save' => 'add/save',



    '' => 'site/index',

);