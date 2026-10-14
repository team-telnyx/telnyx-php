<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory;

use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceListResponse;
use Telnyx\AI\Memory\Namespaces\NamespaceNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\NamespacesContract;
use Telnyx\Services\AI\Memory\Namespaces\ProfilesService;
use Telnyx\Services\AI\Memory\Namespaces\SettingsService;

/**
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
     * Create a namespace. An organization can have at most five, `default` among them — a sixth returns `403`.
     *
     * @param string $name a name for the new namespace, unique within your organization
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): NamespaceNewResponse {
        $params = ['name' => $name];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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

    /**
     * @api
     *
     * Every namespace in your organization, `default` among them.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): NamespaceListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a namespace and every profile and memory in it. `default` cannot be deleted. This cannot be undone.
     *
     * @param string $namespace The namespace to delete. `default` cannot be deleted.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $namespace,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($namespace, requestOptions: $requestOptions);

        return $response->parse();
    }
}
