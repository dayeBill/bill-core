<?php

namespace DayeBill\BillCore\Application;

use DayeBill\BillCore\Domain\Repositories\BillReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\BillRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\ContactReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\ContactRepositoryInterface;
use DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql\BillReadRepository;
use DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql\ContactReadRepository;
use DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql\EventReadRepository;
use DayeBill\BillCore\Infrastructure\Repositories\Eloquent\BillRepository;
use DayeBill\BillCore\Infrastructure\Repositories\Eloquent\ContactRepository;
use DayeBill\BillCore\Infrastructure\Repositories\Eloquent\EventRepository;
use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind(BillRepositoryInterface::class, BillRepository::class);
        $this->app->bind(BillReadRepositoryInterface::class, BillReadRepository::class);

        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ContactReadRepositoryInterface::class, ContactReadRepository::class);

        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(EventReadRepositoryInterface::class, EventReadRepository::class);

    }

    public function boot() : void
    {
    }
}
