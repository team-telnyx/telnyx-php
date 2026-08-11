<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Collections;

use Telnyx\AI\Collections\Settings\RetrievalSettings;
use Telnyx\AI\Collections\Settings\SettingsEnvelope;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Collections\SettingsContract;

/**
 * Create and manage logical collections of your Telnyx data, tune retrieval settings, manage sources, and run collection-scoped semantic search.
 *
 * @phpstan-import-type RetrievalSettingsShape from \Telnyx\AI\Collections\Settings\RetrievalSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
    }

    /**
     * @api
     *
     * Replaces the collection's retrieval settings.
     *
     * @param string $uuid the collection's unique identifier
     * @param RetrievalSettings|RetrievalSettingsShape $retrieval how documents are retrieved when searching the collection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $uuid,
        RetrievalSettings|array|null $retrieval = null,
        RequestOptions|array|null $requestOptions = null,
    ): SettingsEnvelope {
        $params = Util::removeNulls(['retrieval' => $retrieval]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($uuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the retrieval settings for a collection.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): SettingsEnvelope {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($uuid, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially updates the collection's retrieval settings.
     *
     * @param string $uuid the collection's unique identifier
     * @param RetrievalSettings|RetrievalSettingsShape $retrieval how documents are retrieved when searching the collection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function patchAll(
        string $uuid,
        RetrievalSettings|array|null $retrieval = null,
        RequestOptions|array|null $requestOptions = null,
    ): SettingsEnvelope {
        $params = Util::removeNulls(['retrieval' => $retrieval]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->patchAll($uuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
