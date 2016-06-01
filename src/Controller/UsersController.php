<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25-5-2016
 * Time: 13:17
 */

namespace App\Controller;

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
        if ($this->request->action == 'login' || $this->request->action == 'add') {
            if ($this->Auth->user()) {
                $this->Flash->error(__("Je bent al ingelogd!"));
                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'landing'
                ]);
            }
        }
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect('/');
            }
            $this->Flash->error(__('Ongeldige gebruikersnaam/wachtwoord combinatie!'));
        }
        $this->set('title', 'Aanmelden');

    }

    public function logout()
    {
        if($this->request->is('post')) {
            if($this->Auth->logout()) {
                $this->Flash->success(__('Je bent succesvol uitgelogd!'));
                return $this->redirect('/');
            }
        }
        else {
            throw new NotFoundException();
        }
    }

}