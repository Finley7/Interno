<?php
/**
 * Created by PhpStorm.
 * User: finley
 * Date: 07-06-16
 * Time: 22:30
 */

namespace App\Controller\Student;


use App\Controller\AppController;

class NotificationsController extends AppController
{
    public function index()
    {
        $allNotifications = $this->Notifications->find('all')->order('is_read');

        $this->set('allNotifications', $this->paginate($allNotifications));
    }

    public function mark($id) {
        $notification = $this->Notifications->get($id);

        if($notification->is_read) {
            $this->Flash->error(__('Dit bericht is al gemarkeerd als gelezen!'));
            return $this->redirect(['action' => 'index']);
        }

        if($this->request->is(['post', 'patch', 'put'])) {
            $notification->is_read = true;

            if($this->Notifications->save($notification)) {
                $this->Flash->success(__('Notificatie gemarkeerd als gelezen!'));
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error(__('Notificatie kon niet gemarkeerd als gelezen worden!'));
                return $this->redirect(['action' => 'index']);
            }
        }
    }
}