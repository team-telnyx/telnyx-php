<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Collections;

use Telnyx\AI\Collections\Settings\RetrievalSettings;
use Telnyx\AI\Collections\Settings\SettingCreateParams;
use Telnyx\AI\Collections\Settings\SettingPatchAllParams;
use Telnyx\AI\Collections\Settings\SettingsEnvelope;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Collections\SettingsRawContract;

/**
 * Create and manage logical collections of your Telnyx data, tune retrieval settings, manage sources, and run collection-scoped semantic search.
 *
 * @phpstan-import-type RetrievalSettingsShape from \Telnyx\AI\Collections\Settings\RetrievalSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SettingsRawService implements SettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Replaces the collection's retrieval settings.
     *
     * @param string $uuid the collection's unique identifier
     * @param array{
     *   retrieval?: RetrievalSettings|RetrievalSettingsShape
     * }|SettingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsEnvelope>
     *
     * @throws APIException
     */
    public function create(
        string $uuid,
        array|SettingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/collections/%1$s/settings', $uuid],
            body: (object) $parsed,
            options: $options,
            convert: SettingsEnvelope::class,
        );
    }

    /**
     * @api
     *
     * Returns the retrieval settings for a collection.
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsEnvelope>
     *
     * @throws APIException
     */
    public function list(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/collections/%1$s/settings', $uuid],
            options: $requestOptions,
            convert: SettingsEnvelope::class,
        );
    }

    /**
     * @api
     *
     * Partially updates the collection's retrieval settings.
     *
     * @param string $uuid the collection's unique identifier
     * @param array{
     *   retrieval?: RetrievalSettings|RetrievalSettingsShape
     * }|SettingPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsEnvelope>
     *
     * @throws APIException
     */
    public function patchAll(
        string $uuid,
        array|SettingPatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingPatchAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ai/collections/%1$s/settings', $uuid],
            body: (object) $parsed,
            options: $options,
            convert: SettingsEnvelope::class,
        );
    }
}
