<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory\Namespaces;

use Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse;
use Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams\Summary;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type SummaryShape from \Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams\Summary
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SettingsContract
{
    /**
     * @api
     *
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $namespace,
        RequestOptions|array|null $requestOptions = null
    ): NamespaceSettingsResponse;

    /**
     * @api
     *
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param Omitted|Summary|SummaryShape|null $summary A partial update to a namespace's summary settings.
     *
     * Only the fields present in the request are changed; the rest are left as
     * they are. Sending `instructions: null` (or empty) clears the instructions.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function patchAll(
        string $namespace,
        Omitted|Summary|array|null $summary = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): NamespaceSettingsResponse;
}
