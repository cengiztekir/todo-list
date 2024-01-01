<?php

namespace App\Console\Commands;

use App\Services\DeveloperService;
use App\Services\Integration\Strategy\IntegrationStrategyFactory;
use Illuminate\Console\Command;

class GetProviderTodos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-provider-todos {provider}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected IntegrationStrategyFactory $integrationStrategyFactory;
    protected DeveloperService $developerService;

    /**
     * @param IntegrationStrategyFactory $integrationStrategyFactory
     * @param DeveloperService $developerService
     */
    public function __construct(IntegrationStrategyFactory $integrationStrategyFactory, DeveloperService $developerService)
    {
        parent::__construct();
        $this->integrationStrategyFactory = $integrationStrategyFactory;
        $this->developerService = $developerService;
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if ($this->argument('provider') !== 'all') {
            $this->startSelectedProvider();
        } else {
            $this->startAllProviders();
        }

        $this->developerService->assigneAllTodos();
    }

    public function startAllProviders(): void
    {
        $todoIntegrations = config('todos.integrations');

        foreach ($todoIntegrations as $key => $todoIntegration) {
            $integrationStrategy = $this->integrationStrategyFactory->getChainDirector(
                $todoIntegration['director_name'] . "\\" . $key
            );
            $integrationStrategy->run();
        }
    }

    public function startSelectedProvider(): void
    {
        $todoIntegrations = config('todos.integrations');
        $integrationStrategy = $this->integrationStrategyFactory->getChainDirector(
            $todoIntegrations[$this->argument('provider')]['director_name'] . "\\" . $this->argument('provider')
        );

        $integrationStrategy->run();
    }
}
