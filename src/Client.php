<?php

declare(strict_types=1);

namespace OursPrivacy;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use OursPrivacy\Core\BaseClient;
use OursPrivacy\Services\TrackService;
use OursPrivacy\Services\VisitorService;

class Client extends BaseClient
{
    public string $apiKey;

    public bool $baseUrlOverridden;

    /**
     * @api
     */
    public TrackService $track;

    /**
     * @api
     */
    public VisitorService $visitor;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('OURS_PRIVACY_API_KEY'));

        $this->baseUrlOverridden = !is_null($baseUrl);

        $baseUrl ??= getenv(
            'OURS_PRIVACY_BASE_URL'
        ) ?: 'https://api.oursprivacy.com/api/v1';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->track = new TrackService($this);
        $this->visitor = new VisitorService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        if (!$this->apiKey) {
            return [];
        }

        return ['Authorization' => "Bearer {$this->apiKey}"];
    }
}
