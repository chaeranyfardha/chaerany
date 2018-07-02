<?php

namespace console\controllers;

use Yii;
use yii\console\controller;

class RbacController extends Controller {

    public function actionInit() {
        $auth = \Yii::$app->authManager;
        /**
         * permissions
         */
        //create and add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'User can create a post';
        $auth->add($createPost);

        //create and add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'User can update a post';
        $auth->add($updatePost);

        /**
         * Roles
         */
        
        //create and add "user" role
        $user = $auth->createRole('user');
        $auth->add($user);
        
        //create and add "author" role
        $author = $auth->createRole('author');
        $auth->add($author);
        
        //create and add :admin" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        
        /**
         * Mutual Connection
         */
        
        //"author" can create new Post
        $auth->addChild($author, $createPost);
        
        //"admin can do everything what "author" can
        $auth->addChild($admin, $author);  
        // ... and ...
        //"admin can update ALL Post
        $auth->addChild($admin, $updatePost);
        
        echo 'success';
        
    }
//    public function actionCreateAuthorRule()
//            {
//        $auth = \Yii::$app->authManager;
//        
//        //add the rule
//        
//        $rule = new\conssole\rbac\AuthorRule();
//        $auth->add($rule);
//        
//        //add the "updateOwnPost" permissions and associate the rule wiyh it.
//        $updateOwnPost = $auth->createPermission('updateOwnPost');
//        
//    }

}
