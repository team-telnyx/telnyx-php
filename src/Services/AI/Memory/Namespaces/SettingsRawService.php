<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory\Namespaces;

use Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse;
use Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams;
use Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams\Summary;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\Namespaces\SettingsRawContract;

/**
 * How a namespace's summaries are written.
 *
 * @phpstan-import-type SummaryShape from \Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams\Summary
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
     * What is currently set for this namespace. `instructions: null` means none are set and summaries use the neutral default.
     *
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceSettingsResponse>
     *
     * @throws APIException
     */
    public function list(
        string $namespace,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/memory/namespaces/%1$s/settings', $namespace],
            options: $requestOptions,
            convert: NamespaceSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Only the fields you send are changed; anything omitted is left as it is, so `{}` changes nothing. Sending `instructions: null`, or an empty or whitespace-only string, clears them and returns summaries to the neutral default.
     *
     * Instructions are capped at 2000 characters. A longer note is refused rather than truncated, because a note cut mid-sentence is a worse steer than none. A change reaches each summary the next time that summary is regenerated, not immediately.
     *
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param array{summary?: Summary|SummaryShape|null}|SettingPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NamespaceSettingsResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        string $namespace,
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
            path: ['ai/memory/namespaces/%1$s/settings', $namespace],
            body: (object) $parsed,
            options: $options,
            convert: NamespaceSettingsResponse::class,
        );
    }
}
