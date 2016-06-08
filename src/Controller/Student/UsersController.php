<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25-5-2016
 * Time: 13:17
 */

namespace App\Controller\Student;

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
                'StudentProfile'
            ]
        ]);

        $this->loadModel('Schools');
        $schools = $this->Schools->find('list');

        if ($this->request->is('post')) {
            $this->request->data['roles']['_ids'] = [5];
            $this->request->data['username'] = h($this->request->data['username']);
            $this->request->data['primary_role'] = 5;
            $this->request->data['student_profile']['updated'] = 0;
            $user = $this->Users->patchEntity($user, $this->request->data, [
                'associated' => [
                    'Roles',
                    'StudentProfile'
                ]
            ]);

            if ($this->Users->save($user, [
                'associated' => [
                    'Roles',
                    'StudentProfile'
                ]
            ])
            ) {
                $this->Flash->success(__('Het account is aangemaakt. Je kunt nu inloggen!'));
                return $this->redirect([
                    'controller' => 'users',
                    'action' => 'login',
                    'prefix' => false
                ]);
            } else {
                $this->Flash->error(__('Er is iets fout gegaan tijdens het registreren van het account!'));
            }
        }
        $this->set('title', __('Maak een account!'));
        $this->set(compact('user', 'schools'));
        $this->set('_serialize', ['user']);
    }

    public function settings() {

        $profile = $this->Users->get($this->Auth->user('id'), ['contain' => ['StudentProfile']]);

        if(is_null($profile)) {
            throw new NotFoundException(__("Gebruiker niet gevonden!"));
        }

        if($this->request->is(['patch', 'put', 'post'])) {
            $profile->student_profile->updated = 1;

            $profile = $this->Users->patchEntity($profile, $this->request->data, [
                'associated' => [
                    'StudentProfile'
                ]
            ]);

            if($this->Users->save($profile, ['associated' => ['StudentProfile']])) {
                $this->Flash->success(__('Profiel is opgeslagen!'));
                return $this->redirect(['controller' => 'users', 'action' => 'settings']);
            }
            else {
                $this->Flash->error(__('Profiel kon niet opgeslagen worden!'));
            }
        }

        $this->set('title', __('Instellingen aanpassen'));
        $this->set(compact('profile'));
    }

    public function avatar()
    {
        $editUser = $this->Users->get($this->Auth->user('id'));
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if($this->request->is(['post', 'patch', 'put'])){
            if(!@getimagesize($this->request->data['avatar']['tmp_name'])) {
                $this->Flash->error(__('Je hebt geen geldige avatar geselecteerd'));
                return $this->redirect(['view' => 'avatar']);
            }
            if(!in_array($this->request->data['avatar']['type'], $allowed_types)) {
                $this->Flash->error(__('Je hebt geen geldig formaat geupload'));
                return $this->redirect(['view' => 'avatar']);
            }
            if($this->request->data['avatar']['size'] > 2000000) {
                $this->Flash->error(__('Je hebt te grote avatar geupload!'));
                return $this->redirect(['view' => 'avatar']);
            }
            $ext = explode('/', $this->request->data['avatar']['type']);
            $avatar_url = 'avatar_' . Text::uuid() . '_' . $editUser->username . '.' . $ext[1];
            $editUser->avatar = $avatar_url;
            if($this->Users->save($editUser))
            {
                $image_info = file_get_contents($this->request->data['avatar']['tmp_name']);
                $avatar = new File('img/uploads/avatars/' . $avatar_url, true);
                $avatar->append($image_info);
                $avatar->create();
                $this->Auth->setUser($editUser->toArray());
                $this->Flash->success(__('Avatar geupload!'));
                return $this->redirect(['action' => 'settings']);
            }
            else
            {
                $this->Flash->error(__('Er iets fout gegaan tijdens het opslaan!'));
            }
        }
        $this->set('editUser', $editUser);
        $this->set('title', 'Avatar aanpassen');
    }

    public function view($name) {
        $profile = $this->Users->findByUsername($name)->contain(['StudentProfile'])->first();

        if(is_null($profile)) {
            throw new NotFoundException(__("Gebruiker niet gevonden!"));
        }

        $this->set('title', __('Profiel van {0}', $profile->username));
        $this->set(compact('profile'));
    }

}