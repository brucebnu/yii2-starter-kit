<?php

use yii\db\Migration;

class m200105_021300_Organization_access extends Migration
{
    /**
     * @var array controller all actions
     */
    public $permisions = [
        "index" => [
            "name" => "org_organization_index",
            "description" => "org/organization/index"
        ],
        "view" => [
            "name" => "org_organization_view",
            "description" => "org/organization/view"
        ],
        "create" => [
            "name" => "org_organization_create",
            "description" => "org/organization/create"
        ],
        "update" => [
            "name" => "org_organization_update",
            "description" => "org/organization/update"
        ],
        "delete" => [
            "name" => "org_organization_delete",
            "description" => "org/organization/delete"
        ]
    ];
    
    /**
     * @var array roles and maping to actions/permisions
     */
    public $roles = [
        "OrgOrganizationFull" => [
            "index",
            "view",
            "create",
            "update",
            "delete"
        ],
        "OrgOrganizationView" => [
            "index",
            "view"
        ],
        "OrgOrganizationEdit" => [
            "update",
            "create",
            "delete"
        ]
    ];
    
    public function up()
    {
        
        $permisions = [];
        $auth = \Yii::$app->authManager;

        /**
         * create permisions for each controller action
         */
        foreach ($this->permisions as $action => $permission) {
            $permisions[$action] = $auth->createPermission($permission['name']);
            $permisions[$action]->description = $permission['description'];
            $auth->add($permisions[$action]);
        }

        /**
         *  create roles
         */
        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->add($role);

            /**
             *  to role assign permissions
             */
            foreach ($actions as $action) {
                $auth->addChild($role, $permisions[$action]);
            }
        }
    }

    public function down() {
        $auth = Yii::$app->authManager;

        foreach ($this->roles as $roleName => $actions) {
            $role = $auth->createRole($roleName);
            $auth->remove($role);
        }

        foreach ($this->permisions as $permission) {
            $authItem = $auth->createPermission($permission['name']);
            $auth->remove($authItem);
        }
    }
}
