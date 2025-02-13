<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Email;
use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['landing']);
    }

    public function landing()
    {
        if(!is_null($this->Auth->user()))
        {
            return $this->redirect(['action' => 'check', $this->Auth->user('id')]);
        }

        $this->set('title', 'Communicatieplatform voor stage en bedrijven');
    }

    public function check($id)
    {
        $this->loadModel('Users');

        $user = $this->Users->get($id, ['contain' => 'PrimaryRole']);

        if(is_null($user)) {
            throw new notFoundException();
        }

        return $this->redirect(['controller' => 'Pages', 'action' => 'dashboard', 'prefix' => $user->primary_role->prefix]);

    }
}
