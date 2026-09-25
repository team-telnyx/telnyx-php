<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory;

use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\NamespacesContract;
use Telnyx\Services\AI\Memory\Namespaces\ProfilesService;
use Telnyx\Services\AI\Memory\Namespaces\SettingsService;

/**
 * Whether a write has finished.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NamespacesService implements NamespacesContract
{
    /**
     * @api
     */
    public NamespacesRawService $raw;

    /**
     * @api
     */
    public ProfilesService $profiles;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NamespacesRawService($client);
        $this->profiles = new ProfilesService($client);
        $this->settings = new SettingsService($client);
    }

    /**
     * @api
     *
     * Whether a write has finished. Both `ingest` and `remember` return an `operation_id`, and a memory is not recallable until its operation completes — extraction, embedding and consolidation all run first.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $operationID,
        string $namespace,
        RequestOptions|array|null $requestOptions = null,
    ): NamespaceGetResponse {
        $params = ['namespace' => $namespace];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($operationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
