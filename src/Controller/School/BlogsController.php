<?php
/**
 * Created by PhpStorm.
 * User: finley
 * Date: 01-06-16
 * Time: 21:31
 */

namespace App\Controller\School;

use App\Controller\AppController;
use App\Model\Entity\Blog;
use Cake\Event\Event;

/**
 * @property bool|object Blogs
 */
class BlogsController extends AppController
{
    public function index() {
        $this->Blogs->find('all');
    }

    public function add() {
        $blog = $this->Blogs->newEntity();

        $this->set('title', 'Maak een nieuw artikel');
        $this->set(compact('blog'));
    }
}