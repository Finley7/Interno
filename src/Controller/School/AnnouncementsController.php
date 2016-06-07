<?php
/**
 * Created by PhpStorm.
 * User: finley
 * Date: 01-06-16
 * Time: 21:31
 */

namespace App\Controller\School;

use App\Controller\AppController;
use App\Model\Entity\Announcements;
use Cake\Event\Event;

/**
 * @property bool|object Announcements
 */
class AnnouncementsController extends AppController
{
    public function index() {
        $this->Announcements->find('all');
    }

    public function add() {
        $announcement = $this->Announcements->newEntity();

        if($this->request->is('post'))
        {
            $announcement->author_id = $this->Auth->user('id');
            $announcement->title = h($this->request->data['title']);
            $announcement->body = h($this->request->data['body']);
            $announcement->tags = h($this->request->data['tags']);

            $ceo_split = str_replace(' ', '-', strtolower($this->request->data['title']));
            $ceo_split = preg_replace("/[',.!:#$%^&*()_+ \/ =\[\]<>~`@']/", "", $ceo_split);

            $announcement->pretty_url = $ceo_split;

            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);

            if($this->Announcements->save($announcement)) {
                $this->Flash->success(__('De aankondiging is toegevoegd!'));
                return $this->redirect(['action' => 'index']);
            }
            else {
                $this->Flash->error(__('De aankondiging kon niet opgeslagen worden!'));
            }
        }

        $this->set('title', 'Maak een nieuwe aankondiging');
        $this->set(compact('announcement'));
    }
}