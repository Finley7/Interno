<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * Notification component
 */
class NotificationComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function create($user_id, $message, $url = null, $type) {
        $notificationRegistry = TableRegistry::get('Notifications');

        $notification = $notificationRegistry->newEntity();

        $notification->user_id = h($user_id);
        $notification->message = h($message);
        $notification->url = is_null($url) ? null : h($url);
        $notification->type = h($type);

        if($notificationRegistry->save($notification)) {
            return true;
        }

        return false;
    }
}
