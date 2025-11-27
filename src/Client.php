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
    public bool $baseUrlOverridden;

    /**
     * @api
     */
    public TrackService $track;

    /**
     * @api
     */
    public VisitorService $visitor;

    public function __construct(?string $baseUrl = null)
    {
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
            // x-release-please-start-version
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('ours-privacy/PHP %s', '0.4.1'),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.4.1',
                'X-Stainless-OS' => $this->getNormalizedOS(),
                'X-Stainless-Arch' => $this->getNormalizedArchitecture(),
                'X-Stainless-Runtime' => 'php',
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            // x-release-please-end
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->track = new TrackService($this);
        $this->visitor = new VisitorService($this);
    }
}
