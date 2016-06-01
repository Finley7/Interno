<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25-5-2016
 * Time: 13:17
 */

namespace App\Controller\Company;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\I18n\Time;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow([
            'add',
            'logout',
            'view'
        ]);
        if ($this->request->action == 'add') {
            if ($this->Auth->user()) {
                $this->Flash->error(__("Je bent al ingelogd!"));
                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'landing'
                ]);
            }
        }
    }

    public function add()
    {
        $user = $this->Users->newEntity([
            'associated' => [
                'Roles',
            ]
        ]);

        $this->loadModel('Schools');
        $schools = $this->Schools->find('list');

        if ($this->request->is('post')) {
            $this->request->data['roles']['_ids'] = [5];
            $this->request->data['username'] = h($this->request->data['username']);
            $this->request->data['primary_role'] = 5;
            $user = $this->Users->patchEntity($user, $this->request->data, [
                'associated' => [
                    'Roles',
                ]
            ]);
            if ($this->Users->save($user, [
                'associated' => [
                    'Roles',
                ]
            ])
            ) {
                $this->Flash->success(__('Het account is aangemaakt. Je kunt nu inloggen!'));
                return $this->redirect([
                    'controller' => 'users',
                    'action' => 'login'
                ]);
            } else {
                $this->Flash->error(__('Er is iets fout gegaan tijdens het registreren van het account!'));
            }
        }
        $this->set('title', __('Maak een account!'));
        $this->set(compact('user', 'schools'));
        $this->set('_serialize', ['user']);
    }

}