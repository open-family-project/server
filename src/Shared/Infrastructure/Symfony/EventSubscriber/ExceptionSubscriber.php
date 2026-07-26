<?php

namespace App\Shared\Infrastructure\Symfony\EventSubscriber;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * @param array<string, array<string, int|string>> $mapping
     */
    public function __construct(
        #[Autowire('%exception_mapper%')]
        private readonly array $mapping,
    )
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onException'
        ];
    }

    public function onException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $message = $exception->getMessage();

        foreach ($this->mapping as $class => $mapping) {
            if ($exception instanceof $class) {
                $event->setResponse(new JsonResponse([
                    'error' => $mapping['error'],
                    'message' => !!$message ? $message : null,
                ], (int) $mapping['status']));
            }
        }
    }
}
