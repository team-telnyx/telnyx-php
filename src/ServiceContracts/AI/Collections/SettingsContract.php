<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Collections;

use Telnyx\AI\Collections\Settings\RetrievalSettings;
use Telnyx\AI\Collections\Settings\SettingsEnvelope;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RetrievalSettingsShape from \Telnyx\AI\Collections\Settings\RetrievalSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SettingsContract
{
    /**
     * @api
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
    ): SettingsEnvelope;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): SettingsEnvelope;

    /**
     * @api
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
    ): SettingsEnvelope;
}
