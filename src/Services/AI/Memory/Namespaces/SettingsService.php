<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory\Namespaces;

use Telnyx\AI\Memory\Namespaces\Settings\NamespaceSettingsResponse;
use Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams\Summary;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\Namespaces\SettingsContract;

/**
 * How a namespace's summaries are written.
 *
 * @phpstan-import-type SummaryShape from \Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams\Summary
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
     * What is currently set for this namespace. `instructions: null` means none are set and summaries use the neutral default.
     *
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $namespace,
        RequestOptions|array|null $requestOptions = null
    ): NamespaceSettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($namespace, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Only the fields you send are changed; anything omitted is left as it is, so `{}` changes nothing. Sending `instructions: null`, or an empty or whitespace-only string, clears them and returns summaries to the neutral default.
     *
     * Instructions are capped at 2000 characters. A longer note is refused rather than truncated, because a note cut mid-sentence is a worse steer than none. A change reaches each summary the next time that summary is regenerated, not immediately.
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
    ): NamespaceSettingsResponse {
        $params = array_filter(
            ['summary' => $summary],
            static fn ($value) => Omitted::VALUE !== $value
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->patchAll($namespace, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
