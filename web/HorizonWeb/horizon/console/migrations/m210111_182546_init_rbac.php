<?php

use yii\db\Migration;

/**
 * Class m210111_182546_init_rbac
 */
class m210111_182546_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $rule = new \common\modules\auth\rbac\AuthorRule;
        $auth->add($rule);

        $viewPost = $auth->createPermission('viewPost');
        $viewPost->description = 'View a post';
        $auth->add($viewPost);

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        $DeletePost = $auth->createPermission('deletePost');
        $DeletePost->description = 'Delete post';
        $auth->add($DeletePost);

        $backend = $auth->createPermission('backend');
        $backend->description = 'Backend';
        $auth->add($backend);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $viewPost);
        $auth->addChild($author, $DeletePost);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $viewPost);
        $auth->addChild($admin, $DeletePost);
        $auth->addChild($admin, $backend);


        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.

        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210111_182546_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210111_182546_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
