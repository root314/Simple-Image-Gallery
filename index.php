<?php
    require __DIR__ . '/vendor/autoload.php';

    use Illuminate\Container\Container;

    interface Notificable {
        public function send();
    }

    // abstract class Notificator implements Notificable {

    // }

    class Email implements Notificable {
        public function send() {
            echo 'Email send.';
        }
    }

    class Sms implements Notificable {
        public function send() {
            echo 'Sms send.';
        }
    }

    class NotificationService {
        private $notification;

        public function __construct(Notificable $notification) {
            $this->notification = $notification;
        }

        public function send() {
            $this->notification->send();
        }
    }

    $container = new Container();
    $container->bind('EmailNotificationService', function($container) {
        return new NotificationService(
            $container->make('Email')
        );
    });
    $container->bind('SmsNotificationService', function($container) {
        return new NotificationService(
            $container->make('Sms')
        );
    });
    // $container->tag(['EmailNotificationService', 'SmsNotificationService'], 'Notificable');

    // $container->bind('NotificationService', function($container) {
    //     return new NotificationService(
    //         $container->tagged('Notificable')
    //     );
    // });


    $service = $container->make('EmailNotificationService');
    $service->send();
